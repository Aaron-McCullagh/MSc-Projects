<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include('../conn.php');
include("../includes/functions.php");
adminHead();
adminNav();

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?adminaccountaction=add";

$username = $_POST['username'];
$password = $_POST['password'];
$checkusersendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?alladminaccounts";

$checkdataset = file_get_contents($checkusersendpoint);
$checkusers = json_decode($checkdataset, true);
$boolean = FALSE;

foreach($checkusers as $row){
    $user = $row['username'];
    if($username==$user){
        $boolean=TRUE;
    }
}

if($boolean==FALSE){

    $posteddata = http_build_query(
        array('username'=>$username, 'password'=>$password)
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
        <h2 class='centreHeader'>Admin user has been added</h2> 
        <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'>
        </div>
         ";
      }

}else if ($boolean == TRUE){
    echo"<div class = 'container'>
    <h2 class='centreHeader'>Username already exists</h2> 
    <img class='favstar'src='https://www.driversupport.com/wp-content/uploads/2019/04/red-x-on-network-icon.png'>
    </div>
     ";    
}

adminFooter();

?>