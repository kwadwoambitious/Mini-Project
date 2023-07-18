<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Forgot password</title>
  <link rel="stylesheet" href="forgot-password.css">
</head>
<body>
        <main>
            <h1>FILL THE FORM TO RETRIEVE YOUR PASSWORD</h1>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off" >
                
                <input type="email" name="email" placeholder="Enter email address" autocomplete="off">

                <input type="submit" name="retrieve" value="Get Password">
            </form>
        </main>
</body>
</html>

<?php
  include('user_database.php');

  $full_name = null;
  $email = null;

  if(isset($_POST['retrieve'])){
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    if($full_name && $email){
      $sql = "SELECT * FROM register_info WHERE full_name = '$full_name' AND email = '$email'";
      $result = mysqli_query($connection, $sql);

      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
            $db_password = $row['pass'];
          }
          echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title></title>
              <link rel="stylesheet" href="modal.css">
            </head>
            <body>
              <div class="modal-container">
                    <div class="modal">
                        <img src="images/404-tick.png">
                        <p>Password retrieved!</p>
                        <p class="last-p" style="opacity: 1;">Your password is <strong>'.$db_password.'</strong></p>
                        <a href="login.php" style="background-color: rgba(51, 173, 51, 0.938);">Login now</a>
                    </div>
              </div>
            </body>
            </html>
          
          ';  
      }
      else{
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
                    <p>User cannot be found.</p>
                    <p class="last-p">Register first before login!</p>
                    <a href="register.php">Register me</a>
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
                      <a href="forgot-password.php">Go back</a>
                  </div>
            </div>
          </body>
          </html>
      
      ';
    }
  }
  mysqli_close($connection);
?>