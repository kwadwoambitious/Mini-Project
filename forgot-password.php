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
          echo "
            <script></script>
          ";
          $user_found = "<strong>Password: </strong>($db_password)"; 
      }
      else{
        $user_not_found = "User cannot be found."; 
      }
    }
    else if(empty($full_name) && empty($email)){
        $name_error = "Name is required!";
        $email_error = "Email is required!";
    }
    else if(empty($full_name)){
        $name_error = "Name is required!";
    }
    else if(empty($email)){
        $email_error = "Email is required!";
    }
  }
  mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
  <title>Web Forum | Forgot password</title>
  <link rel="stylesheet" href="forgot-password.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
        <main>
            <h1>FILL THE FORM TO RETRIEVE YOUR PASSWORD</h1>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
                <input type="text" name="full_name" placeholder="Enter full name" autocomplete="off">
                <span style="color: red; font-size: 1.7rem; display: block;"><?php echo $name_error?></span>

                <input type="email" name="email" placeholder="Enter email address" autocomplete="off">
                <span style="color: red; font-size: 1.7rem; display: block;"><?php echo $email_error?></span>

                <input type="submit" name="retrieve" value="Get Password">
                <span style="color: red; font-size: 1.7rem; display: block;"><?php echo $user_not_found ?></span>
                <span style="color: darkgreen; font-size: 1.9rem; display: block;"><?php echo $user_found ?></span>
            </form>
        </main>
</body>
</html>