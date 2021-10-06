<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include("../includes/functions.php");

adminHead();
adminNav();

if(isset($_GET['itemid'])){

$id = $_GET['itemid'];

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?id=$id";

$dataset = file_get_contents($endpoint);

$product = json_decode($dataset, true);

foreach ($product as $row) {

    $productid = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $brand = $row['brand'];
    $img = $row['Img URL'];
    $category = $row['category'];
    $subcat = $row['sub category'];
}


?>

<div class="container">

    <?php
    echo "
    <h2 id='productName'>Are you sure you want to delete? 
    <form id='delete' method='post' action='processdelete.php?'>                
    <input type='hidden' name='id' value='$id' />  
    <input type='submit'class='btn btn-btn btn-danger' value='Delete'/>
    </form>
    <a href='subcategory.php?category=$category&subcat=$subcat'><button type='button' class='btn btn-secondary'>Go Back</button> </a></h2> 
     <br>    
            <div><h4 id = 'productName'>$name</h4></div>
             <br>

            <div><img class='productImgs2'src='$img'></div><br>

            <div> <p id='productDescription'>$description.<p></div>  
            
            ";

    ?>
</div>
<br>

<?php
}
adminFooter();

?>