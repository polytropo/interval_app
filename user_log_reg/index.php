<?php
 ob_start();
 session_start();
 require_once '../database/dbconnect.php';

 // it will never let you open index(login) page if session is set

 if ( isset($_SESSION['user'])!="" ) {
  header("Location: ../home.php");
  exit;

 }

 $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $uemail = trim($_POST['uemail']);
  $uemail = strip_tags($uemail);
  $uemail = htmlspecialchars($uemail);

 

  $upass = trim($_POST['upass']);
  $upass = strip_tags($upass);
  $upass = htmlspecialchars($upass);

  // prevent sql injections / clear user invalid inputs

  if(empty($uemail)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($uemail,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";

  }

 

  if(empty($upass)){
   $error = true;
   $passError = "Please enter your password.";

  }

 

  // if there's no error, continue to login

  if (!$error) {
   $password = hash('sha256', $upass); // password hashing using SHA256

   $res=mysqli_query($connect, "SELECT user_id, user_name, user_pass FROM users WHERE user_email='$uemail'");

   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);

   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   

   if( $count == 1 && $row['user_pass']==$password ) {
    $_SESSION['user'] = $row['user_id'];
    header("Location: ../home.php");

   } else {
    $errMSG = "Incorrect Credentials, Try again...";

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

             <h2>Sign In.</h2>
             <hr />

             

            <?php
   if ( isset($errMSG) ) {

echo $errMSG; ?>

                <?php

   }

   ?>

           

           

             

             <input type="email" name="uemail" class="form-control" placeholder="Your Email" value="<?php echo $uemail; ?>" maxlength="40" />

             <span class="text-danger"><?php echo $emailError; ?></span>

             <input type="password" name="upass" class="form-control" placeholder="Your Password" maxlength="15" />

            <span class="text-danger"><?php echo $passError; ?></span>


             <hr />

             <button type="submit" name="btn-login">Sign In</button>

             <hr />

             <a href="register.php">Sign Up Here...</a>

    </form>
    </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>