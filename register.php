<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Talk - Register</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <h1>Have an account now.</h1>
  <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off" >
    <input type="email" name="email" placeholder="Enter email address" autocomplete="off">
    <input type="password" name="password" placeholder="Enter password">
    <input type="password" name="confirm_password" placeholder="Confirm password" >
    <input type="submit" name="register" value="Register">
    <p>Already have an account?
      <a href="login.php">Login now</a>
    </p>
  </form>
</body>
</html>


<?php
  include('user_database.php');

  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $confirm_pass = $_POST['confirm_password'];


  if(isset($_POST['register'])){
    if($full_name && $email && $pass && $confirm_pass){
        if(strlen($full_name) >= 10 && strlen($full_name) < 25 && strlen($pass) > 8 && ($pass == $confirm_pass)){
          $sql = "INSERT INTO user_info (full_name, email, pass, c_pass) VALUES ('$full_name', '$email', '$pass',  '$confirm_pass')";

           mysqli_query($connection, $sql);

            echo '<p style="color: green; font-size: 1.8rem;">Registered successfully!</p>';

            header('Location: login.php');
        }
        else{
          if(strlen($full_name) < 10 || strlen($full_name) > 25){
            echo '<p style="color: red; font-size: 1.8rem;">Name must be between 10 and 25 characters.</p> <br>';
          }
          if(strlen($pass) < 8){
            echo '<p style="color: red; font-size: 1.8rem;">Password must be longer than 8 characters.</p> <br>';
          }
          if($pass != $confrim_pass){
            echo '<p style="color: red; font-size: 1.8rem;">Passwords do not match.</p> <br>';
          }
      }
    }
    else{
      echo '<p style="color: red; font-size: 1.8rem;">Please fill in all fields.</p> <br>';
    }
  }
  mysqli_close($connection);
?>