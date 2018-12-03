<?php
session_start();
$username = "";
$email = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'register');

if (isset($_POST['signupBtn'])){ 
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($username)){
        array_push($errors, "Username is required");
    }
     if (empty($email)){
        array_push($errors, "Email is required");
    }
     if (empty($password)){
        array_push($errors, "Password is required");
    }
    
    if (count($errors) == 0) {
               $sql = "INSERT INTO users (username, email, password)
                VALUES('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Please log in";
        header('location: login.php');
    }
}

    // log user in from login page
if (isset($_POST['Signin'])){ 
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    
    if (empty($username)){
        array_push($errors, "Username is required");
    }
     if (empty($password)){
        array_push($errors, "Password is required");
    }    
     if (count($errors) == 0) {
            $query = "SELECT * FROM users WHERE username='$username'AND password= '$password'";
        $result = mysqli_query($db, $query);
         if(mysqli_num_rows($result) == 1){
             // log user in
             $_SESSION['username'] = $username;
             $_SESSION['success'] = "You are now logged in";
             header('location: index.php');
    }else{
             array_push($errors, "wrong username/password combination");
         }
    }
}


    // logout
    if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
    }
?>