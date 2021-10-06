<?php

function head()
{
    echo "
<!doctype html>
<html lang='en'>
    <head>
    <link rel='icon' href='https://seeklogo.com/images/S/sport-zone-logo-3A8514E384-seeklogo.com.png'>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <!-- Bootstrap CSS -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>

    <link rel='stylesheet' href='https://unpkg.com/flickity@2/dist/flickity.min.css'>    
    <link rel='stylesheet' href='carousel.css'>
    <link rel='stylesheet' href='ui.css'>
    <title>Sport Zone</title>
</head>
<body>
";
}
function navbar()
{

    echo " 
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='container-fluid'>
            <a class='navbar-brand'><img
                    src='https://seeklogo.com/images/S/sport-zone-logo-3A8514E384-seeklogo.com.png '></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
                    </li>

                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                            data-bs-toggle='dropdown' aria-expanded='false'>
                            Shop
                        </a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>                           
                            <li><a class='dropdown-item' href='category.php?category=Basketball'>Basketball</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Camping'>Camping</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Bikes'>Cycling</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Exercise'>Exercise & Fitness</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Soccer'>Football</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Golf'>Golf</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Gym'>Gym Equipment</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Tennis'>Tennis</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Water'>Water Sports</a></li>
                            <hr class='dropdown-divider'>
                            <li><a class='dropdown-item' href='category.php?category=allproducts'>Shop All</a></li>                            
                    </li>
                </ul>
                </li>
                <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                        data-bs-toggle='dropdown' aria-expanded='false'>
                        Account
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    ";
    if (isset($_SESSION["user"])) {
        $id = $_SESSION['id'];
        echo "<li><a class='dropdown-item' href='myaccount.php'>My Account</a></li>
                        <li><a class='dropdown-item' href='favourites.php?id=$id'>Favourites</a></li>
                        <li><a class='dropdown-item' href='editaccount.php?id=$id'>Update</a></li>
                        <hr class='dropdown-divider'>
                        <li><a class='dropdown-item' href='logout.php'>Log out</a></li> ";
    } else {
        echo " <li><a class='dropdown-item' href='login.php'>Login</a></li>
                        <li><a class='dropdown-item' href='register.php'>Register</a></li> ";
    }
    echo "   
                        
                    </ul>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' href='contact.php' tabindex='-1'>Contact</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='adminlogin.php' tabindex='-1'>Admin</a>
                </li>
                </ul>
                <form class='d-flex' name='searchbox' method='POST' action='search.php'>
                    <input class='form-control me-2' type='text' placeholder='Search' name='search' aria-label='Search'>
                    <button class='btn btn-outline-success searchbtn' type='submit' name='submit'>Search</button>
                </form>
                <div class = 'basket'><a href='basket.php'> <img class='basket'
                        src='https://images.all-free-download.com/images/graphiclarge/green_shopping_cart_icon_vector_280755.jpg'
                        width='50px'></a></div>
            </div>
        </div>
    </nav>
    <br>
   
";
}

function footer()
{
    echo "
    <br>
    <div class='container-fluid foot'>
        <!-- create row inside container / row is wrapper for column-->
        <div class='row'>

            <!-- now create 3 columns with small breakpoint -->
            <div class='col-sm-4 f1 '>
                Shopping at Sport Zone <br><br>                
                <a class='link' href='info.php?info=delivery'>Delivery</a><br>
                <a class='link' href='info.php?info=returns'>Returns Policy</a><br>
                <a class='link' href='info.php?info=track'>Track Order</a>
            </div>

            <div class='col-sm-4 f1'>Help <br><br>
                <a class='link' href='info.php?info=faq'>Frequently Asked Questions</a><br>
                <a class='link' href='contact.php'>Contact Us</a>
            </div>

            <div class='col-sm-4 f1'>Privacy & Legal <br><br>
                <a class='link' href='info.php?info=cookies'>Cookies & Privacy Policy</a><br>
                <a class='link' href='info.php?info=terms'>Terms & Conditions</a>
           </div>
         </div>
    </div>
</div>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
    integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0'
    crossorigin='anonymous'></script>
<script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>
<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
    integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
    crossorigin='anonymous'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
    integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
    crossorigin='anonymous'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
    integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'
    crossorigin='anonymous'></script>

</body>

</html>
";
}

function adminHead()
{

    echo "
    <!doctype html>
    <html lang='en'>
    
    <head>
      <link rel='icon' href='https://seeklogo.com/images/S/sport-zone-logo-3A8514E384-seeklogo.com.png'>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1'>
    
      <!-- Bootstrap CSS -->
      <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl' crossorigin='anonymous'>
      <link rel='stylesheet' href=https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css>

      <link rel='stylesheet' href='https://unpkg.com/flickity@2/dist/flickity.min.css'>
      <link rel='stylesheet' href='../carousel.css'>
    <link rel='stylesheet' href='../ui.css'>
    
      <title>Sport Zone</title>
    
    </head>
    
    <body>
";
}

function adminNav()
{

    echo " 
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <div class='container-fluid'>
            <a class='navbar-brand'><img
                    src='https://seeklogo.com/images/S/sport-zone-logo-3A8514E384-seeklogo.com.png '></a>
            <button class='navbar-toggler' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false'
                aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='index.php'>Admin</a>
                    </li>

                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                            data-bs-toggle='dropdown' aria-expanded='false'>
                            Update / Delete
                        </a>  
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>                                      
                            <li><a class='dropdown-item' href='category.php?category=Basketball'>Basketball</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Camping'>Camping</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Bikes'>Cycling</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Exercise'>Exercise & Fitness</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Soccer'>Football</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Golf'>Golf</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Gym'>Gym Equipment</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Tennis'>Tennis</a></li>
                            <li><a class='dropdown-item' href='category.php?category=Water'>Water Sports</a></li>
                            <hr class='dropdown-divider'>
                            <li><a class='dropdown-item' href='category.php?category=allproducts'>All</a></li>

                    </li>

                </ul>
                </li>
                <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                    data-bs-toggle='dropdown' aria-expanded='false'>
                    Add
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
               
                    <li><a class='dropdown-item' href='addproduct.php'>Product</a></li>
                    <li><a class='dropdown-item' href='generaladmin.php?action=add'>Category</a></li>
                    <li><a class='dropdown-item' href='generaladmin.php?action=addsubcat'>Sub Category</a></li> 
                    <li><a class='dropdown-item' href='generaladmin.php?action=addbrand'>Brand</a></li> 
                    <li><a class='dropdown-item' href='generaladmin.php?action=regadmin'>New Admin </a></li>                             

            </li>

        </ul>
        </li>
        <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='logout.php'>Leave</a>
    </li>    
                
                </ul>
                <form class='d-flex' name='searchbox' method='POST' action='search.php'>
                    <input class='form-control me-2' type='text' placeholder='Search' name='search' aria-label='Search'>
                    <button class='btn btn-outline-secondary searchbtn' type='submit' name='submit'>Search</button>
                </form>
               
            </div>
        </div>
    </nav>
    <br>
   
";
}

function adminFooter()
{

    echo "
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js' integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0' crossorigin='anonymous'></script>
    <script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
    
</body>

</html>
";
}



function footer2()
{

    echo " 
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js'
    integrity='sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0'
    crossorigin='anonymous'></script>

  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
    integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo'
    crossorigin='anonymous'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'
    integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
    crossorigin='anonymous'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'
    integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM'
    crossorigin='anonymous'></script>
</body>

</html>
";
}

//https://www.php.net/manual/en/function.array-unique.php

function unique_multid_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
