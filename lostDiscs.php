<?php
session_start();
define("PAGENAME", "lostDiscs");

require('header.php');

//Display Message if exists
if(isset($_SESSION['alert']) && $_SESSION['alert'] == true){
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>alert('$message');</script>";
}

$dao = new dao();
?>

<link rel="stylesheet" href="CSS/mystyle2.css">
<title>Lost Discs</title>

<?php
$_SESSION['message'] = "No New messages";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (isset($_POST['login'])) {
        $dao->getUser($_POST['email'], $_POST['password']);

        if($_SESSION['logged_in'] === true){
            header('Location: profile.php');
        }
        else {
            header('Location: lostDiscs.php');
        }
    } elseif (isset($_POST['signup'])) {
        $dao->addUser($_POST['email'], $_POST['password'], $_POST['name'], $_POST['phone']);
        echo($_SESSION['message']);
        if($_SESSION['logged_in'] === true){
            header('Location: profile.php');
        }
        else {
            header('Location: lostDiscs.php');
        }

        
    }
}
?>

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