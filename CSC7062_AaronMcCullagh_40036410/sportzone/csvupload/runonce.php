<?php
 
include("conn.php");
 
 
$file = "sportzone.csv";
 
if (file_exists($file)) {
 
    $filepath = fopen($file, "r");
 
    while( ($line = fgetcsv($filepath)) !== FALSE ){

       
      $insert =  "INSERT INTO SportZone (Name, Description, Brand, Price, Category, Category_ID, Img_URL)
        
                VALUES ('{$line[0]}', '{$line[1]}', '{$line[2]}', '{$line[3]}', '{$line[4]}', '{$line[5]}', '{$line[6]}' )";
 
        $result = $conn->query($insert);

        if(!$result){
            echo $conn->error;
            die();
        }
        
    }
 
}