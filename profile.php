<?php
  ob_start();
  session_start();

   if(!isset($_SESSION['full_name'])){
     header('Location: login.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="home_page.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum - Profile</title>
</head>
<body>
      <header>
          <h1>webForum</h1>
          <nav>
            <ul class="main-menu">
              <li><a href="home.php" class="menu-item">Forum</a></li>
              <li><a href="new-post.php" class="menu-item">New</a></li>
              <li><a href="" class="menu-item">Your Posts</a></li>
              <li><a href="profile.php" class="menu-item">Profile</a></li>
            </ul>
            <div class="menu-bar">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
          </nav>
      </header>

     <main>
       <h1 class="profile-h1">Your Information</h1>
       <div class="card">
          <div>
             <i class="fa-solid fa-user"></i>
          </div>
          <p class="profile_info">Name: <b>
          <?php 
          
            if(isset($_SESSION['full_name'])){
                 echo $_SESSION['full_name'];
            }
          
          ?></b></p>
          <p class="profile_info">Email: <b><?php 
          
          if(isset($_SESSION['email'])){
                 echo $_SESSION['email'];
            }
          
          ?></b></p>
          <form action="profile.php" method="post">
             <input type="submit" name="logout" id="logout" value="Logout" />
          </form>
       </div>
     </main>
     
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
      
      if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
        ob_enf_fluch();
      }
?>
