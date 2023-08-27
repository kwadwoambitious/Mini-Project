<?php
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>

<?php 
  $title = "My Posts";
  include('includes/home-header.php');
?>
  
      <main class="home">
        <h1>My Posts</h1>
        <hr>
      </main>
</body>
</html>

<?php
  include('database-connection/user_database.php');

  $name = $_SESSION['username'];
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
      $post_first_name = $row["first_name"];
      $post_last_name = $row["last_name"];
      $category_name = $row["tag"];

      $initial =  substr($post_first_name, 0, 1);
      $initial2 =  substr($post_last_name, 0, 1);
  

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
                      <div class="post-info">
                          <div class="user">
                            <div class="user-img">
                              <h1 style="font-family: \'Abril Fatface\', cursive;">'.$initial."".$initial2.'</h1>
                            </div>
                            <div class="name-and-date">
                              <p>@'.$post_creator.'</p>
                              <span>posted on '
                                .$post_date.
                              '</span>
                            </div>  
                          </div>
                          <div class="tag">
                            <h1>'.$category_name.'</h1>
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
      <link rel="stylesheet" href="css/home_pages.css">
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

  include('script.php');
?>
