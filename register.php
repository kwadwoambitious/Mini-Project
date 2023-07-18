<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Register</title>
  <link rel="stylesheet" href="form.css">
</head>
<body>
  <header>
          <h1>webForum</h1>
          <nav>
            <ul class="main-menu">
              <li><a href="index.php" class="">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="login.php" class="login">Login</a></li>
      </ul>
            </ul>
            <div class="menu-bar">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
          </nav>
  </header>
  <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
      <h1>SIGN UP</h1>
      <hr>
    <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off" >
    
    <input type="email" name="email" placeholder="Enter email address" autocomplete="off">
     
    <input type="password" name="password" placeholder="Enter password">
     
    <input type="password" name="confirm_password" placeholder="Confirm password" >

    <input type="submit" name="register" value="Register">

    <p>Already have an account?
      <a href="login.php">Login now</a>
    </p>
  </form>
  
  <script>
      const mainMenu = document.querySelector(".main-menu");
      const menuBar = document.querySelector(".menu-bar");
      
        menuBar.addEventListener("click", () => {
            menuBar.classList.toggle("active");
            mainMenu.classList.toggle("active");
        });
        
        document.querySelectorAll(".menu-item").forEach(n => n.addEventListener("click", () => {
            menuBar.classList.remove("active");
            mainMenu.classList.remove("active");
            
        }));
  </script>
</body>
</html>


<?php
  include('user_database.php');
  
  $full_name = null;
  $email = null;
  $pass = null;
  $confirm_pass = null;

  if(isset($_POST['register'])){
      $full_name = $_POST['full_name'];
      $email = $_POST["email"];
      $pass = $_POST['password'];
      $confirm_pass = $_POST['confirm_password'];
      
    if($full_name && $email && $pass && $confirm_pass){
        if(strlen($full_name) >= 10 && strlen($full_name) < 25 && strlen($pass) >= 8 && ($pass == $confirm_pass)){
            if (preg_match("/^[a-zA-Z-' ]*$/",$full_name)) {
                $sql = "INSERT INTO register_info (full_name, email, pass, c_pass) VALUES ('$full_name', '$email', '$pass',  '$confirm_pass')";

                mysqli_query($connection, $sql);
                
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                  <meta charset="UTF-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Document</title>
                  <link rel="stylesheet" href="modal.css">
                </head>
                <body>
                  <div class="modal-container">
                        <div class="modal">
                            <img src="images/404-tick.png">
                            <p>Registered successfully.</p>
                            <p class="last-p">You can login now!</p>
                            <a href="login.php" style="background-color: rgba(51, 173, 51, 0.938);">Login</a>
                        </div>
                  </div>
                </body>
                </html>
                ';
              }
        }
        else{
          if(strlen($full_name) < 10 || strlen($full_name) > 25){
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <link rel="stylesheet" href="modal.css">
            </head>
            <body>
              <div class="modal-container">
                    <div class="modal">
                        <img src="images/error-1.png">
                        <p>Incorrect name length.</p>
                        <p class="last-p">Must be between 10 and 25 characters!</p>
                        <a href="register.php">Go back</a>
                    </div>
              </div>
            </body>
            </html>
            ';
          }
          else if(!preg_match("/^[a-zA-Z-' ]*$/",$full_name)){
              echo '
              <!DOCTYPE html>
              <html lang="en">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="modal.css">
              </head>
              <body>
                <div class="modal-container">
                      <div class="modal">
                          <img src="images/error-1.png">
                          <p>Wrong name characters.</p>
                          <p class="last-p">Only letters and white space!</p>
                          <a href="register.php">Go back</a>
                      </div>
                </div>
              </body>
              </html>
            ';
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              echo '
              <!DOCTYPE html>
              <html lang="en">
              <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="modal.css">
              </head>
              <body>
                <div class="modal-container">
                      <div class="modal">
                          <img src="images/error-1.png">
                          <p>The email is incorrect.</p>
                          <p class="last-p">Enter valid email!</p>
                          <a href="register.php">Go back</a>
                      </div>
                </div>
              </body>
              </html>
            ';
          }
          else if(strlen($pass) < 8){
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <link rel="stylesheet" href="modal.css">
            </head>
            <body>
              <div class="modal-container">
                    <div class="modal">
                        <img src="images/error-1.png">
                        <p>Password\'s length is short.</p>
                        <p class="last-p">Length must not be less than 8 characters!</p>
                        <a href="register.php">Go back</a>
                    </div>
              </div>
            </body>
            </html>
            ';
          }
          else if($pass != $confirm_pass){
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <link rel="stylesheet" href="modal.css">
            </head>
            <body>
              <div class="modal-container">
                    <div class="modal">
                        <img src="images/error-1.png">
                        <p>Passwords do not match.</p>
                        <p class="last-p">Passwords must match!</p>
                        <a href="register.php">Re-enter</a>
                    </div>
              </div>
            </body>
            </html>
              ';
          }
      }
    }
    else{
      echo '
      <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="modal.css">
      </head>
      <body>
        <div class="modal-container">
              <div class="modal">
                  <img src="images/error-1.png">
                  <p>The fields are empty.</p>
                  <p class="last-p">Kindly fill in all fields!</p>
                  <a href="register.php">Go back</a>
              </div>
        </div>
      </body>
      </html>
        ';
      
    }
  }
  mysqli_close($connection);
?>