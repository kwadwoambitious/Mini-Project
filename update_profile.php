<?php
  ob_start();
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>

<?php 
    include('user_database.php');

    $first_name = null;
    $last_name = null;
    $username = null;
    $email = null;
    $pass = null;
    $new_pass = null;

    if(isset($_POST['update'])){
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $username = $_POST['username'];
      $email = $_POST["email"];
      $pass = $_POST['password'];
      $new_pass = $_POST['new_password'];

      if($first_name && $last_name && $username && $email && $pass && $new_pass){
        if(strlen($first_name) >= 4 && strlen($last_name) >= 4 && strlen($username) >= 7 && strlen($pass) >= 8 && strlen($new_pass) >= 8){
            if (preg_match("/^[a-zA-Z]*$/", $first_name) && preg_match("/^[a-zA-Z]*$/", $last_name) && preg_match("/^[a-z0-9]*$/", $username) && filter_var($email, FILTER_VALIDATE_EMAIL)) {

              
              $verify_password = password_verify($pass, $_SESSION['db_password']);
              $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
              
              if($verify_password){
                $id = $_SESSION['user_id'];
                $sql = "
                    UPDATE users
                    SET first_name = '$first_name', last_name = '$last_name', username = '$username', email = '$email', pass = '$hashed_password', c_pass = '$hashed_password'
                    WHERE id = '$id'
                ";
                mysqli_query($connection, $sql);
                $success_message = "<span style='color: green; padding: 10px; font-family: 'Poppins', sans-serif;'>Changes saved!</span>";
              }
              else{
                $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Old password is incorrect!</span>";
              }
        
            }
        }
        else{
          if(!preg_match("/^[a-zA-Z]*$/",$first_name)){ 
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Incorrect first name!</span>";
          }
          else if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Incorrect last name!</span>";
          }
          else if(!preg_match("/^[a-z0-9]*$/", $username)){
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Invalid username!</span>";
          }
          else if(strlen($first_name) < 4 || strlen($last_name) < 4 || strlen($username) < 7){            
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Firstname, Lastname or Username is short</span>";
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Invalid email!</span>";
          }
          else if(strlen($new_pass) < 8){
            $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>New password must be at least 8 characters!</span>";
          }
        }
      }
      else{
        $error_message = "<span style='color: red; padding: 10px; font-family: 'Poppins', sans-serif;'>Kindly fill in all fields!</span>";
      }
    }

    mysqli_close($connection);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="home_page.css">
  <link rel="stylesheet" href="threadlist.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Profile Update</title>
</head>
<body>
   <div class="profile-update-container">
    <div class="update-profile">
       <img src="images/noprofil.jpg">
       <div class="profile-info">
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
        <span class="error"><?php echo $error_message?></span>
        <span class="error"><?php echo $success_message?></span>
        <div class="profile-flex">
          <label>Your first name: 
          <input type="text" name="first_name" placeholder="Enter first name" value="<?php echo $_SESSION['first_name']?>">
          </label>

          <label>Your last name:
          <input type="text" name="last_name" placeholder="Enter last name" value="<?php echo $_SESSION['last_name']?>">
          </label>
        </div>

       <div class="profile-flex">
        <label>Your username:
        <input type="text" name="username" placeholder="Enter username" value="<?php echo $_SESSION['username']?>">
        </label>
          
          <label>Your email address:
          <input type="email" name="email" placeholder="Enter email address" value="<?php echo $_SESSION['email']?>">
          </label>
       </div>
       
        <div class="profile-flex">
          <label>Your old password:
            <input type="password" name="password" placeholder="Enter password">
          </label>
          
          <label>Your new password:
          <input type="password" name="new_password" placeholder="new password">
          </label>
        </div>
        <input type="submit" name="update" value="Save Changes" class="updateBtn">
        <a href="profile" class="updateClose">Close</a>
        </form>
       </div>
    </div>
   </div>

   <script src="script.js"></script>

</body>
</html>