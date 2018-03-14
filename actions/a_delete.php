<?php
require_once '../database/dbconnect.php';

if($_POST) {

    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE user_id = {$id}";

    if($connect->query($sql) === TRUE) {
        echo "<p>Successfully deleted!!</p>";
        echo "<a href='../index.php'><button type='button'>Back</button></a>";

    } else {
        echo "Error updating record : " . $connect->error;

    }

    $connect->close();
}

?>