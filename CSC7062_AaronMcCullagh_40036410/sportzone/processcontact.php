<?php
session_start();
include('conn.php');
include('includes/functions.php');
head();
navbar();

$enquiry = ($_POST['enquiry']);
$name = ($_POST['name']);
$email =($_POST['email']);


$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?submitenquiry";

$posteddata = http_build_query(
  array('enquiry'=>$enquiry, 'name'=>$name, 'email'=>$email)
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

  echo "
  <div class = 'container'>
 <h2 id='productName'>Your enquiry has been sent!</h2> 
  <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'>
  </div>
  ";
	 
}

footer2();

?>