<?php

require_once 'database/dbconnect.php';

if($_POST) {

    $uname = $_POST['user_name'];
    $uemail = $_POST['user_email'];


    $sql = "INSERT INTO users (user_name, user_email) VALUES ('$uname', '$uemail')";

    if($connect->query($sql) === TRUE) {
        echo "<p>New Record Successfully Created</p>";
        echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";

    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

    $connect->close();

}

?>