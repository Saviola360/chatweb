<?php
include 'database.php';

if (isset($_POST['submit'])) {
   $user = mysqli_real_escape_string($mysqli, $_POST['user']);
   $message = mysqli_real_escape_string($mysqli, $_POST['message']);

    date_default_timezone_set('Africa/Lagos');
    $time = date('h:i:s a', time());

     if (!isset($user) || $user == '' || !isset($message) || $message == '' ) {
        $error = "Please fill in your name and a message";
         header ("Location: ../index.php?error=".urlencode($error));
         exit();
     }  else {
         $query = "INSERT INTO echos (user, message, time)
         VALUES ('$user', '$message', '$time')" ;
         
         if (!mysqli_query($mysqli, $query)) {
             die ('Error: '.mysqli_error($mysqli));
         }
         else {
             header("Location: ../index.php");
             exit();
         }
     }                              
}
?>