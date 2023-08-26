<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/home_pages.css">
  <link rel="stylesheet" href="css/threadlists.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | <?php  echo $title ?></title>
</head>
<body>
      <header>
          <a href="./" style="text-decoration: none;"><h1><span>WebForum</h1></a>
          <nav>
            <ul class="main-menu">
              <li><a href="home" class="menu-item">FORUM</a></li>
              <div class="dropdown" style="display: inline-block;">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  CATEGORIES
                </a>
                <ul class="dropdown-menu">
                  <?php 
                      include ('database-connection/user_database.php');
                      $sql="SELECT `category_id`, `category_name` FROM `category` Limit 5";
                      $result=mysqli_query($connection, $sql);
                      while($row=mysqli_fetch_assoc($result)){
                          echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                      }
                  ?>
                </ul>
	            </div>
              <li><a href="my-posts" class="menu-item">MY POSTS</a></li>
              <li><a href="resources" class="menu-item">RESOURCES</a></li>
              <li><a href="profile" class="menu-item">PROFILE</a></li>
              
            </ul>
            <div class="menu-bar">
                    <span class="bar bar1"></span>
                    <span class="bar bar2"></span>
                    <span class="bar bar3"></span>
                </div>
          </nav>
      </header>