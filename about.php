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
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>WebForum - About</title>
  <link rel="stylesheet" href="home_page.css">
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
          <div class="about">
              <h1>About this platform</h1>
              <hr>
              <p>
                  Welcome to our Web Developers Community Forum, a thriving online space for developers to connect, collaborate, and learn. Join our inclusive community to discuss coding challenges, share insights, and seek assistance from fellow web developers. Explore diverse topics such as HTML, CSS, JavaScript, frameworks, and more. Receive valuable feedback on your projects, stay up-to-date with the latest industry trends, and engage in coding challenges and events. Expand your professional network, enhance your skills, and unlock your true potential as a web developer. Join us now and be part of this supportive community dedicated to empowering web developers like you!
              </p>
          </div>
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