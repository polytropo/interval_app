<!DOCTYPE html>
<html>
<head>

    <title>PHP CRUD  |  Add User</title>

</head>
<body>

 

<fieldset>
    <legend>Add User</legend>

 

    <form action="actions/a_create.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>

                <th>User Name</th>
                <td><input type="text" name="user_name" placeholder="First Name" /></td>

            </tr>     
            <tr>

                <th>User Email</th>
                <td><input type="text" name="user_email" placeholder="User Email" /></td>

            </tr>
            <tr>

                <td><button type="submit">Insert user</button></td>
                <td><a href="index.php"><button type="button">Back</button></a></td>

            </tr>
        </table>
    </form>

 

</fieldset>

</body>
</html>
<?php ob_end_flush(); ?>