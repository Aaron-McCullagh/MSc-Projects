<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include('../includes/functions.php');
adminHead();
adminNav();

?>
<br>
    <div class="container">
      
       <div class="carousel" data-flickity='{ "fullscreen": true, "lazyLoad": 2 }'>
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/HiGC9mn.jpg"
                ondblclick="location.href='category.php?category=Basketball'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/uApUHxS.jpg"
                ondblclick="location.href='category.php?category=Camping'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/7v2wrXz.jpg"
                ondblclick="location.href='category.php?category=Bikes'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/lyifVhc.jpg"
                ondblclick="location.href='category.php?category=Exercise'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/2nBR9yo.jpg"
                ondblclick="location.href='category.php?category=Soccer'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/uotW5Dh.jpg"
                ondblclick="location.href='category.php?category=Golf'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/xwgRlv3.jpg"
                ondblclick="location.href='category.php?category=Gym'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/v0vywac.jpg"
                ondblclick="location.href='category.php?category=Tennis'" />
            <img class="carousel-image"
                data-flickity-lazyload="https://i.imgur.com/SlFcFr7.jpg"
                ondblclick="location.href='category.php?category=Water'" />

        </div>
    </div>
    
    
    </div>

<?php
adminFooter();
?>