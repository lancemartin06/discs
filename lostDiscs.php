<?php
session_start();
define("PAGENAME", "lostDiscs");
//require('dao.php');


class Dao 
{
    private $servername = "us-cdbr-iron-east-05.cleardb.net";
    private $dbname = "heroku_460fd0693927d5a";
    private $username = "bcc29ebdb3e631";
    private $password = "0a186730";

    public function getConnection()
    {
        echo "getting connection!";
        return new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
    }
    
    public function addUser($email, $pass, $name, $phone)
    {
        
        $conn = getConnection();
        
        $result = $conn->query("SELECT * FROM user WHERE email='$email'");

        // If the result is greater than 0 than the user already exists. 
        if ($result > 0) {
        echo('User with this email already exists!');
        } else {
            $sql = "INSERT INTO user (email, password, name, phone) VALUES ('$email','$password','$name','$phone')";
            if ($conn->query($sql)) {
                echo "You're All Signed Up!";
            } else {
                echo "Oh no. Something Went Wrong.";
            }
        }
    }
    
    public function getUser($email, $pass) {

    }
}




$dao = new Dao();
require_once'header.php';

?>

<link rel="stylesheet" href="CSS/mystyle2.css">
<title>Lost Discs</title>


<section class="sec1">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) {
        $dao->getUser($_POST['email'], $_POST['password']);
    } elseif (isset($_POST['signup'])) {
        $dao->addUser($_POST['email'], $_POST['password'], $_POST['name'], $_POST['phone']);
    }
}
?>
    <div class="form">
      
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="lostDiscs.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="../Login/forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up to Find Your Discs</h1>
          
          <form action="lostDiscs.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Name(First and Last)<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='name' />
            </div>
          </div>
            
            <div class="field-wrap">
              <label>
                Email Address<span class="req">*</span>
              </label>
              <input type="email"required autocomplete="off" name='email' />
            </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password' />
          </div>
          
          <div class="field-wrap">
            <label>
              Phone Number (Ex: 20812345678)<span class="req">*</span>
            </label>
            <input type="phone"required autocomplete="off" name='phone'/>
          </div>
          
          <button type="submit" class="button button-block" name='signup' />Sign Up!</button>
          
          </form>
        
        
        
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        
        
      <script>$('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
            var $this = $(this),
            label = $this.prev('label');

                  if (e.type === 'keyup') {
                        if ($this.val() === '') {
                      label.removeClass('active highlight');
                    } else {
                      label.addClass('active highlight');
                    }
                } else if (e.type === 'blur') {
                    if( $this.val() === '' ) {
                        label.removeClass('active highlight'); 
                        } else {
                        label.removeClass('highlight');   
                        }   
                } else if (e.type === 'focus') {

                  if( $this.val() === '' ) {
                        label.removeClass('highlight'); 
                        } 
                  else if( $this.val() !== '' ) {
                        label.addClass('highlight');
                        }
                }

            });

        $('.tab a').on('click', function (e) {
  
          e.preventDefault();

          $(this).parent().addClass('active');
          $(this).parent().siblings().removeClass('active');

          target = $(this).attr('href');

          $('.tab-content > div').not(target).hide();

          $(target).fadeIn(600);

        });</script>

        </div>  
        
      </div>
      
    </div> 
        
  </section>
</div>
<?php require_once("footer.php"); ?>