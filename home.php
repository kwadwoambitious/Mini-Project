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
      <main class="home">
        <h1 class="heading">Recent Posts</h1>
        <hr>
      </main>

<?php
   include('script.php');
   include('database-connection/user_database.php');

  $sql = "SELECT * FROM posts ORDER BY id DESC";
  $result = mysqli_query($connection, $sql);

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
        <link rel="stylesheet" href="css/post.css" />
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
      ';
  }
?>