<?php
session_start();
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";

$dataset = file_get_contents($endpoint);

$allproducts = json_decode($dataset, true);
include ('conn.php');
include('includes/functions.php');
head();
navbar();

if(isset($_POST["search"])){

$str = $conn-> real_escape_string(trim($_POST['search']));
$boolean = FALSE;
?>

<br>
<div class='container'>
    <div class='row'>
        <br>

        <?php        

        foreach ($allproducts as $row) {

            $category = $row['category'];

            $id = $row['id'];

            $fullname = $row['name'];

            $description = $row['description'];

            $brand = $row['brand'];

            $img = $row['Img URL'];

            $price = $row['price'];

            $price = number_format((float)$price, 2, '.', '');
     

            $name = substr($fullname, 0, 50);

       
            

            if (stripos($fullname, $str) !== false) {
               
                $boolean=TRUE;

                if($boolean==TRUE){            

                echo "

                    <div class='col-6 col-md-4 '>
                    <div><a href = 'product.php?itemid=$id'> <img class='productImgs'
                    src='$img'></a></div> 
                     <div><a href = 'product.php?itemid=$id'> $name..</a> <br> <strong> $brand / £$price</strong><br>
                     <a id='view' href='product.php?itemid=$id'><button type='button' class='btn btn-outline-secondary'>View</button> </a>
    
                    <form method='post' action='basket.php?action=add&id=$id?>'>                
                    <input type='hidden' name='name' value='$name' />  
                    <input type='hidden' name='price' value='$price' /> 
                    <input type='submit' name='basket'   class='btn btn-outline-success' value='Buy' style='margin-left:5px;'/>
                    <input type='hidden' name='id' value = '$id'>
                    <input type='hidden' name='quantity' value='1'/> 
                    </form> 
                    </div>                                     
                     <br><br>
                    </div>                   
                    
                   ";  
                   
                }
            }
          
        }

        if($boolean==FALSE){
            echo "<strong>no results found!</strong>";
        }

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

?>