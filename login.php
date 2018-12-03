<?php include('resource/database_ses.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="header"><h2>ECHOBOX</h2>
        
    <h3>Login Form</h3></div>
    <form method="post" action="login.php">
       <?php  include ('errors.php'); ?>
        <div class="input-group">
           <label>Username</label> <input type="text" value="" name="username">
        </div>
        <div class="input-group">
           <label>Password</label> <input type="password" value="" name="password">
        </div>    
        <div class="input-group">
            <button type="submit" name="Signin" class="btn">Login</button>
        </div>
    <p>Not yet a member? <a href="signup.php">Sign up</a></p>    
    </form>
    
</body>
</html>