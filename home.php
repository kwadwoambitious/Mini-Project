<?php
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>
<?php 
  $title = "Home";
  include('includes/home-header.php');
?>
      <!-- <h1 class="welcome_msg">Welcome back, <i> <?php 
            echo $_SESSION['full_name'];
        ?></i></h1> -->
      <main class="home">
        <h1 class="heading">Recent Posts</h1>
      </main>

<?php
   include('script.php');

   include('database-connection/user_database.php');

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
        <link rel="stylesheet" href="css/post.css" />
      </head>
      <body>
            <div class="posts my-posts">
            <div class="container">
                <div class="user">
                  <div class="user-img">
                    <i class="fa-solid fa-user"></i>
                  </div>
                  <div class="name-and-date">
                    <p>@'.$post_creator.'</p>
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
      </body>
      </html>    
      ';
  }
?>

