<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}

include("../includes/functions.php");

adminHead();
adminNav();
?>
<div class="container">

    <h2>Edit Product</h2>
    <br>

    <?php


    $endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";

    if(isset($_GET['itemid'])){    

    $id = $_GET['itemid'];

    $dataset = file_get_contents($endpoint);

    $allproducts = json_decode($dataset, true);

    foreach ($allproducts as $row) {

        $productid = $row['id'];

        if ($productid == $id) {
            
            $name = $row['name'];
            $description = $row['description'];
            $brand = $row['brand'];
            $brandid = $row['brand id'];
            $img = $row['Img URL'];
            $price = $row['price'];
            $category = $row['category'];
            $categoryid = $row['category id'];
            $subcategory = $row['sub category'];
            $subcatid = $row['sub category id'];
        }
    }



    echo "<form method='POST' action='processedit.php'>
<fieldset>
<div class='form-group'>
<label for='nameField'><strong>Product Name</strong></label>
<input type='text' value='$name' class='form-control' name ='name' required = 'required'><br>

<div class='mb-3'>
                            <label for='brands' class='col-4 col-form-label brandorcatlist'><strong>Brand</strong></label>
                            <div class='col-8 brandorcatlist' >
                                <select name='brandid' id_data class='custom-select brandorcatselect'>
                                <option value = $brandid >$brand</option>
                                ";

    $brandsonly = array();

    foreach ($allproducts as $row) {
        $brandid = $row['brand id'];
        $brandname = $row['brand'];
        $item = array('brand' => $brandname, 'brand id' => $brandid);

        array_push($brandsonly, $item);
    }

    sort($brandsonly);
    $brandsonly = unique_multid_array($brandsonly, 'brand');
    foreach ($brandsonly as $row) {

        $brandids = $row['brand id'];

        $brandnames = $row['brand'];

        echo "<option value='$brandids'>$brandnames</option>";
    }
    echo " </select>
        </div>
        </div>

<div class='mb-3'>
<label for='category' class='col-4 col-form-label brandorcatlist'><strong>Category</strong></label>
<div class='col-8 brandorcatlist' >
    <select name='subcatid' id_data class='custom-select brandorcatselect' >
    <option value = $subcatid >$category : $subcategory</option>
    ";

    $subcategories = array();

    foreach ($allproducts as $row) {
        $maincategory = $row['category'];
        $subcatid = $row['sub category id'];
        $subcategory = $row['sub category'];

        $item = array('main category' => $maincategory, 'sub category' => $subcategory, 'sub category id' => $subcatid);

        array_push($subcategories, $item);
    }

    sort($subcategories);
    $subcategories = unique_multid_array($subcategories, 'sub category id');
    foreach ($subcategories as $row) {

        $maincategory = $row['main category'];

        $subcatid = $row['sub category id'];

        $subcat = $row['sub category'];

        echo "<option value='$subcatid'>$maincategory : $subcat</option>";
    }
    echo " </select>
</div>
</div>



<br>

         <label for='descriptionField'><strong>Description</strong></label>

         <textarea class='form-control' input type='text' rows='10' name ='description' required = 'required'>$description</textarea> <br>


<div class='form-group w-25'>
                    <label for='example1'> <strong>Price:</strong> </label>
                    <input type='text' min = '1' class='form-control'  name='price' value = '$price' >
                </div> 

                <div><img class='productImgs'src='$img'></div> 

                <label for='imgField'><strong>Image URL</strong></label>
                <input type='text' value='$img' class='form-control' name ='img' required = 'required'><br>

                <input type='hidden' value='$id' name='id'>
               


<input class='btn btn-success' type='submit' value='Update'>
</div>
</fieldset>       
</form>";

    ?>
</div>
<br>

<?php
}
adminFooter();
?>