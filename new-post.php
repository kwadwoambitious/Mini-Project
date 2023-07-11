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
  <link rel="stylesheet" href="home_pages.css">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum - New Post</title>
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
        <h3>Create New Topic</h3>
        <hr>

       <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <h4>Topic Title</h4>
            <input type="text" name="topic_title" placeholder="Subject of your topic" id="topic_title" autocomplete="off"/>
            <p>Keep your subject as short as possible.</p>

            <h4>Topic Body</h4>
            <textarea name="topic_body" placeholder="Type message..." id="topic_body"></textarea>
            <input type="submit" name="create_post" value="Create Post" id="create_post" />
       </form>
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
    $topic_title = null;
    $topic_body = null;

    if(isset($_POST['create_post'])){
          $topic_title = $_POST['topic_title'];
          $topic_body = $_POST['topic_body'];
          $p_date = date('Y.m.d');

          if($topic_title && $topic_body){
            $sql = "INSERT INTO posts (post_title, post_message, post_date) VALUES ('$topic_title', '$topic_body', '$p_date')";
            mysqli_query($connection, $sql);

            echo '
                <script>
                        alert("Post made successfully!");
                        header("Location: home.php");
                  </script>
                ';
          }
          else if(empty($topic_title) || empty($topic_body)){
            echo '
                  <script>
                        alert("Fill in all fields!");
                        window.locaton.href = "new-post.php";
                  </script>
                ';   
          }
    }

    mysqli_close($connection);
?>