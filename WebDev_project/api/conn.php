<?php

$username = "amccullagh06";

$pw= "GcHybvNGHzR0rmDC";

$host = "amccullagh06.lampt.eeecs.qub.ac.uk";

$db = "amccullagh06";

$conn = new mysqli($host, $username, $pw, $db );

if(!$conn){
    echo "not connected" .$conn->error;
    
}else{
   // echo "connected to database";
}


?>