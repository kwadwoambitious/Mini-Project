<?php
  session_start();

  if(isset($_SESSION['full_name'])){
    header('Location: home');
  }
?>

<?php 
    $title = "Home";
    include('header.php');     
?>
  
  <section class="main">
   <div>
     <h1>Improve on your development skills today!</h1>
   </div>
    <div>
       <p>Join our thriving community of web developers today and unlock a world of collaboration, learning, and growth. Embrace the power of knowledge-sharing and let your skills soar to new heights.</p>
    </div>
    <div>
      <a href="register" class="btn1">GET STARTED</a>
    </div>
  </section>
  
  <?php 
    include('footer.php');
  ?>
  
  <script src="script.js"></script>
</body>
</html>