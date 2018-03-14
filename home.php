<?php

 ob_start();
 session_start();
 require_once 'database/dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['user']) ) {
  header("Location: user_log_reg/index.php");

  exit;

 }

 // select logged-in users detail 
 $sessionUID = $_SESSION['user'];
 $res=mysqli_query($connect, "SELECT * FROM users WHERE user_id = $sessionUID");

 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>

    <title>Welcome - <?php echo $userRow['user_email'] . " " . $userRow['user_name']; ?></title>

</head>
<body>
<!--
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>

            <tr>
                <th>User Name</th>
                <th>User Email</th>
                <th>Option</th>
            </tr>

        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM users";
            $result = $connect->query($sql);

 

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>".$row['user_name']."</td>
                        <td>".$row['user_email']."</td>
                        <td>

                            <a href='update.php?id=".$row['user_id']."'><button type='button'>Edit</button></a>
                            <a href='delete.php?id=".$row['user_id']."'><button type='button'>Delete</button></a>

                        </td>
                    </tr>";
                }

            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }

            ?>


             

        </tbody>
    </table>
    <br>
    -->

     Hi' <?php echo $userRow['user_email']; ?>
 
            </br>
            <a href="user_log_reg/logout.php?logout"><button type="button">Sign Out</button></a>
            </br>
    <!-- Sets table -->
    <a href="set_crud/sets_create.php"><button type="button">Add Set</button></a>
    </br>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>

            <tr>
                <th>Set Name</th>
                <th>Set Description</th>
                <th>Option</th>
            </tr>

        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM sets WHERE fk_user_id = $sessionUID";
            $result = $connect->query($sql);
            # INNER JOIN users ON fk_user_id = users.user_id 
 

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>".$row['set_name']."</td>
                        <td>".$row['set_description']."</td>
                        <td>

                            <a href='set_crud/sets_home.php?id=".$row['set_id']."'><button type='button'>Details</button></a>
                        </td>
                    </tr>";
                }

            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }

            ?>


             

        </tbody>
    </table>

     


</body>
</html>
<?php ob_end_flush(); ?>