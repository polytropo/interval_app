<?php

 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

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
	<title></title>
</head>
<body>
	<!--	<?php while($setsRow = mysqli_fetch_assoc($res)) {
			echo ("<p>".$setsRow['set_id']."</p>");
		} ?> -->

	<!-- Sets table -->
    <a href="../set_crud/sets_create.php"><button type="button">Add Set</button></a>
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
            if(isset($_GET['id'])) {
            	$sid = $_GET['id'];
            	$sql = "SELECT * FROM sets WHERE fk_user_id = $sessionUID AND set_id = $sid";
            $result = $connect->query($sql);
            }
            
            # INNER JOIN users ON fk_user_id = users.user_id 
 

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>".$row['set_name']."</td>
                        <td>".$row['set_description']."</td>
                        <td>

                            <a href='../set_crud/sets_update.php?id=".$row['set_id']."'><button type='button'>Edit</button></a>

                            <a href='../set_crud/sets_delete.php?id=".$row['set_id']."'><button type='button'>Delete</button></a>
                            
                        </td>
                    </tr>";
                }

            } else {
                echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
            }

            ?>


             

        </tbody>
    </table>
	



		<!-- Intervals table -->
    <a href="../int_crud/int_create.php?id=<?php echo $sid; ?>"><button type="button">Add Interval</button></a>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>

            <tr>
                <th>Interval Name</th>
                <th>Interval Description</th>
                <th>Interval Length</th>
                <th>Interval Color</th>
                <th>Option</th>
            </tr>

        </thead>
        <tbody>

            <?php
       
            $sql = "SELECT * FROM intervals 
            		LEFT JOIN sets_intervals ON intervals.interval_id = sets_intervals.fk_interval_id  
            		LEFT JOIN sets ON sets_intervals.fk_set_id = sets.set_id 
            		WHERE intervals.fk_user_id = $sessionUID AND sets.set_id = $sid"; 
            $result = $connect->query($sql);
            # INNER JOIN users ON fk_user_id = users.user_id 
 

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {

                    echo "<tr>
                        <td>".$row['interval_name']."</td>
                        <td>".$row['interval_description']."</td>
                        <td>".$row['length']."</td>
                        <td>".$row['interval_color']."</td>
                        <td>

                            <a href='../int_crud/int_update.php?id=".$row['interval_id']."'><button type='button'>Edit</button></a>
                            <a href='../int_crud/int_delete.php?id=".$row['interval_id']."'><button type='button'>Delete</button></a>

                        </td>
                    </tr>";
                }

            } else {
                echo "<tr><td colspan='8'><center>No Data Avaliable</center></td></tr>";
            }

            ?>


             

        </tbody>
    </table>
    <a href="../home.php"><button type="button">Back</button></a>
</body>
</html>