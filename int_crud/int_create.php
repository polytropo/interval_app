<?php
 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: user_log_reg/index.php");

  exit;
}

if(isset($_GET['id'])) {
    $sid = $_GET['id'];
    
}

?>
<!DOCTYPE html>
<html>
<head>

    <title>PHP CRUD  |  Add Interval</title>

</head>
<body>

 

<fieldset>
    <legend>Add Interval</legend>

 

    <form action="../int_actions/int_create.php" method="get">
        <input type="hidden" name="setid" value="<?php echo $sid ?>" />
        <table cellspacing="0" cellpadding="0">
            <tr>
        
                <th>Interval Name</th>
                <td><input type="text" name="interval_name" placeholder="Interval Name" /></td>

            </tr>     
            <tr>

                <th>Interval Description</th>
                <td><input type="text" name="interval_description" placeholder="Description" /></td>

            </tr>
            <tr>

                <th>Interval Length</th>
                <td><input type="number" name="length" placeholder="Seconds length" /></td>

            </tr>
            <tr>

                <th>Interval Color</th>
                <td><input type="text" name="interval_color" placeholder="Interval Color" /></td>

            </tr>
            <tr>

                <td><button type="submit">Create Interval</button></td>
                <td><a href="../home.php"><button type="button">Back</button></a></td>

            </tr>
        </table>
    </form>

 

</fieldset>

</body>
</html>
<?php ob_end_flush(); ?>