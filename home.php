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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="home_pages.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  
  <title>Web Forum - Home</title>
</head>
<body>
      <header>
          <h1><span>webForum</h1>
          <nav>
            <ul class="main-menu">
              <li><a href="#" class="menu-item">Forum</a></li>
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
      <!-- Hello, I am in the person of Antwi Ebenezer, a third year Computer Science Student at the best university in Africa and the 12th best university in the World. I am a front-end developer and an aspiring Software Developer. I am versed in HTML, CSS JavaScript and PHP. I have taken a lot of online courses which I thought they would advance my knowledge in my web development journey. I actually obtained certificates for all the courses I took. I am presently building my third year mini-project, which is a WEB DEVELOPERS COMMUNITY FORUM. -->
      <!-- <main class= "post">
          <p>No posts available to be displayed.</p>
          <a href="new-post.php" id="button">Create Post</a>
      </main> -->
  
      <main class="home">
        <h1>Recent Posts</h1>
        <hr>
        
      </main>
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

  // Retrieve posts from the database
  $sql = "SELECT * FROM posts ORDER BY id DESC";
  $result = mysqli_query($connection, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    $post_id = $row["id"];
    $post_title = $row["post_title"];
    $post_message = $row["post_message"];
    $post_date = $row["post_date"];

    echo '<div class="posts" style="margin: 0 auto; max-width: 700px; width: 85%;">
            <div style="background-color: rgb(237, 234, 234); border-radius: 10px; padding: 20px; margin-bottom: 50px;">
                <div class="user">
                <div class="user-img">
                  <i class="fa-solid fa-user"></i>
                </div>
                <div class="name-and-date">
                  <p style="font-size: 2rem;">'.$_SESSION["full_name"].'</p>
                  <span style="font-size: 1.4rem; color: rgb(110, 110, 110); font-style: italic;">posted on '
                    .$post_date.
                '</span> 
                </div>  
              </div> 
                
              <div class="post_content">
                  <h3 class="title" style=" margin: 20px 0 10px 0; font-size: 1.7rem; color: rgb(110, 110, 110);"> ' 
                    .$post_title.
                  ' </h3>
                  <p class="message" style="margin-bottom: 20px; font-size: 2.2rem; line-height: 1.4;">'
                  .$post_message.
                '</p>
              </div>
            </div>
          </div>';
    
  }

    

  mysqli_close($connection);
?>