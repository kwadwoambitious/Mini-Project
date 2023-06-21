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
  <title>Web Talk - Index</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1><span>Web</span>Talk</h1>
    <nav>
      <ul>
        <li><a href="#" class="active">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="login.php" class="login">Login</a></li>
      </ul>
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
</body>
</html>