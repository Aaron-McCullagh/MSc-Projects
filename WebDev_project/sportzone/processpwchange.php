<?php
session_start();

if(isset($_SESSION["user"])){

include('conn.php');
include('includes/functions.php');

$currentpw = $_POST['current'];

$id = $_POST['id'];

$password= $_POST['password'];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?accountaction=editpw";

$dataset = file_get_contents($endpoint);

$pws = json_decode($dataset, true);

$thisaccendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?idpw=$id";

$dataset2 = file_get_contents($thisaccendpoint);

$thisacc = json_decode($dataset2, true);
$boolean=FALSE;

foreach($thisacc as $row){
    $pw = $row['password'];
}

$verifypw = password_verify ($currentpw, $pw);

if($verifypw==TRUE){

    
    $posteddata = http_build_query(
        array('id'=>$id, 'password'=>$password)
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



}else{ 
    head();
    navbar();

 echo"  
 <div class = 'container'>
    <a href='javascript:history.back()'><h2 id='productName'>Invalid current password! Go back </h2> 
    <img class='favstar'src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRuSdVliN0sL4jr8npWJPUTl0KJmGxwmDVQg&usqp=CAU'></a>
    </div>
 
 ";

footer2();

}
}
?>
