<?php
    define("PAGENAME", "courses");

    require_once("header.php");

?>
<title>Courses</title>


<section class="sec1">

    <div class = "firstCenter">

        <div id="map">

        </div>
    </div>
</section>

<script>
function myMap() {
var mapOptions = {
    center: new google.maps.LatLng(43.612, -116.22),
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.TERRAIN
}
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBRx6Uyqvmt-D3yNIGhsfYUgBlUj6J8f0&callback=myMap"></script>

        <section class="content">
            <pre><h1>Anne Morrison</h1>
                <img src = "Pictures/Courses/annemorrison.jpg">
                Anne Morrison park is a great park to disc golf. 
                It supports a large course with many challenging and obstacles. 
                The park is very friendly to disc golfers and is very popular 
                to many people in the communitiy. 
            </pre>
        </section>
        <section class="content">
            <pre><h1>Bogus Basin</h1>
                <img src = "Pictures/Courses/bogus.jpg">
                Bogus Basin is normally thought of as a ski resort, but in 
                the summer time, it becomes incredible scene for disc golf. It 
                is much more challenging than your average course, 
                it offers a lot more diversity and unforgettable scenery. 
            </pre>
        </section>
    
        
    </div>


<?php require_once("footer.php"); ?>