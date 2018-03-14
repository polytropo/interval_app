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
    $userSession = $_SESSION['user'];

    $sql = "INSERT INTO sets (set_name, set_description, fk_user_id) VALUES ('$sname', '$sdescription', '$userSession')";

    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../set_crud/sets_create.php'><button type='button'>Back</button></a>";
        echo "<a href='../user_log_reg/index.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

    $connect->close();

}


?>
<?php ob_end_flush(); ?>