<?php

 ob_start();
 session_start(); // start a new session or continues the previous
 if( isset($_SESSION['user'])!="" ){
  header("Location: ../home.php"); // redirects to home.php

 }

 include_once '../database/dbconnect.php';


 $error = false;


 if ( isset($_POST['btn-signup']) ) {

 

  // sanitize user input to prevent sql injection

  $uname = trim($_POST['uname']);
  $uname = strip_tags($uname);
  $uname = htmlspecialchars($uname);

 

  $uemail = trim($_POST['uemail']);
  $uemail = strip_tags($uemail);
  $uemail = htmlspecialchars($uemail);

 

  $upass = trim($_POST['upass']);
  $upass = strip_tags($upass);
  $upass = htmlspecialchars($upass);

 

  // basic name validation

  if (empty($uname)) {
   $error = true;
   $nameError = "Please enter your full name.";

  } else if (strlen($uname) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";

  } else if (!preg_match("/^[a-zA-Z ]+$/",$uname)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";

  }

 

  //basic email validation

  if ( !filter_var($uemail,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";

  } else {

   // check whether the email exist or not

   $query = "SELECT user_email FROM users WHERE user_email='$uemail'";
   $result = mysqli_query($connect, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";

   }
  }

  // password validation

  if (empty($upass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($upass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";

  }

 

  // password encrypt using SHA256();

  $password = hash('sha256', $upass);

  // if there's no error, continue to signup

  if( !$error ) {
   $query = "INSERT INTO users(user_name, user_email, user_pass) VALUES('$uname','$uemail','$password')";
   $res = mysqli_query($connect, $query);

   

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($uname);
    unset($uemail);
    unset($upass);

   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";

   }
  

  }
 

 }
?>

<!DOCTYPE html>
<html>

<head>
<title>Login & Registration System</title>
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">


             <h2>Sign Up.</h2>
             <hr />
           

            <?php

   if ( isset($errMSG) ) {


    ?>


             <div class="alert">

 <?php echo $errMSG; ?>

             </div>

 <?php

   }

   ?>


             <input type="text" name="uname" class="form-control" placeholder="Enter Name" maxlength="50" value="<?php echo $uname ?>" />

                <span class="text-danger"><?php echo $nameError; ?></span>

             <input type="email" name="uemail" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $uemail ?>" />

                <span class="text-danger"><?php echo $emailError; ?></span> 

             <input type="password" name="upass" class="form-control" placeholder="Enter Password" maxlength="15" />

                <span class="text-danger"><?php echo $passError; ?></span>
       
             <hr />
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>

             <hr />

             <a href="index.php">Sign in Here...</a>

     

   

    </form>

</body>
</html>
<?php ob_end_flush(); ?>