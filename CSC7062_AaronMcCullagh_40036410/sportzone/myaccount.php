<?php
session_start();
include('includes/functions.php');
head();
navbar();

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allaccounts";

$dataset = file_get_contents($endpoint);

$allaccounts = json_decode($dataset, true);




if(isset($_SESSION["user"])){

    $account = $_SESSION["user"];

    foreach ($allaccounts as $row) {

        $email = $row['email'];

        if($account == $email){

            $id = $row['id'];           
            $password = $row['password'];
            $name = $row['name'];
            $address = $row['address'];
            $city = $row['city'];
            $phone = $row['phone'];
            $thisemail = $row['email'];

        }
      
  }

    echo "
    <br>
    
    <div class='container'>

        <div><h4 id = myacc >My Account </h4><a id='inlinebtn' href='logout.php '><button type='button' class='btn btn-outline-danger''>Log out</button></a><br><br></div>

        <div class='row myacc'>

            <div class='col'><br>
                Name: $name<br><br>
                Email: $thisemail <br><br>
                Phone: $phone  <a class='rightbutton' href='editaccount.php?id=$id'><button type='button' class='btn btn-secondary'>Edit</button></a><br><br> 
            </div>

        </div>
        <div class='row myacc'>
            <div class='col'><br> My Address: <br><br>
               $address<br>$city <a class='rightbutton' href='editaccount.php?id=$id'><button type='button' class='btn btn-secondary'>Edit</button></a><br><br> </div>              
         </div>

         <div class='row myacc'>
         <div class='col'><br><a href='changepw.php?id=$id'><button type='button' class='btn btn-outline-secondary'>Change Password</button></a><br><br> </div>
            
      </div>

        <div class='row myacc'>
            <div class='col'><br> My Favourites <br><br> ";

            $favendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?custidfav=$id";

            $favdataset = file_get_contents($favendpoint);

            $favourites = json_decode($favdataset, true);

            $counter = 0;

            foreach ($favourites as $row) {               
               
                $product = $row['product'];
                $product = substr($product, 0, 50);   
                echo "<div> $product....</div> ";
                $counter++;
                if($counter == 3){
                    break;
                }
                       

            }

            echo "

                <a class='rightbutton' href='favourites.php?id=$id '><button type='button' class='btn btn-success '>View All</button></a><br><br>     
        </div>        

    </div>   
    
      
    </div>

     ";   
     footer();

     

}else{
    
    echo " <div class = 'container'>
    <a href = 'login.php'><h2 class='centreHeader'>Please Login</h2></a>
    
        </div>
    </div>
     ";    ;
    footer2();
}
?>