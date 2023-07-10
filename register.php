<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum - Register</title>
  <link rel="stylesheet" href="forms.css">
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
      
      /*
        toggle both menu-bar and main-menu elements with a class name of active
        when the hambuger is clicked(for smaller screens).
        */
        menuBar.addEventListener("click", () => {
            menuBar.classList.toggle("active");
            mainMenu.classList.toggle("active");
        });
        
        /*
        remove active class from both menu-bar and main-menu elements 
        when a nav-link is clicked(for smaller screens).
        */
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
                $sql = "INSERT INTO register (full_name, email, pass, c_pass) VALUES ('$full_name', '$email', '$pass',  '$confirm_pass')";

                mysqli_query($connection, $sql);
                
                echo '
                  <script>
                        alert("Registered successfully!");
                        header("Location: login.php");
                  </script>
                ';
              }
        }
        else{
          if(strlen($full_name) < 10 || strlen($full_name) > 25){
            echo '
              <script>
                    alert("Full name must be between 10 and 25 characters!");
                    window.location.href = "register.php";
              </script>
            ';
          }
          else if(!preg_match("/^[a-zA-Z-' ]*$/",$full_name)){
              echo '
              <script>
                    alert("Full name must only be letters and white space");
                    window.location.href = "register.php";
              </script>
            ';
          }
          else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              echo '
              <script>
                    alert("Email is invalid!");
                    window.location.href = "register.php";
              </script>
            ';
          }
          else if(strlen($pass) < 8){
            echo '
              <script>
                    alert("Password must not be less than 8 characters");
                    window.location.href = "register.php";
              </script>
            ';
          }
          else if($pass != $confirm_pass){
            echo '
              <script>
                    alert("Passwords do not match");
                    window.location.href = "register.php";
              </script>
              ';
          }
      }
    }
    else{
      echo '
          <script>
                alert("Fill in all fields");
                window.location.href = "register.php";
          </script>
        ';
      
    }
  }
  mysqli_close($connection);
?>
