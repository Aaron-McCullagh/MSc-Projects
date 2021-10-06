<?php

session_start();
include('../conn.php');
include("../includes/functions.php");

$usernameentered= ($_POST['username']);

$passwordentered = ($_POST['password']);

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?alladminaccounts";

$dataset = file_get_contents($endpoint);

$allaccounts = json_decode($dataset, true);

$creadentialsok = FALSE;

foreach ($allaccounts as $row) {

    $username = $row['username'];
    $password = $row['password'];


    $pw = password_verify ( $passwordentered, $password );

    if ($usernameentered == "$username" && $pw==TRUE) {    

        $creadentialsok=TRUE;
    }
}

    if($creadentialsok==TRUE){

        $_SESSION['admin'] = $usernameentered;       

        header('Location: index.php');

    } else if ($creadentialsok == FALSE){
       
        header('Location: ../adminlogin.php?error=invalid');


}


?>


    
        

    






