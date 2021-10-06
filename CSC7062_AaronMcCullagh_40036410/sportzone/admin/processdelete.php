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
 
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?action=delete";


$posteddata = http_build_query(
    array('id'=>$id)
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

    <h2 id='productName'>Item has been deleted</h2>
    <img class='favstar'src='https://thumbs.dreamstime.com/b/trash-bin-line-icon-delete-outline-logo-illustration-li-linear-pictogram-isolated-white-90235498.jpg'> 
     ";
  }
  adminFooter();
  
  ?>
