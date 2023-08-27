<?php 
     ob_start();
     session_start();
   
     if(isset($_SESSION['username'])){
       header('Location: home');
     }

    if(isset($_POST['recover'])){
      include('database-connection/user_database.php');
      $email = $_POST['email'];

      $sql = mysqli_query($connection, "SELECT * FROM users WHERE email='$email'");
      $query = mysqli_num_rows($sql);
      $fetch = mysqli_fetch_assoc($sql);

      if(mysqli_num_rows($sql) <= 0){
        ?>
        <script>
            alert("<?php  echo "The email is not registered! "?>");
        </script>
        <?php
      }
      else{
        // generate token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        require "Mail/phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username='antwiebenezer784@gmail.com';
        $mail->Password='udwoghhhbucatoji';

        // send by h-hotel email
        $mail->setFrom('antwiebenezer784@gmail.com', 'Password Reset');

        // get email from input
        $mail->addAddress($_POST["email"]);

        // HTML body
        $mail->isHTML(true);
        $mail->Subject="Recover your password";
        $mail->Body="<b style='font-family: sans-serif; text-align: center; color: #7e22ceab; font-size: 2rem;'>Dear Valuable User,</b>
        <p style='font-family: sans-serif; font-size: 1.1rem;'>We have received a password reset request from our <b>Web Developers Community Forum.</b> We apologize for any inconvenience caused by your inability to recall your password. Please rest assured, we have taken care of everything. Kindly click on the reset link provided below to initiate the password reset process.</p>
        <a href='http://localhost/Web-Forum-Mini-Project/set-new-password' style='font-family: sans-serif; font-size: 1rem;'>Click to reset password</a>
        <p style='font-family: sans-serif; font-size: 1.1rem;'><b>Best regards,</b></p>
        <b style='font-family: sans-serif; font-size: 1.1rem;'>Team Ebenezer.</b>";

        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo "Submission wasn't successful."?>");
                </script>
            <?php
        }else{
            ?>
                <script>
                    alert("<?php echo "Reset link sent to your email."?>");
                </script>
            <?php
        }
      }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Forgot password</title>
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/forgot-passwords.css">
</head>
<body>
        <div class="container">
          <h1>Password Recovery</h1>
          <form action="<?php $_SERVER["PHP_SELF"]?>" method="post" id="recovery-form">
                  <label>Email Address:</label>
                  <input type="email" name="email" id="email" placeholder="Enter email address">
              <input type="submit" name="recover" value="Send" style="color: white;">
          </form>
        </div>
</body>
</html>