<?php
session_start();
include("includes/functions.php");
head();
navbar()
?>

<div class="container-fluid">
<div class="landing">
    <h5 id="intro">Welcome to Sport Zone </h5>
    <h6 id="intro"> Shop our departments for your sports, and other outdoor equipment needs..</h6>
    </div>
    <br>

    <div class="carousel landing" data-flickity='{ "fullscreen": true, "lazyLoad": 2 }'>
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/HiGC9mn.jpg" ondblclick="location.href='category.php?category=Basketball'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/uApUHxS.jpg" ondblclick="location.href='category.php?category=Camping'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/7v2wrXz.jpg" ondblclick="location.href='category.php?category=Bikes'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/lyifVhc.jpg" ondblclick="location.href='category.php?category=Exercise'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/2nBR9yo.jpg" ondblclick="location.href='category.php?category=Soccer'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/uotW5Dh.jpg" ondblclick="location.href='category.php?category=Golf'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/xwgRlv3.jpg" ondblclick="location.href='category.php?category=Gym'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/v0vywac.jpg" ondblclick="location.href='category.php?category=Tennis'" />
        <img class="carousel-image" data-flickity-lazyload="https://i.imgur.com/SlFcFr7.jpg" ondblclick="location.href='category.php?category=Water'" />

    </div>
</div>
    <br><br>

<?php

if (isset($_SESSION["category"])) {

$category = $_SESSION["category"];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?trendingbycatg=$category";

$dataset = file_get_contents($endpoint);

$allcategoryproducts = json_decode($dataset, true);

if($category=="allproducts"){
    echo "  <br><br><h5 class='centreHeader'><a href='category.php?category=$category'><strong>Continue shopping : </strong> All Equipment</a></h5>
    <br><br>
    
    
    <div class = 'container'>
    <div class='row'>      
    "; 
}else{

    echo "  <br><br><h5 class='centreHeader'><a href='category.php?category=$category'><strong>Continue shopping : </strong> $category Equipment</a></h5>
<br><br>


<div class = 'container'>
<div class='row'>      
";

}

$counter = 0;
foreach ($allcategoryproducts as $row) {
    $counter++;
    $id = $row['id'];
    $name = $row['name'];
    $brand = $row['brand'];
    $img = $row['Img URL'];
    $price = $row['price'];
    $price = number_format((float)$price, 2, '.', '');
    $name = substr($name, 0, 35);
    $views = $row['views'];
    $updateviews = $views + 1;

    echo " 
    <div class='col-6 col-md-4 '>
                
    <form  method='post' action='processview.php'>                
    <input type='hidden' name='id' value='$id' />  
    <input type='hidden' name='views' value='$updateviews' /> 
   
    <input type='image' class ='productImgs'  src='$img' alt='Submit' />
                  
    </form>        


     <div> $name..<br> <strong> $brand / £$price</strong><br>
    

    <form class = 'viewform' method='post' action='processview.php?itemid=$id'>                
    <input type='hidden' name='id' value='$id' />  
    <input type='hidden' name='views' value='$updateviews' /> 
    <input type='submit' name='submit'   class='btn btn-outline-secondary' value='View' />
                  
    </form> 

    <form method='post' action='basket.php?action=add&id=$id'>                
    <input type='hidden' name='name' value='$name' />  
    <input type='hidden' name='price' value='$price' /> 
    <input type='submit' name='basket' class='btn btn-outline-success' value='Buy' style='margin-left:5px;'/>
    <input type='hidden' name='id' value = '$id'>
    <input type='hidden' name='quantity' value='1'/>                
    </form> 
    </div>                                     
     <br><br><br>
    </div>
           
";
    if ($counter == 6) {
        break;
    }
}

echo "

</div>
</div>

";
} else {

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?trendingbycatg=Gym";
$dataset = file_get_contents($endpoint);
$allcategoryproducts = json_decode($dataset, true);


echo "  <br><br><h5 class='centreHeader'><a href='category.php?category=Gym'><strong>Featured : </strong> Gym Equipment</a></h5>
<br><br>


<div class = 'container'>
<div class='row'>      
";
$counter = 0;
foreach ($allcategoryproducts as $row) {
    $counter++;
    $id = $row['id'];
    $name = $row['name'];
    $brand = $row['brand'];
    $img = $row['Img URL'];
    $price = $row['price'];
    $price = number_format((float)$price, 2, '.', '');
    $name = substr($name, 0, 35);
    $views = $row['views'];
    $updateviews = $views + 1;

    echo " 
    <div class='col-6 col-md-4 '>
                
    <form  method='post' action='processview.php'>                
    <input type='hidden' name='id' value='$id' />  
    <input type='hidden' name='views' value='$updateviews' /> 
   
    <input type='image' class ='productImgs'  src='$img' alt='Submit' />                  
    </form>       
   
     <div> $name..<br> <strong> $brand / £$price</strong><br>
    

    <form class = 'viewform' method='post' action='processview.php?itemid=$id'>                
    <input type='hidden' name='id' value='$id' />  
    <input type='hidden' name='views' value='$updateviews' /> 
    <input type='submit' name='submit'   class='btn btn-outline-secondary' value='View' />                  
    </form> 

    <form method='post' action='basket.php?action=add&id=$id'>                
    <input type='hidden' name='name' value='$name' />  
    <input type='hidden' name='price' value='$price' /> 
    <input type='submit' name='basket' class='btn btn-outline-success' value='Buy' style='margin-left:5px;'/>
    <input type='hidden' name='id' value = '$id'>
    <input type='hidden' name='quantity' value='1'/>                
    </form> 
    </div>                                     
     <br><br><br>
    </div>
           
";
    if ($counter == 6) {
        break;
    }
}

echo "

</div>
</div>

";

}

?>
</div>
<br><br>
<div class="container-fluid">
<div class="landing">
    
    <h5 class="centreHeader"><strong> Trending Sport Zone Products </strong>
    <img class='trendinglogo' src='https://media.istockphoto.com/vectors/star-icon-favorite-sign-bookmark-button-flat-style-vector-id654224854?b=1&k=6&m=654224854&s=612x612&w=0&h=M3OZUB2n0JuiU6RIcnZjVF6HF2OPpq38OWXbycAGUl0='></h5><br>
    

    <div class="carousel landing" data-flickity='{ "fullscreen": true, "lazyLoad": 2, "pageDots":false , "autoPlay":true}'>  

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

    </div>

</div>
</div>

<?php    
    footer();
?>