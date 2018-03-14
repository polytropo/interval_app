<?php

// this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE ); 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "projekt3_group_4";

 

// create connection

$connect = new mysqli($localhost, $username, $password, $dbname);

 

// check connection

if($connect->connect_error) {
    die("connection failed: " . $connect->connect_error);
} else {

    // echo "Successfully Connected";

}

 

?>