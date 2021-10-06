<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}
include("../includes/functions.php");

$categoryfilter = $_GET['category'];
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?category=$categoryfilter";


$dataset = file_get_contents($endpoint);

$allproducts = json_decode($dataset, true);

adminHead();
adminNav();

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

        if($categoryfilter=='Basketball'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Basketballs'>Basketballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Hoops-and-Nets'>Hoops & Nets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Basketball-Equipment'>Other</option>            
            ";
        } else if ($categoryfilter=='Camping'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Chairs-and-Tables'>Chairs & Tables</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Cooking-Equipment'>Outdoor Cooking</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Camping-Equipment'>Necessities</option>            
            ";
        }else if ($categoryfilter=='Bikes'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Electric-Bikes'>Electric Bikes</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Regular-Bikes'>Regular Bikes</option>                
            ";
        } else if ($categoryfilter=='Exercise'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Combat-Sports'>Combat Sports</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Home-Exercise-Equipment'>Home Fitness</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Yoga'>Yoga</option>   
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Exercise-Equipment'>Other</option>                   
            ";
        } else if ($categoryfilter=='Soccer'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Footballs'>Footballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Goals'>Goal Posts</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Apparel'>Other</option>                            
            ";
        }else if ($categoryfilter=='Soccer'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Apparel'>Gear</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Footballs'>Footballs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Goals'>Goal Posts</option>                                        
            ";
        }else if ($categoryfilter=='Gym'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Exercise-Machines'>Exercise Machines</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Weights'>Weights</option>                                   
            ";
        }else if ($categoryfilter=='Golf'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Bags'>Bags</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Clubs'>Clubs</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Balls'>Golf Balls</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Gloves'>Gloves</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Golf-Shoes'>Shoes</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Push-Carts-and-Caddies'>Push Carts & Caddies</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Golf-Equipment'>Other</option>                                  
            ";
        }else if ($categoryfilter=='Tennis'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Tennis-Nets'>Nets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Racquets'>Raquets</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Tables'>Table Tennis</option>            
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Tennis-Equipment'>Other</option>                                 
            ";
        }else if ($categoryfilter=='Water'){
            echo "
            <option value ='subcategory.php?category=$categoryfilter&subcat=Wakeboards'>Wakeboards</option>
            <option value ='subcategory.php?category=$categoryfilter&subcat=Wetsuits'>Wetsuits</option>                    
            <option value ='subcategory.php?category=$categoryfilter&subcat=Other-Water-Sports-Equipment'>Other</option>                                 
            ";
        }

echo"

    </select>
    
</div>
    
</div>

";
?>

<br>
<div class='container'>
    <div class='row'>
        <br>

        <?php

        foreach ($allproducts as $row) {         
            
                $category = $row['category'];
                $id = $row['id'];
                $name = $row['name'];
                $description = $row['description'];
                $brand = $row['brand'];
                $img = $row['Img URL'];
                $price = $row['price'];
                $price = number_format((float)$price, 2, '.', '');
                $description = substr($description, 0, 60);
                $name = substr($name, 0, 50);

                echo "
                <div class='col-6 col-md-4 '>
 
        <div><a href = 'product.php?itemid=$id'><img class='productImgs'
        src='$img'></a></div> 
        <div><a href = 'product.php?itemid=$id'> $name... <br></a><strong>$brand / £$price </strong><br>
        <a href = 'product.php?itemid=$id'><button type='button' class='btn btn-outline-success'>View</button> </a>
        <a href = 'editproduct.php?itemid=$id'><button type='button' class='btn btn-outline-secondary'>Edit</button> </a>
        <a href = 'deleteproduct.php?itemid=$id'><button type='button' class='btn btn-outline-danger'>Delete</button> </a></div>
        <br><br><br>
        </div>            
 ";               
              
            }
          
      ?>


    </div>
  </div>

  <?php
  adminFooter();
  ?>