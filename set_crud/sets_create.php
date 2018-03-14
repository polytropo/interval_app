<?php
 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: user_log_reg/index.php");

  exit;
}
?>
<!DOCTYPE html>
<html>
<head>

    <title>PHP CRUD  |  Add Set</title>

</head>
<body>

 

<fieldset>
    <legend>Add Set</legend>

 

    <form action="../set_actions/set_create.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>

                <th>Set Name</th>
                <td><input type="text" name="set_name" placeholder="Set Name" /></td>

            </tr>     
            <tr>

                <th>Set Description</th>
                <td><input type="text" name="set_description" placeholder="Description" /></td>

            </tr>
            <tr>

                <td><button type="submit">Insert set</button></td>
                <td><a href="../home.php"><button type="button">Back</button></a></td>

            </tr>
        </table>
    </form>

 

</fieldset>

</body>
</html>
<?php ob_end_flush(); ?>