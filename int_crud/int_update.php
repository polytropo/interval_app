<?php
require_once '../database/dbconnect.php';

if($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM intervals WHERE interval_id = {$id}";
    $result = $connect->query($sql);


    $data = $result->fetch_assoc();

    $connect->close();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Interval</title>

</head>
<body>

<fieldset>
    <legend>Update Interval</legend>

    <form action="../int_actions/int_update.php" method="post">
        <table cellspacing="0" cellpadding="0">

            <tr>

                <th>Interval Name</th>
                <td><input type="text" name="interval_name" placeholder="Interval Name" value="<?php echo $data['interval_name'] ?>" /></td>

            </tr>     
            <tr>

                <th>Interval Description</th>
                <td><input type="text" name="interval_description" placeholder="Description" value="<?php echo $data['interval_description'] ?>" /></td>

            </tr>
            <tr>

                <th>Interval Length</th>
                <td><input type="number" name="length" placeholder="Interval Length" value="<?php echo $data['length'] ?>" /></td>

            </tr>
            <tr>

                <th>Interval Color</th>
                <td><input type="text" name="interval_color" placeholder="Interval Color" value="<?php echo $data['interval_color'] ?>" /></td>

            </tr>
            <tr>

                <input type="hidden" name="id" value="<?php echo $data['interval_id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="../home.php"><button type="button">Back</button></a></td>

            </tr>
        </table>
    </form>

</fieldset>

</body>
</html>

<?php
}
?>
<?php ob_end_flush(); ?>
