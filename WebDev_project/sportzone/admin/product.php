<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}


include("../includes/functions.php");

adminHead();
adminNav();

$id = $_GET['itemid'];

?>
<div class="container">

<br>
<?php
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?id=$id";

$dataset = file_get_contents($endpoint);

$product = json_decode($dataset, true);


foreach ($product as $row) {

        $id = $row['id'];

        $name = $row['name'];

        $description = $row['description'];

        $brand = $row['brand'];

        $img = $row['Img URL'];

        $price = $row['price'];

        $price = number_format((float)$price, 2, '.', '');

        echo "<div><h4 id = 'productName'>$name</h4></div>
                 <br>
                 <div><h4 id = 'productName'>by: <strong>$brand</strong></h4></div><br>

                 <div><img class='productImgs2'src='$img'></div>

                <div id = 'productPrice'><h4>£$price</h4></div>                
               
               
                <div><strong>Description</strong></div>

                <div> <p id='productDescription'>$description.<p></div>
              
                <a href = 'editproduct.php?itemid=$id'><button type='button' class='btn btn-outline-secondary'>Edit</button> </a>
                <a href = 'deleteproduct.php?itemid=$id'><button type='button' class='btn btn-outline-danger'>Delete</button> </a></div>
                 "  ;
   
   
}

?>

</div>


<br>

<?php

adminFooter();


?>