<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];


// Escape all $_POST variables to protect against SQL injections

$email = $dao->escape_string($_POST['email']);
$name = $dao->escape_string($_POST['name']);;
$phone = $dao->escape_string($_POST['phone']);;
$password = $dao->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $dao->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $dao->query("SELECT * FROM users WHERE email='$email'") or die($dao->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    echo('User with this email already exists!');
    
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (email, password, name, phone) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $dao->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
    }

    else {
        echo("Registration failed!");
    }

}