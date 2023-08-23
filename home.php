<?php
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>
<?php 
  $title = "Home";
  include('home-header.php');
?>
      <!-- <h1 class="welcome_msg">Welcome back, <i> <?php 
            echo $_SESSION['full_name'];
        ?></i></h1> -->
      <main class="home">
        <h1 class="heading">Recent Posts</h1>
      </main>

<?php
   include('script.php');
?>