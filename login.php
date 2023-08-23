<?php
  ob_start();
  session_start();

  if(isset($_SESSION['username'])){
    header('Location: home');
  }
?>

<?php 
    $title = "Login";
    include('header.php');     
?>

<?php

  include('user_database.php');
  $_SESSION['username'] = null;
  $_SESSION['pass'] = null;
  $username = null;
  $name_error = "";
  $password_error = "";

  if(isset($_POST['login'])){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['pass'] = $_POST['password'];
        $username = $_SESSION['username'];
        
        
    if($_SESSION['username'] && $_SESSION['pass']){
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $check = mysqli_query($connection, $sql);

      if(mysqli_num_rows($check) > 0){
          while($row = mysqli_fetch_assoc($check)){
            $db_userid = $row['id'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_username = $row['username'];
            $db_email = $row['email'];
            $db_password = $row['pass'];
            $verify_password = password_verify($_SESSION['pass'], $db_password);
            $_SESSION['user_id'] = $db_userid;
            $_SESSION['first_name'] = $db_first_name;
            $_SESSION['last_name'] = $db_last_name;
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $db_email;
            $_SESSION['db_password'] = $db_password;
          }

          if(($_SESSION['username'] == $db_username) && $verify_password){
            $_SESSION['user_id'];
            $_SESSION['first_name'];
            $_SESSION['last_name'];
            $_SESSION['username'];
            $_SESSION['email'];
            $_SESSION['db_password'];
            header('Location: home');
            ob_end_flush();
          }
          else{
           $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Incorrect username or password!</span>";
          }
      }
      else{
        $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>User is not registered!</span>";
      }
    }
    elseif(empty($_SESSION['username']) && empty($_SESSION['pass'])){
      $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Fill in all fields!</span>";
    }
  }

  mysqli_close($connection);
?>

<head>
  <link rel="stylesheet" href="form.css">
</head>
        <div class="container">
          <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
              <h1>SIGN IN</h1>
              <span class="error"><?php echo $error_message?></span>
              <input type="text" name="username" placeholder="Enter username" value="<?php echo $username?>">
              
              <input type="password" name="password" placeholder="Enter password">

              <input type="submit" name="login" value="LOGIN">

              <p><a href="forgot-password">Forgot password?</a></p>
              <p>Don't have an account?
              <a href="register">Register here</a>
              </p>
          </form>
        </div>
  
  <script src="script.js"></script>
</body>
</html>