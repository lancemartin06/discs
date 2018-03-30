<?php
/* Log out process, unsets and destroys session variables */
session_start();


define("PAGENAME", "logout");
require_once("header.php");
$_SESSION['conn'] = null;
session_destroy(); 
?>
    <title>Logout</title>
        
        <section class="sec1"><div class="form">
        
          <h1>May the force be with you, or whatever.</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div></section>
        <section class="content">
            
            <p>.</p>
        </section>
    
        
    </div>

<?php require_once("footer.php"); ?>

