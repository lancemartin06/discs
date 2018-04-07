<?php
/* Displays all successful messages */
session_start();
include_once 'header.php'
?>

<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="profile.php"><button class="button button-block"/>Profile</button></a>
</div>
<?php require_once("footer.php");
