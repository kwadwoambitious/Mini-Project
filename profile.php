<?php
  session_start();
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
  <title>Web Talk - Profile</title>
</head>
<body>
      <header>
          <h1><span>Web</span>Talk</h1>
          <nav>
            <ul>
              <li><a href="home.php" class="active">Forum</a></li>
              <li><a href="new-post.php">New</a></li>
              <li><a href="">Your Posts</a></li>
              <li><a href="profile.php">Profile</a></li>
            </ul>
          </nav>
      </header>

     <main>
       <h1 class="profile-h1">Your Information</h1>
       <div class="card">
          <div>
             <i class="fa-solid fa-user"></i>
          </div>
          <p>Full Name: <b><i><?php echo $_SESSION['full_name']?></i></b></p>
          <p>Email Address: <b><i><?php echo $_SESSION['email']?></i></b></p>
          <form action="profile.php" method="post">
             <input type="submit" name="logout" id="logout" value="Logout" />
          </form>
       </div>
     </main>

</body>
</html>

<?php 
      if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login.php');
      }
?>