<?php
 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: ../user_log_reg/index.php");

  exit;
}
$id = $_POST['id'];

if($_POST) {

    $id = $_POST['id'];
    $userSession = $_SESSION['user'];
    


    $sql = "DELETE FROM intervals WHERE interval_id = $id AND fk_user_id = $userSession";
    $sql2 = "DELETE FROM sets_intervals WHERE fk_interval_id = $id";
    
    if($connect->query($sql) === TRUE && $connect->query($sql2) === TRUE) {
        echo "<p>Interval Successfully Deleted</p>";
        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

    $connect->close();

}

?>
<?php ob_end_flush(); ?>