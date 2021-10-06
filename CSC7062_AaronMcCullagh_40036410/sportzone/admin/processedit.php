<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include('../conn.php');
include('../includes/functions.php');
adminHead();

adminNav();

    $id = $_POST['id'];
    $name= $_POST['name'];
    $description= $_POST['description'];
    $brandid= $_POST['brandid'];
    $price= $_POST['price'];    
    $img = $_POST['img'];
    $subcat = $_POST['subcatid'];  
    
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?action=update";

$posteddata = http_build_query(
    array('id'=>$id, 'name'=>$name, 'description'=>$description, 'brandid'=>$brandid, 'subcatid' =>$subcat, 'price'=>$price, 'img'=>$img )
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
    echo"
    <div class = 'container'>

    <a href='product.php?itemid=$id'><h2 id='productName'>Item has been updated</h2> 
    <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'></a>

    </div>
     ";
  }
  
  adminfooter();
  
  ?>
