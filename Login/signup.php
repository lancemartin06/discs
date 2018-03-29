<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];


// Escape all $_POST variables to protect against SQL injections

$email = $conn->escape_string($_POST['email']);
$name = $conn->escape_string($_POST['name']);;
$phone = $conn->escape_string($_POST['phone']);;
$password = $conn->escape_string($_POST['password']);

      
// Check if user with that email already exists
$result = $conn->query("SELECT * FROM user WHERE email='$email'") or die($conn->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    echo('User with this email already exists!');
    
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO user (email, password, name, phone) VALUES ('$email','$password','$name','$phone')";

    // Add user to the database
    if ( $conn->query($sql) ){

        $_SESSION['logged_in'] = true; // So we know the user has logged in
    }

    else {
        echo("Sign-up failed!");
    }

}

