<?php

session_start();

if(isset($_SESSION["user"])){

include('conn.php');

$customer = $_POST['customerid'];
$product = $_POST['productid'];
$favcount = $_POST['favcount'];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?favaction=add";


$posteddata = http_build_query(
  array('productid' => $product, 'favcount' => $favcount)
);

$opts = array(
  'http' => array(
    'method' => 'POST',
    'header' => 'Content-Type: application/x-www-form-urlencoded',
    'content' => $posteddata
  )

);

$context = stream_context_create($opts);

$result = file_get_contents($endpoint, false, $context);


$posteddata = http_build_query(
  array('customerid' => $customer, 'productid' => $product)
);

$opts = array(
  'http' => array(
    'method' => 'POST',
    'header' => 'Content-Type: application/x-www-form-urlencoded',
    'content' => $posteddata
  )

);

$context = stream_context_create($opts);

$result = file_get_contents($endpoint, false, $context);

if (!$result) {
  echo $conn->error;
} else {

  header("Location: product.php?itemid=$product");
}
}
?>