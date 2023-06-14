<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="register-and-login.css">
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

  $full_name = $_POST['full_name'];
  $pass = $_POST['password'];

  if(isset($_POST['login'])){
    if($full_name && $pass){
      $sql = "SELECT * FROM user_info WHERE full_name = '$full_name'";
      $check = mysqli_query($connection, $sql);

      if(mysqli_num_rows($check) > 0){
          while($row = mysqli_fetch_assoc($check)){
            $db_full_name = $row['full_name'];
            $db_password = $row['pass'];
          }

          if(($full_name == $db_full_name) && ($pass == $db_password)){
            echo '<p style="color: green; font-size: 2rem;">Logged in!</p>';

            header('Location: home.php');

          }
          else{
            echo '<p style="color: red; font-size: 2rem;">Wrong password!</p>';
          }
      }
      else{
        echo '<p style="color: red; font-size: 2rem;">User is not registered!</p>';
      }
    }
    elseif(empty($full_name) || empty($pass)){
      echo '<p style="color: red; font-size: 2rem;">Fill in all fields!</p>';
    }
  }

  mysqli_close($connection);
?>