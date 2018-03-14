<?php
 ob_start();
 session_start();
require_once '../database/dbconnect.php';

// if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: ../user_log_reg/index.php");

  exit;
}

if($_POST) {

    $intname = $_POST['interval_name'];
    $intdescription = $_POST['interval_description'];
    $intlength = $_POST['length'];
    $intcolor = $_POST['interval_color'];
    $userSession = $_SESSION['user'];

    $id = $_POST['id'];

    $sql = "UPDATE intervals SET interval_name = '$intname', interval_description = '$intdescription', length = '$intlength', interval_color = '$intcolor' WHERE interval_id = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../int_crud/int_update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {
        echo "Erorr while updating record : ". $connect->error;

    }

    $connect->close();

}

?>