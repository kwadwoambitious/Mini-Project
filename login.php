<?php
  ob_start();
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
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Login</title>
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
      <h1>SIGN IN</h1>
      <hr>
    <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off">
    <input type="password" name="password" placeholder="Enter password" >
    <input type="submit" name="login" value="Login">
    <p><a href="forgot-password.php">Forgot password?</a></p>
    <p>Don't have an account?
      <a href="register.php">Register here</a>
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
  $_SESSION['full_name'] = null;
  $_SESSION['pass'] = null;
  $name = null;


  if(isset($_POST['login'])){
        $_SESSION['full_name'] = $_POST['full_name'];
        $_SESSION['pass'] = $_POST['password'];
        $name = $_SESSION['full_name'];
        
        
    if($_SESSION['full_name'] && $_SESSION['pass']){
      $sql = "SELECT * FROM register_info WHERE full_name = '$name'";
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
            ob_end_flush();
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
                       <p>Wrong password</p>
                       <p class="last-p">Provide the correct password!</p>
                       <a href="login.php">Go back</a>
                   </div>
             </div>
           </body>
           </html>
          
            ';
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
                    <p>User cannot be found.</p>
                    <p class="last-p">Register first before login!</p>
                    <a href="register.php">Register me</a>
                </div>
          </div>
        </body>
        </html>
      
      ';  
      }
    }
    elseif(empty($_SESSION['full_name']) || empty($_SESSION['pass'])){
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
                      <a href="login.php">Go back</a>
                  </div>
            </div>
          </body>
          </html>
      
      ';
     
    }
  }

  mysqli_close($connection);
?>