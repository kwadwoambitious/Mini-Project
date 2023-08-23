<?php
  session_start();

  if(isset($_SESSION['full_name'])){
    header('Location: home');
  }
?>

<?php 
    $title = "About";
    include('header.php');     
?>
          <div class="about">
              <h1>About this platform</h1>
              <hr>
              <p>
                  Welcome to our Web Developers Community Forum, a thriving online space for developers to connect, collaborate, and learn. Join our inclusive community to discuss coding challenges, share insights, and seek assistance from fellow web developers. Explore diverse topics such as HTML, CSS, JavaScript, frameworks, and more. Expand your professional network, enhance your skills, and unlock your true potential as a web developer. Join us now and be part of this supportive community dedicated to empowering web developers like you!
              </p>
          </div>
          <?php 
              include('footer.php');
          ?>
          <script src="script.js"></script>
</body>
</html>
