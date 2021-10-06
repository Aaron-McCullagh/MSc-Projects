<?php
session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: ../adminlogin.php");
}

include("../includes/functions.php");

adminHead();
adminNav();
?>
<div class="container">

    <h2>Add Product</h2>
    <br>

    <?php


    $endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";

    $dataset = file_get_contents($endpoint);

    $allproducts = json_decode($dataset, true);

    foreach ($allproducts as $row) {

        $productid = $row['id'];
        $name = $row['name'];
        $description = $row['description'];
        $img = $row['Img URL'];
        $price = $row['price'];
        $category = $row['category'];
        $categoryid = $row['category id'];
        $subcategory = $row['sub category'];
        $subcatid = $row['sub category id'];
    }


    echo "<form method='POST' action='processadditem.php'>
<fieldset>
<div class='form-group'>
<label for='nameField'><strong>Product Name</strong></label>
<input type='text' class='form-control' name ='name' required = 'required'><br>

<div class='mb-3'>
                            <label for='brands' class='col-4 col-form-label brandorcatlist'><strong>Brand</strong></label>
                            <div class='col-8 brandorcatlist' >
                                <select name='brandid' id_data class='custom-select brandorcatselect'>
                                <option value='' selected disabled>Select Brand</option>
                                ";

    $brandsendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allbrands";

    $dataset2 = file_get_contents($brandsendpoint);

    $allbrands = json_decode($dataset2, true);

    $brandsonly = array();

    foreach ($allbrands as $row) {
        $brandid = $row['id'];
        $brandname = $row['name'];
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
    <select name='subcatid' id_data class='custom-select brandorcatselect' required = 'required'>
    <option value='' selected disabled>Select Category</option>
    ";

    $categoriesendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allcategoryinfo";

    $dataset3 = file_get_contents($categoriesendpoint);

    $allcategories = json_decode($dataset3, true);

    $subcategories = array();

    foreach ($allcategories as $row) {
        $maincategory = $row['cat name'];
        $subcatid = $row['sub cat id'];
        $subcategory = $row['sub cat name'];


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

         <textarea class='form-control' input type='text' rows='10' name ='description' required = 'required' placeholder ='...'></textarea> <br>

         <div class='form-group w-25'>
                        <label for='example1'><strong> Date Available:</strong></label>
                        <input type='date' name='dateavailable' class='form-control' id='dateavailable' placeholder='date' required='required'>
                    </div> <br>

<div class='form-group w-25'>
                    <label for='example1'> <strong>Price:</strong> </label>
                    <input type='text' min = '1' class='form-control'  name='price' placeholder='£' required='required'>
                </div> 

                <label for='imgField'><strong>Image URL</strong></label>
                <input type='text' class='form-control' name ='img' required = 'required'><br>
                <input type='hidden' name='views' value='0'/> 
                <input type='hidden' name='favs' value='0'/> 
                             


<input class='btn btn-success' type='submit' value='Add Item'>
</div>
</fieldset>       
</form>";

    ?>
</div>
<br>

<?php
adminFooter();
?>