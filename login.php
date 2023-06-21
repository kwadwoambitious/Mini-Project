<?php
  session_start();

  if(isset($_SESSION['full_name'])){
    header('Location: home.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Talk - Login</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <h1>Login to your account.</h1>
  <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
    <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off">
    <input type="password" name="password" placeholder="Enter password" >
    <input type="submit" name="login" value="Login">
    <p>Don't have an account?
      <a href="register.php">Register here</a>
    </p>
  </form>
</body>
</html>

<?php

  include('user_database.php');

  $_SESSION['full_name'] = $_POST['full_name'];
  $_SESSION['pass'] = $_POST['password'];

  $name = $_SESSION['full_name'];

  if(isset($_POST['login'])){
    if($_SESSION['full_name'] && $_SESSION['pass']){
      $sql = "SELECT * FROM user_info WHERE full_name = '$name'";
      $check = mysqli_query($connection, $sql);

      if(mysqli_num_rows($check) > 0){
          while($row = mysqli_fetch_assoc($check)){
            $db_full_name = $row['full_name'];
            $db_password = $row['pass'];
            $db_email = $row['email'];
            $_SESSION['email'] = $db_email;
          }

          if(($_SESSION['full_name'] == $db_full_name) && ($_SESSION['pass'] == $db_password)){
            $_SESSION['email'];
            header('Location: home.php');
            
            // echo '<p style="color: green; font-size: 2rem;">Logged in!</p>';

          }
          else{
            echo '<p style="color: red; font-size: 2.2rem;">Wrong password!</p>';
          }
      }
      else{
        echo '<p style="color: red; font-size: 2.2rem;">User is not registered!</p>';
      }
    }
    elseif(empty($_SESSION['full_name']) || empty($_SESSION['pass'])){
      echo '<p style="color: red; font-size: 2.2rem;">Fill in all fields!</p>';
    }
  }

  mysqli_close($connection);
?>