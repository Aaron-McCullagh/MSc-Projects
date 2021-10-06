<?php
session_start();

include('conn.php');

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?action=updateviews";

$id = $_POST['id'];
$views = $_POST['views'];



    $posteddata = http_build_query(
        array('id'=>$id, 'views'=>$views)
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
      
        
      
        header('Location: product.php?itemid='.$id);
      

?>