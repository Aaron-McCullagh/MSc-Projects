<?php
session_start();

if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}
include("../conn.php");
include('../includes/functions.php');
adminHead();
adminNav();
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";

$dataset = file_get_contents($endpoint);

$allproducts = json_decode($dataset, true);

?>
<div class="container">
<h2>Edit Product</h2>
<br>       
            <form  method="POST" action="processadditem.php" enctype="multipart/form-data">
                <fieldset>
                    <div class="form-group">
                        <label for="Product Name"> <strong> Product Name:</strong></label>
                        <input type="text" class="form-control" id="myItemInput" name="name" placeholder="..." required="required">
                    <br>
                    <div class="form-group w-50">
                        <label for="exampleFormControlTextarea1" class="form-label"><strong>Description:</strong></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="..." required="required"></textarea>
                    </div><br>
                    <div class="form-group w-25">
                        <label for="example1"> <strong>Price:</strong> </label>
                        <input type="number" min="0" class="form-control" id="example1" name="price" placeholder="£" required="required">
                    </div> <br>
                    <div class="form-group w-25">
                        <label for="brands" class="col-4 col-form-label catlist"><strong>Brand:</strong></label>
                        <div class="col-8 catlist">
                            <select name="brandid" class="custom-select" required="required">
                                <option value="" selected disabled>Select Brand</option>
                                <?php
                                $brandsonly = array();

                                foreach ($allproducts as $row) {
                                    $brandid = $row['brand id'];
                                    $brandname = $row['brand'];
                                    $item = array('brand' => $brandname, 'brand id' => $brandid);

                                    array_push($brandsonly, $item);
                                }

                                sort($brandsonly);
                                $brandsonly = unique_multid_array($brandsonly, 'brand id');
                                foreach ($brandsonly as $row) {

                                    $brandids = $row['brand id'];

                                    $brandnames = $row['brand'];

                                    echo "<option value='$brandids'>$brandnames</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="form-group w-25">
                        <label for="category" class="col-4 col-form-label catlist"><strong>Category:</strong></label>
                        <div class="col-8 catlist">
                            <select name="subcatid" class="custom-select" required="required">
                                <option value="" selected disabled>Select Category</option>

                                <?php

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


                                ?>



                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="form-group w-25">
                        <label for="example1"><strong> Date Available:</strong></label>
                        <input type="date" name="dateavailable" class="form-control" id="dateavailable" placeholder="date" required="required">
                    </div> <br>
                    <div class="form-group w-50">
                        <label for="Img URL"> <strong> Image URL:</strong></label>
                        <input type="text" class="form-control" id="myItemInput" name="img" placeholder="..." required="required">
                    </div> <br>
                    <?php
                        $userkey = $_SESSION['key'];

                        echo "<input type='hidden' name='key' value= '$userkey' />  ";
                        ?>

                    <div>
                        <input type="submit" value="Add Item" type="button" class="btn btn-secondary">

                        
                        
                        <br>
                    </div>
        </div>
    </div>
    </fieldset>
    </form>
</div>
<?php
adminFooter();

?>