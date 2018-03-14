<?php
require_once 'database/dbconnect.php';

if($_GET['id']) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE user_id = {$id}";

    $result = $connect->query($sql);


    $data = $result->fetch_assoc();

    $connect->close();
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit User</title>

</head>
<body>

<fieldset>
    <legend>Update user</legend>

    <form action="actions/a_update.php" method="post">
        <table cellspacing="0" cellpadding="0">

            <tr>

                <th>User Name</th>
                <td><input type="text" name="user_name" placeholder="User Name" value="<?php echo $data['user_name'] ?>" /></td>

            </tr>     
            <tr>

                <th>User Email</th>
                <td><input type="text" name="user_email" placeholder="User Email" value="<?php echo $data['user_email'] ?>" /></td>

            </tr>
            <tr>

                <input type="hidden" name="id" value="<?php echo $data['user_id']?>" />
                <td><button type="submit">Save Changes</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>

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

