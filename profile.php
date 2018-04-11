<?php
/* Displays user information and some useful messages */
session_start();
require_once 'header.php';
$dao = new dao();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != true ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("Location: lostDiscs.php");
}
else {
    // Makes it easier to read

    $name = $_SESSION['name'];
    $phone = $_SESSION['phone'];
    $user_id = $_SESSION['user_id'];
}
?>
  <link rel="stylesheet" href="CSS/mystyle2.css">
  <title>Welcome</title>

  <div class="form">

          <h1>Welcome <?php echo($_SESSION['name']); ?></h1>
          
          <p>Discs:

            <form action="profile.php" method="post" autocomplete="off">

              <button class="button button-block" name="findDiscs"/>Find My Discs!</button></a>
            </form>
      <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST')
          {
              if (isset($_POST['findDiscs'])) {
                  $dao->bindDiscs($name, $phone, $user_id);
                  echo($_SESSION['user_id']);
                  $results = $dao->getDiscs();


              }
          }
      ?>
          </p>
          
          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

    <section class="content">
        <?php
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Id</th><th>Brand</th><th>Model</th><th>Color</th><th>Plastic</th><th>Owner</th><th>Phone</th></tr>";

                foreach($results as $disc) {
                        echo( "<tr><th>".$disc['disc_id'] . "</th><th>" . $disc['brand'] . "</th><th>" . $disc['model'] . "</th><th>" . $disc['color'] . "</th><th>" . $disc['plastic'] . "</th><th>" . $disc['contact_name'] . "</th><th>" . $disc['phone_num'] . "</th><th></tr>");
                    }

            echo "</table>";
        ?>
    </section>

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

<?php require_once 'footer.php'; ?>
