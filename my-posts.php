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
  
  <title>Web Forum - My Posts</title>
</head>
<body>
      <header>
          <h1><span>webForum</h1>
          <nav>
            <ul class="main-menu">
              <li><a href="home.php" class="menu-item">Forum</a></li>
              <li><a href="new-post.php" class="menu-item">New</a></li>
              <li><a href="my-posts.php" class="menu-item">My Posts</a></li>
              <li><a href="profile.php" class="menu-item">Profile</a></li>
            </ul>
            <div class="menu-bar">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
          </nav>
      </header>
  
      <main class="home">
        <h1>My Posts</h1>
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

  $name = $_SESSION['full_name'];
  // Retrieve posts from the database
  $sql = "SELECT * FROM posts WHERE post_creator = '$name' ORDER BY id DESC";
  $result = mysqli_query($connection, $sql);
    
  if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      $post_id = $row["id"];
      $post_title = $row["post_title"];
      $post_message = $row["post_message"];
      $post_date = $row["post_date"];
      $post_creator = $row["post_creator"];
  
      echo '<div class="posts" style="margin: 0 auto; max-width: 700px; width: 95%;">
              <div style="box-shadow: 2px 2px 6px 2px black; border-radius: 10px; padding: 20px; margin-bottom: 70px;">
                  <div class="user">
                  <div class="user-img">
                    <i class="fa-solid fa-user"></i>
                  </div>
                  <div class="name-and-date">
                    <p style="font-size: 2rem;">'.$post_creator.'</p>
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
  }
  else{
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="stylesheet" href="home_pages.css">
      <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <main class= "post">
          <p>You do not have any post yet.</p>
        </main>
    </body>
    </html>
   ';
  }
  mysqli_close($connection);
?>