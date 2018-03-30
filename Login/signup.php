<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
echo("I'm here in signup. Let's see if i work?");
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$conn = $_SESSION['conn'];

// Escape all $_POST variables to protect against SQL injections

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$password = $_POST['password'];
echo("I'm here in signup. Let's see if i work?");
      
// Check if user with that email already exists
$result = $conn->query("SELECT * FROM user WHERE email='$email'") or die($conn->error());
echo($result);
// We know user email exists if the rows returned are more than 0
if ($result > 0) {
    echo('User with this email already exists!');
    
    
} else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO user (email, password, name, phone) VALUES ('$email','$password','$name','$phone')";

    // Add user to the database
    $conn->query($sql);
    $_SESSION['logged_in'] = true; // So we know the user has logged in
}