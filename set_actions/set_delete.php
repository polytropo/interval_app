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

    $id = $_POST['id'];
    #$userSession = $_SESSION['user'];


    $sql = "DELETE FROM sets WHERE set_id = {$id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Set Successfully Deleted</p>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

    $connect->close();

}

?>
<?php ob_end_flush(); ?>