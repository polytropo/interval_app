<?php
ob_start();
 session_start();

require_once '../database/dbconnect.php';

if($_GET['id']) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM sets WHERE set_id = {$id}";
    $result = $connect->query($sql);
    $data = $result->fetch_assoc();
 
    $connect->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Set</title>
</head>
<body>

<h3>Do you really want to delete this set?</h3>
<form action="../set_actions/set_delete.php" method="post">

    <input type="hidden" name="id" value="<?php echo $data['set_id'] ?>" />
    <button type="submit">Yes, delete it!</button>
    <a href="../home.php"><button type="button">No, go back!</button></a>

</form>
</body>
</html>
<?php
}
?>
<?php ob_end_flush(); ?>