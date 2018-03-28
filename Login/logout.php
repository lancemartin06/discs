<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_destroy(); 
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
</head>

<body>
    <div class="form">
        
          <h1>May the force be with you, or whatever.</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
