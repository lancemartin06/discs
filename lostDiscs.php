<?php   
    session_start();
    define("PAGENAME", "lostDiscs");
    require_once'header.php';
    //include("dao.php");
$servername = "us-cdbr-iron-east-05.cleardb.net";
$dbname = "heroku_460fd0693927d5a";
$username = "bcc29ebdb3e631";
$password = "0a186730";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
     $_SESSION['conn'] = $conn; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
   
    
?>
    <link rel="stylesheet" href="CSS/mystyle2.css">
    <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['login'])){
                echo("Trying to do login...");    
                include 'Login/login.php';
             }
                
            elseif (isset($_POST['signup'])){
                echo("Trying to do signup...");
                    include 'Login/signup.php';
                echo"did it work?";
            }
        }
    ?>
    <title>Lost Discs</title>
    <section class="sec1">
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
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
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
          
          <button type="submit" class="button button-block" name="signup" />Sign Up!</button>
          
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