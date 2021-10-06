<?php
session_start();

include("includes/functions.php");

$categoryfilter = $_GET["category"];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?category=$categoryfilter";

$dataset = file_get_contents($endpoint);

$allproducts = json_decode($dataset, true);

$searchtype = $_GET["search"];

head();
navbar();

echo "<div class = 'container-fluid'>

 <div class='sortBy'>
        
    <select class='form-select' aria-label='Default select example'onchange='location = this.value;'>

        <option selected value='#'>Sort By</option>

        <option value ='sortproducts.php?category=$categoryfilter&search=price'>Price (Low to High)</option>
        <option value='reversesort.php?category=$categoryfilter&search=price'>Price (High to Low)</option>
        <option value='sortproducts.php?category=$categoryfilter&search=brand'>Brand (A to Z)</option>
        <option value='reversesort.php?category=$categoryfilter&search=brand'>Brand (Z to A)</option>

    </select>
</div>

<div class='sortBy'>
     
    <select class='form-select' aria-label='Default select example'onchange='location = this.value;'>

        <option selected value='#'>Category</option>
        <option  value='category.php?category=$categoryfilter'>All</option>
        ";

if ($categoryfilter == 'Basketball') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Basketballs'>Basketballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Hoops-and-Nets'>Hoops & Nets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Basketball-Equipment'>Other</option>            
            ";
} else if ($categoryfilter == 'Camping') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Chairs-and-Tables'>Chairs & Tables</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Cooking-Equipment'>Outdoor Cooking</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Camping-Equipment'>Necessities</option>            
            ";
} else if ($categoryfilter == 'Bikes') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Electric-Bikes'>Electric Bikes</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Regular-Bikes'>Regular Bikes</option>                
            ";
} else if ($categoryfilter == 'Exercise') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Combat-Sports'>Combat Sports</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Home-Exercise-Equipment'>Home Fitness</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Yoga'>Yoga</option>   
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Exercise-Equipment'>Other</option>                   
            ";
} else if ($categoryfilter == 'Soccer') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Footballs'>Footballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Goals'>Goal Posts</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Apparel'>Other</option>                            
            ";
} else if ($categoryfilter == 'Soccer') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Apparel'>Gear</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Footballs'>Footballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Goals'>Goal Posts</option>                                        
            ";
} else if ($categoryfilter == 'Gym') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Exercise-Machines'>Exercise Machines</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Weights'>Weights</option>                                   
            ";
} else if ($categoryfilter == 'Golf') {
    echo "
    <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Bags'>Bags</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Clubs'>Clubs</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Balls'>Golf Balls</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Gloves'>Gloves</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Shoes'>Shoes</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Push-Carts-and-Caddies'>Push Carts & Caddies</option>
    <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Golf-Equipment'>Other</option>                                
            ";
} else if ($categoryfilter == 'Tennis') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Tennis-Nets'>Nets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Racquets'>Raquets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Tables'>Table Tennis</option>            
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Tennis-Equipment'>Other</option>                                 
            ";
} else if ($categoryfilter == 'Water') {
    echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Wakeboards'>Wakeboards</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Wetsuits'>Wetsuits</option>                    
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Water-Sports-Equipment'>Other</option>                                 
            ";
}

echo "

    </select>
    
</div>
    
</div>

";

?>
<br><br>

<br>
<div class='container'>
    <div class='row'>
        <br>

        <?php
         function val_sort($array, $key) //https://johnmorrisonline.com/how-to-sort-multidimensional-arrays-using-php/
         { 
             foreach ($array as $k => $v) {
                 $newarray[] = strtolower($v[$key]);
             }
 
 
             asort($newarray);
 
 
             foreach ($newarray as $k => $v) {
                 $finalarray[] = $array[$k];
             }
 
             return $finalarray;
         }
       
        $sortedproducts = val_sort($allproducts, $searchtype);

        foreach ($sortedproducts as $row) {
            $category = $row['category'];
            $id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $brand = $row['brand'];
            $views = $row['views'];
            $updateviews = $views + 1;
            $img = $row['Img URL'];
            $price = $row['price'];
            $price = number_format((float)$price, 2, '.', '');
            $description = substr($description, 0, 60);
            $name = substr($name, 0, 50);


            echo "  
            <br><br>
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
        }

        ?>


    </div>
</div>

<div class="container">
    <hr>
    <h5 class="centreHeader"><strong>Trending <?php echo $categoryfilter?> Products</strong></h5><br>


    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <div class="carousel">


        <?php
        $trendingendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?trendingbycatg=$categoryfilter";
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

?>