<?php
  ob_start();
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>
<?php 
  $title = "Profile";
  include('includes/home-header.php');
?>
    <div class="profile-container">
      <div class="profile">
      <h1 style="font-family: 'Abril Fatface', cursive;"><?php 
         $initial =  substr($_SESSION['first_name'], 0, 1);
         $initial2 =  substr($_SESSION['last_name'], 0, 1);
         echo $initial;
         echo $initial2;
       ?></h1>
        <h3><?php echo '@'.$_SESSION['username']?></h3>
        <p><?php echo $_SESSION['email']?></p>
        <a href="update_profile">Edit Profile</a>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
      </div>
    </div>
  
     <script src="javascript/script.js"></script>
</body>
</html>

<?php
      include('script.php');

      if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login');
        ob_enf_fluch();
      }
?>
