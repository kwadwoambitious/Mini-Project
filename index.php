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
  <title>WebForum | Index</title>
  <link rel="stylesheet" href="styles.css">
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
  
  <section class="main">
   <div>
     <h1>Improve on your development skills today!</h1>
   </div>
    <div>
       <p>Join our thriving community of web developers today and unlock a world of collaboration, learning, and growth. Embrace the power of knowledge-sharing and let your skills soar to new heights.</p>
    </div>
    <div>
      <a href="register.php">Get started</a>
    </div>
  </section>
  <footer>
      <p>This platform was built by Antwi Ebenezer.</p>
      <p>Copyright &copy; 2023. All rights reserved.</p>
  </footer>
  
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