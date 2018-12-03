<?php include ('resource/database_ses.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Page</title>
     <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header"><h2>ECHOBOX</h2>
    
    <h3>Registration Form</h3></div>
  <?php  include ('errors.php'); ?>
  <form method="post" action="signup.php">
       
        <div class="input-group">
            <label>Username</label> <input type="text" value="<?php echo $username; ?>" name="username">
        </div>
        <div class="input-group">
            <label>Email</label> <input type="text" value="<?php echo $email; ?>" name="email">
        </div>
        <div class="input-group">
            <label>Password</label> <input type="password" value="" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="signupBtn" class="btn">Signup</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
    
</body>
</html>