<?php
session_start();

if (!isset($_SESSION["admin"])) {

    header("Location: ../adminlogin.php");
}

include("../includes/functions.php");
include("../conn.php");

$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allproducts";

$dataset = file_get_contents($endpoint);

$allproducts = json_decode($dataset, true);

adminHead();
adminNav();
$boolean = FALSE;

?>
<br>

<div class='container'>
    <div class='row'>
        <br>

        <?php

        $str = $conn->real_escape_string(trim($_POST['search']));

        foreach ($allproducts as $row) {

            $category = $row['category'];

            $id = $row['id'];

            $fullname = $row['name'];

            $description = $row['description'];

            $brand = $row['brand'];

            $img = $row['Img URL'];

            $price = $row['price'];

            $price = number_format((float)$price, 2, '.', '');


            $name = substr($fullname, 0, 50);


            if (stripos($fullname, $str) !== false) {

                $boolean = TRUE;

                if ($boolean == TRUE) {

                    echo "

                <div class='col-6 col-md-4 '>
 
                <div><img class='productImgs'
                src='$img'></div> 
                <div> $name... <br><strong> £$price </strong><br>
                <a href = 'editproduct.php?itemid=$id'><button type='button' class='btn btn-outline-secondary'>Edit</button> </a>
                <a href = 'deleteproduct.php?itemid=$id'><button type='button' class='btn btn-outline-danger'>Delete</button> </a></div>
                <br><br><br>
                </div>
                   ";
                }
            }
        }

        if ($boolean == FALSE) {
            echo "<strong>no results found!</strong>";
        }

        ?>


    </div>
</div>

<?php
adminfooter();

?>