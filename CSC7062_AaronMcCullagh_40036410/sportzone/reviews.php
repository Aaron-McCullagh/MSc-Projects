<?php

include('conn.php');

$useraccount= $_POST['accountid'];
$productid = $_POST['productid'];
$review = $_POST['review'];
$rating = $_POST['rating'];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?reviewaction=add";

$posteddata = http_build_query(
  array('accountid'=>$useraccount, 'productid'=>$productid, 'review'=>$review, 'rating'=>$rating )
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
  header("Location: product.php?itemid=$productid");
}


?>



  
  

