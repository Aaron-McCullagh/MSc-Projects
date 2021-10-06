<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include('../conn.php');
include("../includes/functions.php");
adminHead();
adminNav();

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?subcataction=add";

$subcat = $_POST['subcat'];
$maincatid=$_POST['maincatid'];


$posteddata = http_build_query(
    array('subcat'=>$subcat, 'maincatid'=>$maincatid)
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
    echo"<div class = 'container'>
    <h2 class='centreHeader'>Sub category has been added</h2> 
    <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'>
     ";
  }

adminFooter();


?>