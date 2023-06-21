<?php
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
  <link rel="stylesheet" href="home_page.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Talk - Home</title>
</head>
<body>
<header>
    <h1><span>Web</span>Talk</h1>
    <nav>
      <ul>
        <li><a href="#" class="active">Forum</a></li>
        <li><a href="new-post.php">New</a></li>
        <li><a href="">Your Posts</a></li>
        <li><a href="profile.php">Profile</a></li>
      </ul>
    </nav>
</header>
</body>
</html>

