<?php

require_once '../database/dbconnect.php';


if($_POST) {

    $uname = $_POST['user_name'];

    $uemail = $_POST['user_email'];

    $id = $_POST['id'];

    $sql = "UPDATE users SET user_name = '$uname', user_email = '$uemail' WHERE user_id = {$id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";
        echo "<a href='../update.php?id=".$id."'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {
        echo "Erorr while updating record : ". $connect->error;

    }

    $connect->close();

}

?>