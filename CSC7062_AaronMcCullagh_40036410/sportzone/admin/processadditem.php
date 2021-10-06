<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include('../conn.php');
include("../includes/functions.php");

    $name= $_POST['name'];
    $description= $_POST['description'];
    $brandid= $_POST['brandid'];
    $price= $_POST['price'];    
    $img = $_POST['img'];
    $subcatid = $_POST['subcatid'];
    $dateavailable = $_POST['dateavailable'];
    $dateavailable = date('Y-m-d', strtotime($dateavailable));
    $dateadded =  date('Y-m-d');
    $views = $_POST['views'];
    $favs = $_POST['favs'];


$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?action=add";

$posteddata = http_build_query(
    array('name'=>$name, 'description'=>$description, 'brandid'=>$brandid, 'price'=>$price, 'subcatid'=>$subcatid, 'img'=>$img, 'dateavailable'=>$dateavailable, 'dateadded'=> $dateadded, 'views'=>$views, 'favs'=>$favs)
  );
  
  $opts = array(
    'http' => array(
        'method' =>'POST',
        'header' => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $posteddata
    )
  
  );
  
  $context = stream_context_create($opts);
  
  $result = file_get_contents($endpoint, false, $context);
  
  if (!$result) {
    echo $conn->error;

  } else {
    adminHead();
    adminNav();

    $allproductsendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";
    $dataset = file_get_contents($allproductsendpoint);
    $allproducts = json_decode($dataset, true);
    $newid = '';
    foreach($allproducts as $row){

      $productid = $row['id'];
      $productname = $row['name'];
      $desc = $row['description'];

      if($productname==$name && $desc==$description){
        $newid = $row['id'];
      }

    }


    echo" <div class = 'container'>

    <h2 id='productName'>Item added successfully</h2> 
    <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'>

    <a href='product.php?itemid=$newid'><div><h4 id = 'productName'>$name</h4></div>
    <br>

   <div><img class='productImgs2'src='$img'></div><br>

   <div> <p id='addproductdesc'>$description.<p></div></a>
   </div>
    ";
    
    
  } 

  adminFooter();
  
  ?>
