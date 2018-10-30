<?php include 'database.php'; ?>
<?php
//create Select query
$query = "SELECT * FROM echos";
$echos = mysqli_query($mysqli, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ECHO CHAT!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div id="container">
       <header>
       <h1>ECHO CHAT! Echobox</h1>
       </header>
        
        <div id="echos">
            <ul>
               <?php while($row = mysqli_fetch_assoc($echos))  : ?>
               
               <li class="echo"><span><?php echo $row['time'] ?> - </span><strong><?php echo $row['user'] ?>:</strong> <?php echo $row['message'] ?></li>
               <?php endwhile; ?>
                
            </ul>
        </div>
        <div id="input">
           <?php if (isset ($_GET['error'])) : ?>
               <div class="error"><?php echo $_GET['error']; ?></div>
               <?php endif; ?>
            <form method="post" action="process.php">
                <input type="text" name="user" placeholder="Enter Your Name"/>
                <input type="text" name="message" placeholder="Enter Your Message"/>
                <br />
                <input class="echo-btn" type="submit" name="submit" value="Echo Out"/>
            </form>
        </div>
    </div>
</body>
</html>