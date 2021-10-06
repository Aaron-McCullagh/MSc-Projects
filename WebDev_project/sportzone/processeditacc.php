<?php
session_start();


include('conn.php');
include('includes/functions.php');

$id = $_POST['id'];
$title = $_POST['title'];
$name = $_POST['name'];
$address = $_POST['address'];
$city = $_POST['city'];
$phone = $_POST['phone'];

if(isset($_SESSION['id'])){

  $thisid= $_SESSION['id'];
  if($thisid==$id){


$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?accountaction=edit";

$posteddata = http_build_query(
  array('id'=>$id, 'title'=>$title, 'name'=>$name,  'address'=>$address, 'city'=>$city, 'phone'=>$phone)
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
 
  header("Location: myaccount.php");
	 
}

}
  
}


?>
