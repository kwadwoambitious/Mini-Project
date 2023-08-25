<?php
  ob_start();
  session_start();

  if(isset($_SESSION['username'])){
    header('Location: home');
  }
?>

<?php 
    $title = "Set Password";
    include('includes/header.php');     
?>

<?php

  include('database-connection/user_database.php');
  $password = null;
  $confirm_password= null;

  if(isset($_POST['set'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password && $confirm_password){
      if(strlen($password) >= 8 && ($password == $confirm_password)){

        $token = $_SESSION['token'];
        $email = $_SESSION['email'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $hashed_confirm_password = password_hash($confirm_password, PASSWORD_DEFAULT);

        $sql = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
        $query = mysqli_num_rows($sql);
  	    $fetch = mysqli_fetch_assoc($sql);

        if($email){
            $new_pass = $hashed_password;
            $new_con_pass = $hashed_confirm_password;
            mysqli_query($connection, "UPDATE users SET pass='$new_pass' AND c_pass='$new_con_pass' WHERE email='$email'");

            $success_message = "<span style='color: #025f02; border: 1px solid #025f02;background-color:  #025f028a; padding: 12px;'>Password has been reset. <br><a href='login'>Login here!</a></span>";
        }
        else{
          ?>
          <script>
              alert("<?php echo "Please try again"?>");
          </script>
          <?php
      }
      }
    }
       
  }

  mysqli_close($connection);
?>

<head>
  <link rel="stylesheet" href="css/form.css">
</head>
        <div class="container">
          <h1 style="color: white; font-size: 4rem;">New Password</h1>
          <form action="<?php $_SERVER["PHP_SELF"]?>" method="post" style="padding: 20px;">
              <span class="error"><?php echo $error_message?></span>
              <input type="password" name="password" placeholder="Enter passsword">
              
              <input type="password" name="confirm_password" placeholder="Enter confirm password">

              <input type="submit" name="set" value="SET NEW PASSWORD">
              <span><?php echo $success_message?></span>
          </form>
        </div>
  
  <script src="javascript/script.js"></script>
</body>
</html>