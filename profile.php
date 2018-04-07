<?php
/* Displays user information and some useful messages */
session_start();
require_once 'header.php';
$dao = new dao();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != true ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";

}
else {
    // Makes it easier to read
    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $email = $_SESSION['email'];
}
?>
  <link rel="stylesheet" href="CSS/mystyle2.css">
  <title>Welcome <?= $name ?></title>

  <div class="form">

          <h1>Welcome</h1>
          
          <p>Discs:

            <form action="profile.php" method="post" autocomplete="off">

              <<button class="button button-block" name="findDiscs"/>Find My Discs!</button></a>
            </form>
      <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {
              if (isset($_POST['finddiscs'])) {
                  $dao->bindDiscs($name, $email, $phone);
                  echo($_SESSION['message']);
                  $dao->getDiscs($name, $email, $phone);
              }
          }
      ?>
          </p>
          
          <?php
          

          
          ?>
          
          <h2><?php echo $name; ?></h2>
          <p><?= $email ?></p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

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

<?php require_once '../footer.php'; ?>
