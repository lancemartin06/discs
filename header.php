<html>
    <head>
        <link rel="stylesheet" href="mystyle.css">
        <title>Home</title>
        <link rel="shortcut icon" href="/Pictures/favicon.ico" type="image/x-icon"/>
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
        <script src= "https://code.jquery.com/jquery-3.2.1.js">
        </script>
        <script type="text/javascript">
            $(window).on('scroll', function(){
                    
                    if($(window).scrollTop()){
                        $('nav').addClass('black');
                    }
                    else{
                        $('nav').removeClass('black');
                    }
                })
        </script>
    </head>
    
    <body>
        <div class = "wrapper">
        <nav>
            <div class = "logo"><img src="Pictures/untitled4.png" align="left"></div>
            <ul>
                <li><a href="diskHistory.php">Disk History</a></li>
                <li><a href="courses.php">Boise Courses</a></li>
                <li><a href="starting.php">Get Started</a></li>
                <li><a href="lostDiscs.php">Lost Discs</a></li>
            </ul>
        </nav>
        <section class="sec1"></section>
        <section class="content">
            <p>.</p>
        </section>
    
        
    </div>
    