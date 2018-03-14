<?php
require_once '../database/dbconnect.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM sets WHERE set_id = {$id}";

    $result = $connect->query($sql);


    $data = $result->fetch_assoc();

    $connect->close();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit set</title>

</head>
<body>

<fieldset>
    <legend>Update set</legend>

    <form action="../set_actions/set_update.php" method="post">
        <table cellspacing="0" cellpadding="0">

            <tr>

                <th>Set Name</th>
                <td><input type="text" name="set_name" placeholder="set Name" value="<?php echo $data['set_name'] ?>" /></td>

            </tr>     
            <tr>

                <th>Set Description</th>
                <td><input type="text" name="set_description" placeholder="Description" value="<?php echo $data['set_description'] ?>" /></td>

            </tr>
            <tr>

                <input type="hidden" name="id" value="<?php echo $data['set_id']?>" />
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
