<?php

session_start();

if(isset($_SESSION["user"])){

    $custid = $_GET['id'];
    if($_SESSION['id']==$custid){  

$favendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?custidfav=$custid";
$favdataset = file_get_contents($favendpoint);
$favourites = json_decode($favdataset, true);

include('includes/functions.php');

head();

navbar();

?>

<div class="container">
<a href="javascript:history.back()"> <img class="backlogo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcpVKbStH4n3DWYQ5wIyYVjI17xzv3B1e2pyf6gmjvuuJenbAzveHCzu5ZpUiYJjXI7F0&usqp=CAU" alt=""></a>
<br><br>
<div class="row">


<?php

foreach ($favourites as $row) {
                    
                    $product = $row['product'];
                    $brand = $row['brand'];
                    $img = $row['img'];
                    $productid = $row['product id'];                   
                    $favid = $row['fav id'];
                    $name = substr($product, 0, 50);
    
    
                    echo "
                    <br><br>                   
                    <div class='col-6 col-md-4 '>
                    <div><a href = 'product.php?itemid=$productid'><img class='productImgs'
                    src='$img'></a></div> 
                     <div><a href = 'product.php?itemid=$productid'> $name..</a> <br> <strong> $brand</strong><br>
                     <a id='view' href='product.php?itemid=$productid'><button type='button' class='btn btn-outline-secondary'>View</button></a>
    
                    <form method='POST' action='removefav.php?custid=$custid'>             
                    <input type='hidden' name='favid' value='$favid' /> 
                    <input type='submit' class='btn btn-outline-danger' value='Remove' style='margin-left:5px;'/>                 
                    </form> 
                    </div>                                     
                     <br><br>
                    </div>                    
                    
                   ";           
               
            }

?>

</div>
</div>
<div class="container">
    <hr>
    <h5 class="centreHeader"><strong>Trending Sport Zone Products</strong></h5><br>


    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <div class="carousel">


        <?php
        $trendingendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?trending";
        $trendingdataset = file_get_contents($trendingendpoint);
        $trendingproducts = json_decode($trendingdataset, true);

        foreach ($trendingproducts as $row) {

            $productid = $row['id'];
            $productimg = $row['Img URL'];
            $name = $row['name'];
            $name = substr($name, 0, 30);
            
        ?>

<img class="carousel-image2" src="<?php echo $productimg ?>"  ondblclick="location.href='product.php?itemid=<?php echo $productid?>'" alt="<?php echo" $name.."?>" />

        <?php
        }
        ?>
        </div>

<p class="caption">&nbsp;</p>
       
    </div>

</div>



<script>
    var flkty = new Flickity('.carousel', {
        imagesLoaded: true,
        percentPosition: false,
        pageDots: false,
        autoPlay: true
    });

    var caption = document.querySelector('.caption');

    flkty.on('select', function() {
        // set image caption using img's alt
        caption.textContent = flkty.selectedElement.alt;
    });
</script>

<?php
footer();
}
}
?>


