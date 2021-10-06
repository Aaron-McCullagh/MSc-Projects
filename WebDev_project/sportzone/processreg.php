<?php

include('conn.php');
include('includes/functions.php');
head();
navbar();

$title = ($_POST['title']);
$name = ($_POST['name']);
$email = ($_POST['email']);
$password = ($_POST['password']);
$address = ($_POST['address']);
$city =($_POST['city']);
$phone = ($_POST['phone']);



$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?accountaction=add";

$usercheckendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allaccounts";

$dataset = file_get_contents($usercheckendpoint);

$useraccounts = json_decode($dataset, true);

$emailexists = FALSE;

foreach ($useraccounts as $row) {

    $existingemail = $row['email'];

    if($email==$existingemail){
        $emailexists=TRUE;        
    }
}
if($emailexists==TRUE){
    echo "
    <div class = 'container'>
    <a href='login.php'><h2 id='productName'>Email aready exists! Please login..</h2> 
    <img class='favstar'src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRuSdVliN0sL4jr8npWJPUTl0KJmGxwmDVQg&usqp=CAU'></a>
    </div>

     ";
}

else if($emailexists==FALSE){

    $posteddata = http_build_query(
        array('title'=>$title, 'name'=>$name, 'email'=>$email, 'password'=>$password, 'address'=>$address, 'city'=>$city, 'phone'=>$phone )
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
    <a href='login.php'><h2 id='productName'>Registration complete! Please login..</h2> 
    <img class='favstar'src='https://www.displaysense.co.uk/images/social-distancing-green-tick-floor-vinyl-sticker-300mm-p3756-14415_image.jpg'></a>
    </div>

     ";      
       
    }

}

footer2();

?>


   
   
  
    