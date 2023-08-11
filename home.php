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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="home_page.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Home</title>
</head>
<body>
      <header>
          <h1><span>webForum</h1>
          <nav>
            <ul class="main-menu">
              <li><a href="home.php" class="menu-item">Forum</a></li>
              <div class="dropdown" style="display: inline-block;">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Categories
                </a>
                <ul class="dropdown-menu">
                  <?php 

                      include ('user_database.php');
                      $sql="SELECT `category_id`, `category_name` FROM `category` Limit 5";
                      $result=mysqli_query($connection, $sql);
                      while($row=mysqli_fetch_assoc($result)){
                          echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                      }

                  ?>
                </ul>
	            </div>
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
      <!-- <main class= "post">
          <p>No posts available to be displayed.</p>
          <a href="new-post.php" id="button">Create Post</a>
      </main> -->
      <h1 class="welcome_msg">Welcome back, <i> <?php 
            echo $_SESSION['full_name'];
        ?></i></h1>
      <main class="home">
        <h1 class="heading">Recent Posts</h1>
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
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
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
    $post_creator = $row["post_creator"];

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="posts.css" />
    </head>
    <body>
          <div class="posts">
          <div class="container">
              <div class="user">
              <div class="user-img">
                <i class="fa-solid fa-user"></i>
              </div>
              <div class="name-and-date">
                <p>'.$post_creator.'</p>
                <span>posted on '
                  .$post_date.
              '</span> 
              </div>  
            </div> 
              
            <div class="post-content">
                <h3 class="title"> ' 
                  .$post_title.
                ' </h3>
                <p class="message">'
                .$post_message.
              '</p>
            </div>
            <div class="comment">
              <p id ="comment-btn">Click to comment</p>
              <div id="content">
                  <div class="user">
                      <div class="user-img">
                        <i class="fa-solid fa-user"></i>
                      </div>
                      <div class="name-and-date">
                        <p>'.$post_creator.'</p>
                        <span>posted on '
                          .$post_date.
                        '</span> 
                      </div>  
                  </div> 
                  <p>This is a comment from Kwadwo Ambitious</p>
                  <form>
                    <textarea name="comment-field" placeholder="Write your comment" rows="8"required></textarea>
                    <input type="submit" name="comment-btn" value="Comment" />
                  </form>
              </div>
            </div>
          </div>
        </div>

        <script src="display-comment.js"></script>
    </body>
    </html>    
    ';
    
  }
  mysqli_close($connection);
?>
