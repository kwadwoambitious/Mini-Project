<?php
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>

<?php

    include('user_database.php');
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `category` WHERE category_id=$id";

    $result = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

?>
<?php 
  $title = $catname;
  include('home-header.php');
?>

      <h1 class="welcome_msg">Welcome back, <i> <?php 
            echo $_SESSION['full_name'];
        ?></i></h1>
    <div class="main">
        <h1 class="display-4">Welcome to <?php echo $catname; ?> Forums</h1>
        <p class="display-4"><?php echo $catdesc; ?></p>
    </div>
    <main>
        <h3>Start a Discussion</h3>
        <hr>

       <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <h4>Topic Title</h4>
            <input type="text" name="topic_title" placeholder="Subject of your topic" id="topic_title" autocomplete="off"/>

            <h4>Topic Body</h4>
            <textarea name="topic_body" placeholder="Type message..." id="topic_body"></textarea>
            <input type="submit" name="create_post" value="Create Post" id="create_post" />
       </form>
       <h1 class="heading">Recent Posts</h1>
      </main>
      
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
          $p_creator = $_SESSION['full_name'];

          if($topic_title && $topic_body){
            $sql = "INSERT INTO posts (post_title, post_message, post_date, post_creator) VALUES ('$topic_title', '$topic_body', '$p_date', '$p_creator')";
            mysqli_query($connection, $sql);

            echo '<div class="modal-container">
            <div class="modal">
                <img src="images/404-tick.png">
                <p>Post made successfully!</p>
                <p class="last-p">View your post on the forum\'s page.</p>
                <a href="home.php" style="background-color: rgba(51, 173, 51, 0.938);">See post</a>
            </div>
      </div>';
          }
          else if(empty($topic_title) || empty($topic_body)){
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>Document</title>
              <link rel="stylesheet" href="modal.css">
            </head>
            <body>
              <div class="modal-container">
                    <div class="modal">
                        <img src="images/error-1.png">
                        <p>The fields are empty.</p>
                        <p class="last-p">Kindly fill in all fields!</p>
                        <a href="new-post.php">Go back</a>
                    </div>
              </div>
            </body>
            </html>
                ';   
          }
    }

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
          </div>
        </div>

        <script src="display-comment.js"></script>
    </body>
    </html>    
    ';
    
  }
  mysqli_close($connection);
?>