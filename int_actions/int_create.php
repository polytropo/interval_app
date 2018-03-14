<?php
 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: ../user_log_reg/index.php");

  exit;
}

$sid = $_GET['setid'];
echo $sid;

if($_GET) {
    
    $intname = $_GET['interval_name'];
    $intdescription = $_GET['interval_description'];
    $intlength = $_GET['length'];
    $intcolor = $_GET['interval_color'];
    $userSession = $_SESSION['user'];
    
    
    $sql = "
    INSERT INTO intervals (interval_name, interval_description, length, interval_color, fk_user_id)
    VALUES('$intname', '$intdescription', '$intlength', '$intcolor', '$userSession')";
    $sql2 = "INSERT INTO sets_intervals (fk_set_id, fk_interval_id) 
    VALUES( '$sid', LAST_INSERT_ID());
    ";


    if($connect->query($sql) === TRUE && $connect->query($sql2)) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../int_crud/int_create.php'><button type='button'>Back</button></a>";
        echo "<a href='../user_log_reg/index.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

    $connect->close();

}


?>
<?php ob_end_flush(); ?>