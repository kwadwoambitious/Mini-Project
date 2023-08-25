<?php 
    $title = "Register";
    include('includes/header.php');   
?>

<?php
  include('database-connection/user_database.php');
  
  $first_name = null;
  $last_name = null;
  $username = null;
  $email = null;
  $pass = null;
  $confirm_pass = null;

  if(isset($_POST['register'])){
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $username = $_POST['username'];
      $email = $_POST["email"];
      $pass = $_POST['password'];
      $confirm_pass = $_POST['confirm_password'];
      
    if($first_name && $last_name && $username && $email && $pass && $confirm_pass){
        if(strlen($first_name) >= 4 && strlen($last_name) >= 4 && strlen($username) >= 7 && strlen($pass) >= 8 && ($pass == $confirm_pass)){
            if (preg_match("/^[a-zA-Z]*$/", $first_name) && preg_match("/^[a-zA-Z]*$/", $last_name) && preg_match("/^[a-z0-9]*$/", $username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $sql = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
              $check = mysqli_query($connection, $sql);
        
              if(mysqli_num_rows($check) > 0){
                  $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Email is already taken!</span>";
              }
              else{
                $password = password_hash($pass, PASSWORD_DEFAULT);
                $confirm_password = password_hash($confirm_pass, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (first_name, last_name, username, email, pass, c_pass) VALUES ('$first_name', '$last_name', '$username', '$email', '$password',  '$confirm_password')";

                mysqli_query($connection, $sql);
                header("Location: success");
                ob_end_flush();
              }
              }
        }
        else{
          if(!preg_match("/^[a-zA-Z]*$/",$first_name)){ 
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Incorrect first name!</span>";
          }
          else if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Incorrect last name!</span>";
          }
          else if(!preg_match("/^[a-z0-9]*$/", $username)){
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Invalid username!</span>";
          }
          else if(strlen($first_name) < 4 || strlen($last_name) < 4 || strlen($username) < 7){            
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Firstname, Lastname or Username is short</span>";
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Invalid email!</span>";
          }
          else if(strlen($pass) < 8){
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Cannot be less than 8 characters!</span>";
            
          }
          else if($pass != $confirm_pass){
            $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Passwords do not match!</span>";
          }
      }
    }
    else{
      $error_message = "<span style='color: #ab4739; border: 1px solid #ab4739;background-color:  #f8d7da; padding: 12px;'>Kindly fill in all fields!</span>";
    }
  }
  mysqli_close($connection);
?>

<head>
   <link rel="stylesheet" href="css/form.css">
</head>
  <div class="container">
      <form action="<?php $_SERVER["PHP_SELF"]?>" method="post" class="register">
          <h1>SIGN UP</h1>
        <span class="error"><?php echo $error_message?></span>

        <div class="form-flex">
          <input type="text" name="first_name" placeholder="Enter first name" value="<?php echo $first_name?>">
          <input type="text" name="last_name" placeholder="Enter last name" value="<?php echo $last_name?>">
        </div>

       <div class="form-flex">
          <input type="text" name="username" placeholder="Enter username" value="<?php echo $username?>">
          <input type="email" name="email" placeholder="Enter email address" value="<?php echo $email?>">
       </div>
       
        <div class="form-flex">
          <input type="password" name="password" placeholder="Enter password">
          <input type="password" name="confirm_password" placeholder="Confirm password">
        </div>

        <input type="submit" name="register" value="REGISTER">

        <p>Already have an account?
          <a href="login">Login now</a>
        </p>
      </form>
  </div>
  
  <script src="javascript/script.js"></script>
</body>
</html>