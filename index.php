<?php include ('resource/database_app.php'); ?>
<?php include('resource/database_ses.php'); 
if (empty($_SESSION['username'])){
    header('location: login.php');
}
?>
<?php
//create Select query
$query = "SELECT * FROM echos";
$echos = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
   <div id="container">
   <header>
       <h1>ECHOBOX</h1>
       <?php if(isset($_SESSION['username'])): ?>  
       <p style="margin:10px">Welcome <strong> <?php echo $_SESSION['username'];?></strong></p>
   </header>
    
   <div id="echos">
            <ul>
               <?php while($row = mysqli_fetch_assoc($echos))  : ?>
               
               <li class="echo"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?></li>
               <?php endwhile; ?>
                
            </ul>
        </div>
   <div class="content">
   <?php if(isset($_SESSION['success'])): ?>
   <div class="error success">
      <h3> <?php echo $_SESSION['success'];
       unset($_SESSION['success']);
          ?>
      </h3>
    </div>
    <?php endif ?>
    <div id="input">
        <?php if (isset ($_GET['error'])) : ?>
            <div class="error"><?php echo $_GET['error']; ?></div>
             <?php endif; ?>
         <form method="post" action="resource/process.php">
            <input type="text" name="user" placeholder="Enter Your Name"/>
            <input type="text" name="message" placeholder="Enter Your Message"/>
            <br />
            <input class="echo-btn" type="submit" name="submit" value="Echo Out"/>
        </form>
        
       <p><a href="index.php?logout='1'" style="color: red";>Logout</a></p>
       <?php endif ?>

       </div> 
    </div> 
</div>
</body>
</html>