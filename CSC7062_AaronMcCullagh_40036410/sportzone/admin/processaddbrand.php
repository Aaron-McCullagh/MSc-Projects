<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}
include('../conn.php');
include("../includes/functions.php");
adminHead();
adminNav();

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?brandaction=add";

$brand = $_POST['brand'];

$checkbrands = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allbrands";

$checkdataset = file_get_contents($checkbrands);
$checkbrands = json_decode($checkdataset, true);
$boolean = FALSE;

foreach($checkbrands as $row){
    $brandname = $row['name'];
    if($brandname==$brand){
        $boolean=TRUE;
    }
}

if($boolean==FALSE){

    $posteddata = http_build_query(
        array('brand'=>$brand)
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
        <h2 class='centreHeader'>Brand has been added</h2> 
        <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'>
        </div>
         ";
      }

}else if ($boolean == TRUE){
    echo"<div class = 'container'>
    <h2 class='centreHeader'>Brand already exists</h2> 
    <img class='favstar'src='https://www.driversupport.com/wp-content/uploads/2019/04/red-x-on-network-icon.png'>
        </div>
    </div>
     ";    
}

adminFooter();


?>