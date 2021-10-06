<?php
session_start();

include('conn.php');

include("includes/functions.php");

head();

navbar();


if (isset($_GET['itemid'])) {

    $productid = $_GET['itemid'];

    $endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?id=$productid";

    $dataset = file_get_contents($endpoint);

    $allproducts = json_decode($dataset, true);

?>

    <div class="container">
        <a href="javascript:history.back()"> <img class="backlogo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcpVKbStH4n3DWYQ5wIyYVjI17xzv3B1e2pyf6gmjvuuJenbAzveHCzu5ZpUiYJjXI7F0&usqp=CAU" alt=""></a>


        <?php

        foreach ($allproducts as $row) {


            $id = $row['id'];

            $name = $row['name'];

            $description = $row['description'];

            $brand = $row['brand'];

            $img = $row['Img URL'];

            $price = $row['price'];

            $price = number_format((float)$price, 2, '.', '');

            $category = $row['category'];

            $favs = $row['favs'];

            $subcat = $row['sub category'];


            echo "<div><h4 id = 'productName'>$name</h4></div>
                 <br>
                 <div><h4 id = 'productName'>by: <strong>$brand</strong></h4></div>";

            if (isset($_SESSION["user"])) {

                $alreadyfavd = FALSE;

                $email = $_SESSION["user"];
                $product = $productid;

                $custfavs = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allfav";
                $dataset3 = file_get_contents($custfavs);
                $allfavs = json_decode($dataset3, true);

                foreach ($allfavs as $row) {

                    $emailaddress = $row['email'];
                    $item = $row['product id'];
                    $custid = $row['customer'];

                    if ($email == $emailaddress && $item == $product) {
                        $alreadyfavd = TRUE;
                        echo " <div ><a class='favstar' href = 'favourites.php?id=$custid'><img class='favstar'
                            src='https://media.istockphoto.com/vectors/star-icon-favorite-sign-bookmark-button-flat-style-vector-id654224854?b=1&k=6&m=654224854&s=612x612&w=0&h=M3OZUB2n0JuiU6RIcnZjVF6HF2OPpq38OWXbycAGUl0='></a></div><br>";
                    }
                }

                if ($alreadyfavd == FALSE) {

                    $favcount = $favs + 1;

                    echo "
        
                         <form class = 'favadd' method='post' action='processfav.php'>";

                    $usersendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allaccounts";

                    $dataset2 = file_get_contents($usersendpoint);

                    $allaccounts = json_decode($dataset2, true);

                    foreach ($allaccounts as $row) {
                        $email = $row['email'];

                        if ($email == $_SESSION["user"]) {

                            $custid = $row['id'];

                            echo "<input type='hidden' name='customerid' value='$custid'/> ";
                        }
                    }

                    echo "<input type='hidden' name='productid' value='$product' /> 
                    <input type='hidden' name='favcount' value='$favcount'>
                           
                           <input type='submit' name='submit'   class='btn btn-outline-warning' value='Add to Favourites'/>                  
                           </form>  
                           <br>          
        
                        ";
                }
            }




            echo "   <div><img class='productImgs2'src='$img'></div>

                <div id = 'productPrice'><h4>£$price</h4></div>
                                 
                <div id='productBuy'>

                <form method='post' action='basket.php?action=add&id=$id?>'> 
                <div class = 'productq'> 
                
                <input type='number' name='quantity' min='1' class = 'center-block' value='1' class='form-control quantity' /> 
                </div>  
                <input type='hidden' name='name' value='$name' />  
                <input type='hidden' name='price' value='$price' /> 
                <input type='submit' name='basket' style='margin-top:5px;' class='btn btn-success' value='Add to Cart' />
                <input type='hidden' name='id' value = '$id'>
               
                </form> 

                </div> 
               ";

            echo "
            <br>
            <div><strong>Description</strong></div>

            <div> <p id='productDescription'>$description.<p></div>
            ";
        }

        ?>

    </div>
    </div>

    <br>

    <?php

    if (isset($_SESSION["user"])) {

        $useremail = $_SESSION["user"];

        echo "   

    <div class='container'>

        <div class='row'>

            
        <div class='col-12 col-md-6 reviewarea'>

       <form name='customerreviews' method='POST' action='reviews.php' enctype='multipart/form-data'>

                    <fieldset>

                        <div class='form-group w-100'>
            
                            <label for='exampleFormControlTextarea1' class='form-label'><strong>Leave a Review...</strong></label>

                            <textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='review' type='text' required='required' placeholder='...'></textarea>

                            <div class='form-group w-50'>

                                <label for='category'><strong>Rating</strong></label>

                                <div class='col-6'>

                                    <select name='rating' class='custom-select' required='required'>
                                    <option disabled selected value>select</option>
                                        <option value='1'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                        <option value='5'>5</option>
                                    </select>

                                </div>
                            </div>
                        </div>";

        $accountsendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allaccounts";

        $accountsdataset = file_get_contents($accountsendpoint);

        $allaccounts = json_decode($accountsdataset, true);

        foreach ($allaccounts as $row) {

            $email = $row['email'];

            if ($email == $useremail) {

                $accountid = $row['id'];
            }
        }



        echo "
                        <input type='hidden' name='accountid' value='$accountid' />

                        <input type='hidden' name='productid' value='$productid' />


                        <div>
                           
                            <button class='btn btn-outline-success reviewbutton' input type='submit'>Submit</button><br>
                            <br>

                        </div>
            </div>

            </fieldset>

            </form>
    
            ";
    } else {

        echo "<br> <div class = 'container'>   

                <div class='row'>
            
                <div class='col-12 col-md-6'>         
               <strong> Please login to leave a review...<br></strong>
                <div class='loginArea2'>

                <form id ='formlogin' method='post' action='processlogin.php'>         
                                                                             
            
                                <div class='mb-3 login'><br>    
                                
            
                                    <label for='exampleInputEmail1' class='form-label'>Email address</label>
                                    <input type='email' name='email' class='form-control' id='emailInput' aria-describedby='emailHelp'>
                                    <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
                                </div>
                          
            
                           
                                    <div class='mb-3 login'>
            
                                        <label for='exampleInputPassword1' class='form-label'>Password</label>
                                        <input type='password' name='pwd' class='form-control' id='passwordInput'>
            
                                    </div>
                                    <input type='submit' value='Log in' type='button' name='submit' class='btn btn-success'><br><br>  

                                    </div>   
                                                    
                                  
                    </form>
                </div>";
    };

    ?>

    <?php

    echo "
      <div class='col-12 col-md-6'>

                <h6><strong>Customer Reviews..</strong></h6>";

    $product = $_GET['itemid'];

    $reviewsendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allreviews";


    $reviewsdataset = file_get_contents($reviewsendpoint);

    $allreviews = json_decode($reviewsdataset, true);


    foreach ($allreviews as $row) {

        $productID = $row['productid'];

        if ($productID == $productid) {
            $name = $row['name'];
            $email = $row['email'];
            $review = $row['review'];
            $rating = $row['rating'];

            echo "
                          <div class = 'reviewArea'> ''$review'' / <strong> Rating: $rating/5</strong><br>Review by:<strong> $name</strong></div><br> 
                                             
                            ";
        }
    }

    echo "</div></div></div> <br><br>";

    ?>

    <div class="container">
        <hr>
        <h5 ><strong>You may be interested in..</strong></h5><br>


        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

        <div class="carousel">


            <?php
            $subcategoryendpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?subcat=$subcat";
            $subcatdataset = file_get_contents($subcategoryendpoint);
            $allsubcategoryproducts = json_decode($subcatdataset, true);

            foreach ($allsubcategoryproducts as $row) {

                $productid = $row['id'];
                $productimg = $row['Img URL'];
                $name = $row['name'];
                $name = substr($name, 0, 30);

            ?>

                <img class="carousel-image2" src="<?php echo $productimg ?>" ondblclick="location.href='product.php?itemid=<?php echo $productid ?>'" alt="<?php echo " $name.." ?>" />

            <?php
            }
            ?>
        </div>

        <p class="caption">&nbsp;</p>

    </div>

    </div>


    <script>
        var flkty = new Flickity('.carousel', {
            imagesLoaded: true,
            percentPosition: false,
            pageDots: false,
            autoPlay: true
        });

        var caption = document.querySelector('.caption');

        flkty.on('select', function() {
            // set image caption using img's alt
            caption.textContent = flkty.selectedElement.alt;
        });
    </script>

<?php

}

footer();



?>