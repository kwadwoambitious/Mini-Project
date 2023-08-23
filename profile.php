<?php
  ob_start();
  session_start();

   if(!isset($_SESSION['username'])){
     header('Location: login');
   }
?>
<?php 
  $title = "Profile";
  include('home-header.php');
?>
    <div class="profile-container">
      <div class="profile">
        <img src="images/noprofil.jpg">
        <h3><?php echo $_SESSION['username']?></h3>
        <p><?php echo $_SESSION['email']?></p>
        <a href="update_profile">Edit Profile</a>
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
            <input type="submit" name="logout" value="Logout">
        </form>
      </div>
    </div>
  
     <script src="script.js"></script>

</body>
</html>

<?php
      
      if(isset($_POST['logout'])){
        session_destroy();
        header('Location: login');
        ob_enf_fluch();
      }
?>
