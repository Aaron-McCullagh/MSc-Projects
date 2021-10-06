<?php

session_start();
if(isset($_SESSION["user"])){
include('conn.php');
include('includes/functions.php');
$custid = $_GET['custid'];

$favid = $_POST['favid'];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?favaction=remove";

$posteddata = http_build_query(
  array('favid'=>$favid)
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

  header("Location: favourites.php?id=$custid");
	/*echo '<script>window.location="myaccount.php"</script>';*/
 
}

}

?>




