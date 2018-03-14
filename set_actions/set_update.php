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

    $sname = $_POST['set_name'];
    $sdescription = $_POST['set_description'];

    $id = $_POST['id'];

    $sql = "UPDATE sets SET set_name = '$sname', set_description = '$sdescription' WHERE set_id = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../set_crud/sets_update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {
        echo "Erorr while updating record : ". $connect->error;

    }

    $connect->close();

}

?>