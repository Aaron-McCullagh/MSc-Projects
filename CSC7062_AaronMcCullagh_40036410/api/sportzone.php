<?php

include('conn.php');

/*Products*/

$sqlread = "SELECT ID, Name, Description, Brand_ID, BrandName, maincatid, CategoryName, 
Sub_CategoryID, subcatname, Price, Img_URL, Date_Available, Date_Added, Views, Favs
FROM SportZone
INNER JOIN Product_Brands
ON Product_Brands.BrandID= SportZone.Brand_ID
INNER JOIN Sub_Category
ON Sub_Category.subcatid = SportZone.Sub_CategoryID
INNER JOIN Product_Categories
ON Product_Categories.CategoryID = Sub_Category.maincatid";

$result = $conn->query($sqlread);

if (!$result) {
    echo $conn->error;
}

header('Content-Type: application/json');

if (isset($_GET['allproducts'])) {

    $products = array();

    while ($row = $result->fetch_assoc()) {
        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $brand = $row['BrandName'];
        $brandid = $row['Brand_ID'];
        $maincatid = $row['maincatid'];
        $maincatname = $row['CategoryName'];
        $subcatid = $row['Sub_CategoryID'];
        $subcatname = $row['subcatname'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $availabledate = $row['Date_Available'];
        $dateadded = $row['Date_Added'];
        $views = $row['Views'];
        $favs = $row['Favs'];

        $item = array(
            'id' => $id, 'name' => $name, 'description' => $description, 'brand' => $brand, 'brand id' => $brandid, 'category id' => $maincatid, 'category' => $maincatname,
            'sub category id' => $subcatid, 'sub category' => $subcatname, 'price' => $price, 'Img URL' => $img, 'date available' => $availabledate, 'date added' => $dateadded, 'views' => $views, 'favs' => $favs
        );
        array_push($products, $item);
    }
    echo json_encode($products);
}

if (isset($_GET['category'])) {

    $thiscategory = $_GET['category'];

    $products = array();

    while ($row = $result->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $brand = $row['BrandName'];
        $brandid = $row['Brand_ID'];
        $maincatid = $row['maincatid'];
        $maincatname = $row['CategoryName'];
        $subcatid = $row['Sub_CategoryID'];
        $subcatname = $row['subcatname'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $availabledate = $row['Date_Available'];
        $dateadded = $row['Date_Added'];
        $views = $row['Views'];
        $favs = $row['Favs'];

        if ($maincatname == $thiscategory) {

            $item = array(
                'id' => $id, 'name' => $name, 'description' => $description, 'brand' => $brand, 'brand id' => $brandid, 'category id' => $maincatid, 'category' => $maincatname,
                'sub category id' => $subcatid, 'sub category' => $subcatname, 'price' => $price, 'Img URL' => $img, 'date available' => $availabledate, 'date added' => $dateadded, 'views' => $views, 'favs' => $favs
            );
            array_push($products, $item);
        } else if ($thiscategory == 'allproducts') {

            $item = array(
                'id' => $id, 'name' => $name, 'description' => $description, 'brand' => $brand, 'brand id' => $brandid, 'category id' => $maincatid, 'category' => $maincatname,
                'sub category id' => $subcatid, 'sub category' => $subcatname, 'price' => $price, 'Img URL' => $img, 'date available' => $availabledate, 'date added' => $dateadded, 'views' => $views, 'favs' => $favs
            );
            array_push($products, $item);
        }
    }

    echo json_encode($products);
}

if (isset($_GET['subcat'])) {

    $thissubcat = $_GET['subcat'];

    $products = array();

    while ($row = $result->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $brand = $row['BrandName'];
        $brandid = $row['Brand_ID'];
        $maincatid = $row['maincatid'];
        $maincatname = $row['CategoryName'];
        $subcatid = $row['Sub_CategoryID'];
        $subcatname = $row['subcatname'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $availabledate = $row['Date_Available'];
        $dateadded = $row['Date_Added'];
        $views = $row['Views'];
        $favs = $row['Favs'];

        if ($subcatname == $thissubcat) {

            $item = array(
                'id' => $id, 'name' => $name, 'description' => $description, 'brand' => $brand, 'brand id' => $brandid, 'category id' => $maincatid, 'category' => $maincatname,
                'sub category id' => $subcatid, 'sub category' => $subcatname, 'price' => $price, 'Img URL' => $img, 'date available' => $availabledate, 'date added' => $dateadded, 'views' => $views, 'favs' => $favs
            );
            array_push($products, $item);
        }
    }

    echo json_encode($products);
}

if (isset($_GET['id'])) {

    $thisid = $_GET['id'];

    $products = array();

    while ($row = $result->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $brand = $row['BrandName'];
        $brandid = $row['Brand_ID'];
        $maincatid = $row['maincatid'];
        $maincatname = $row['CategoryName'];
        $subcatid = $row['Sub_CategoryID'];
        $subcatname = $row['subcatname'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $availabledate = $row['Date_Available'];
        $dateadded = $row['Date_Added'];
        $views = $row['Views'];
        $favs = $row['Favs'];

        if ($id == $thisid) {

            $item = array(
                'id' => $id, 'name' => $name, 'description' => $description, 'brand' => $brand, 'brand id' => $brandid, 'category id' => $maincatid, 'category' => $maincatname,
                'sub category id' => $subcatid, 'sub category' => $subcatname, 'price' => $price, 'Img URL' => $img, 'date available' => $availabledate, 'date added' => $dateadded, 'views' => $views, 'favs' => $favs
            );
            array_push($products, $item);
        }
    }

    echo json_encode($products);
}

if (isset($_GET['action'])) {


    $action = $_GET['action'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {


        $id = $conn->real_escape_string(trim($_POST['id']));
        $categoryid = $conn->real_escape_string(trim($_POST['categoryid']));
        $name = $conn->real_escape_string(trim($_POST['name']));
        $description = $conn->real_escape_string(trim($_POST['description']));
        $price = $conn->real_escape_string(trim($_POST['price']));
        $img = $conn->real_escape_string(trim($_POST['img']));
        $dateavailable = $conn->real_escape_string(trim($_POST['dateavailable']));
        $dateadded = $conn->real_escape_string(trim($_POST['dateadded']));
        $brandid = $conn->real_escape_string(trim($_POST['brandid']));
        $subcatid = $conn->real_escape_string(trim($_POST['subcatid']));
        $views = $conn->real_escape_string(trim($_POST['views']));
        $favs = $conn->real_escape_string(trim($_POST['favs']));

        if ($action == "add") {

            $insertsql = "INSERT INTO SportZone (Name, Description, Brand_ID, Price, Sub_CategoryID, Img_URL, Date_Available, Date_Added, Views, Favs)
                VALUES ('$name', '$description', '$brandid', '$price', '$subcatid', '$img', '$dateavailable', '$dateadded', '$views', '$favs')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($action == "update") {

            $updatesql = "UPDATE SportZone SET Name='$name', Description='$description', Brand_ID= '$brandid',
             Sub_CategoryID = '$subcatid', Price= '$price', Img_URL= '$img' WHERE SportZone.ID='$id' ";

            $result = $conn->query($updatesql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($action == "delete") {

            $sqldelete = "DELETE FROM SportZone WHERE ID = '$id'";

            $result = $conn->query($sqldelete);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($action == "updateviews") {

            $updateviewssql = "UPDATE SportZone SET Views='$views' WHERE SportZone.ID='$id' ";

            $result = $conn->query($updateviewssql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*Most viewed*/

if (isset($_GET['mostviewed'])) {

    $subcat = $_GET['mostviewed'];

    $viewsqlread = "SELECT * FROM `SportZone` WHERE Sub_CategoryID = '$subcat' ORDER BY `Views` DESC

    LIMIT 10";

    $viewsresult = $conn->query($viewsqlread);

    if (!$viewsresult) {
        echo $conn->error;
    }

    $products = array();

    while ($row = $viewsresult->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $views = $row['Views'];

        $item = array('id' => $id, 'name' => $name, 'description' => $description, 'price' => $price, 'Img URL' => $img, 'views' => $views);
        array_push($products, $item);
    }

    echo json_encode($products);
}

if (isset($_GET['mostviewedbycatg'])) {

    $maincatg = $_GET['mostviewedbycatg'];

    $viewsqlread = "SELECT `ID`, `Name`, `Description`, `Brand_ID`, `Price`, `Img_URL`, `Views`, CategoryName, BrandName FROM `SportZone` 
    INNER JOIN Sub_Category
    ON Sub_Category.subcatid = SportZone.Sub_CategoryID
    INNER JOIN Product_Categories
    ON Product_Categories.CategoryID = Sub_Category.maincatid
    INNER JOIN Product_Brands
    ON Product_Brands.BrandID = SportZone.Brand_ID
    WHERE CategoryName = '$maincatg' ORDER BY `Views` DESC
    LIMIT 10 ";

    $viewsresult = $conn->query($viewsqlread);

    if (!$viewsresult) {
        echo $conn->error;
    }

    $products = array();

    while ($row = $viewsresult->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $views = $row['Views'];
        $brand = $row['BrandName'];

        $item = array('id' => $id, 'name' => $name, 'description' => $description, 'price' => $price, 'Img URL' => $img, 'views' => $views, 'brand' => $brand);
        array_push($products, $item);
    }

    echo json_encode($products);
}


/*Trending top 10 - items with most favourites*/

$mostfavsqlread = "SELECT * FROM `SportZone` ORDER BY `Favs` DESC
LIMIT 20";

$mostfavresult = $conn->query($mostfavsqlread);

if (!$mostfavresult) {
    echo $conn->error;
}
if (isset($_GET['trending'])) {

    $products = array();

    while ($row = $mostfavresult->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $favs = $row['Favs'];

        $item = array('id' => $id, 'name' => $name, 'description' => $description, 'price' => $price, 'Img URL' => $img, 'favs' => $favs);
        array_push($products, $item);
    }

    echo json_encode($products);
}

if (isset($_GET['trendingbycatg'])) {


    $catg = $_GET['trendingbycatg'];

    if ($catg == "allproducts") {

        $viewsqlread = "SELECT ID, Name, Description, Brand_ID, Price, Img_URL, Views, Favs, CategoryName, BrandName FROM `SportZone` 
        INNER JOIN Sub_Category
        ON Sub_Category.subcatid = SportZone.Sub_CategoryID
        INNER JOIN Product_Categories
        ON Product_Categories.CategoryID = Sub_Category.maincatid
        INNER JOIN Product_Brands
        ON Product_Brands.BrandID = SportZone.Brand_ID
        ORDER BY `Favs` DESC
        LIMIT 20 ";
    } else {

    $viewsqlread = "SELECT ID, Name, Description, Brand_ID, Price, Img_URL, Views, Favs, CategoryName, BrandName FROM `SportZone` 
    INNER JOIN Sub_Category
    ON Sub_Category.subcatid = SportZone.Sub_CategoryID
    INNER JOIN Product_Categories
    ON Product_Categories.CategoryID = Sub_Category.maincatid
    INNER JOIN Product_Brands
    ON Product_Brands.BrandID = SportZone.Brand_ID
    WHERE CategoryName = '$catg' ORDER BY `Favs` DESC
    LIMIT 20 ";
    }

    $viewsresult = $conn->query($viewsqlread);

    if (!$viewsresult) {
        echo $conn->error;
    }

    $products = array();

    while ($row = $viewsresult->fetch_assoc()) {

        $id = $row['ID'];
        $name = $row['Name'];
        $description = $row['Description'];
        $price = $row['Price'];
        $img = $row['Img_URL'];
        $views = $row['Views'];
        $brand = $row['BrandName'];
        $favs = $row['Favs'];

        $item = array('id' => $id, 'name' => $name, 'description' => $description, 'price' => $price, 'Img URL' => $img, 'views' => $views, 'brand' => $brand, 'favs' => $favs);
        array_push($products, $item);
    }

    echo json_encode($products);
}


/*Categories*/

$catsqlread = "SELECT * FROM Product_Categories";
$catresult = $conn->query($catsqlread);

if (!$catresult) {
    echo $conn->error;
}

if (isset($_GET['allcategories'])) {

    $categories = array();

    while ($row = $catresult->fetch_assoc()) {

        $catid = $row['CategoryID'];
        $category = $row['CategoryName'];

        $category = array('id' => $catid, 'name' => $category);
        array_push($categories, $category);
    }

    echo json_encode($categories);
}


if (isset($_GET['categoryaction'])) {

    $cataction = $_GET['categoryaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $catid = $conn->real_escape_string(trim($_POST['catid']));
        $category = $conn->real_escape_string(trim($_POST['category']));


        if ($cataction == "add") {

            $insertsql = "INSERT INTO Product_Categories (CategoryName)
            VALUES ('$category')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($cataction == "delete") {

            $sqldelete = "DELETE FROM Product_Categories WHERE CategoryID = '$catid'";

            $result = $conn->query($sqldelete);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($cataction == "edit") {
            $updatesql = "UPDATE Product_Categories SET CategoryName='$category' WHERE CategoryID='$catid' ";

            $result = $conn->query($updatesql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*Sub Categories*/

$subcatsqlread = "SELECT * FROM Sub_Category";
$subcatresult = $conn->query($subcatsqlread);

if (!$subcatresult) {
    echo $conn->error;
}

if (isset($_GET['allsubcategories'])) {

    $subcategories = array();

    while ($row = $subcatresult->fetch_assoc()) {

        $subcatid = $row['subcatid'];
        $subcatname = $row['subcatname'];
        $maincatid = $row['maincatid'];

        $subcategory = array('id' => $subcatid, 'name' => $subcatname, 'maincatid' => $maincatid);
        array_push($subcategories, $subcategory);
    }

    echo json_encode($subcategories);
}

if (isset($_GET['subcataction'])) {

    $subcataction = $_GET['subcataction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $subcat = $conn->real_escape_string(trim($_POST['subcat']));
        $maincatid = $conn->real_escape_string(trim($_POST['maincatid']));

        if ($subcataction == "add") {

            $insertsql = "INSERT INTO Sub_Category (subcatname, maincatid)
            VALUES ('$subcat', '$maincatid')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*select categories with sub categories*/

$catsubcatsqlread = "SELECT `CategoryID`, `CategoryName`, subcatid, subcatname FROM `Product_Categories`
INNER JOIN Sub_Category
ON Sub_Category.maincatid = Product_Categories.CategoryID";
$catsubcatresult = $conn->query($catsubcatsqlread);

if (!$catsubcatresult) {
    echo $conn->error;
}

if (isset($_GET['allcategoryinfo'])) {

    $catsubcats = array();

    while ($row = $catsubcatresult->fetch_assoc()) {

        $subcatid = $row['subcatid'];
        $subcatname = $row['subcatname'];
        $maincatid = $row['CategoryID'];
        $maincatname = $row['CategoryName'];

        $catsubcategory = array('cat id' => $maincatid, 'cat name' => $maincatname, 'sub cat id' => $subcatid, 'sub cat name' => $subcatname);
        array_push($catsubcats, $catsubcategory);
    }

    echo json_encode($catsubcats);
}


/*Product Brands*/

$brandsqlread = "SELECT * FROM Product_Brands ORDER BY `BrandName` ASC";

$brandresult = $conn->query($brandsqlread);

if (!$brandresult) {
    echo $conn->error;
}

if (isset($_GET['allbrands'])) {
    $brands = array();

    while ($row = $brandresult->fetch_assoc()) {
        $id = $row['BrandID'];
        $name = $row['BrandName'];

        $brand = array('id' => $id, 'name' => $name);
        array_push($brands, $brand);
    }

    echo json_encode($brands);
}



if (isset($_GET['brandname'])) {

    $thisname = $_GET['brandname'];

    $brand = array();


    while ($row = $brandresult->fetch_assoc()) {
        $id = $row['BrandID'];
        $name = $row['BrandName'];

        if (strcasecmp($thisname, $name) == 0) {

            $thisbrand = array('id' => $id, 'name' => $name);
            array_push($brand, $thisbrand);
        }
    }
    echo json_encode($brand);
}

if (isset($_GET['brandaction'])) {

    $brandaction = $_GET['brandaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $brand = $conn->real_escape_string(trim($_POST['brand']));

        if ($brandaction == "add") {

            $insertsql = "INSERT INTO Product_Brands (BrandName)
            VALUES ('$brand')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}



/*User Accounts */

$usersqlread = "SELECT * FROM `UserAccounts`";

$userresult = $conn->query($usersqlread);

if (!$userresult) {
    echo $conn->error;
}

if (isset($_GET['allaccounts'])) {

    $accounts = array();

    while ($row = $userresult->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['Title'];
        $name = $row['UserName'];
        $email = $row['Email'];

        $password = $row['Password'];
        $address = $row['Address'];
        $city = $row['City'];
        $phone = $row['Telephone'];

        $account = array('id' => $id, 'title' => $title, 'name' => $name, 'email' => $email, 'password' => $password, 'address' => $address, 'city' => $city, 'phone' => $phone);
        array_push($accounts, $account);
    }

    echo json_encode($accounts);
}


if (isset($_GET['userid'])) {

    $thisid = $_GET['userid'];

    $accounts = array();

    while ($row = $userresult->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['Title'];
        $name = $row['UserName'];
        $email = $row['Email'];
        $password = $row['Password'];
        $address = $row['Address'];
        $city = $row['City'];
        $phone = $row['Telephone'];

        if ($thisid == $id) {

            $account = array('id' => $id, 'title' => $title, 'name' => $name, 'email' => $email, 'password' => $password, 'address' => $address, 'city' => $city, 'phone' => $phone);
            array_push($accounts, $account);
        }
    }

    echo json_encode($accounts);
}

if (isset($_GET['allidpw'])) {

    $accounts = array();

    while ($row = $userresult->fetch_assoc()) {

        $id = $row['id'];
        $password = $row['Password'];

        $account = array('id' => $id, 'password' => $password);
        array_push($accounts, $account);
    }
    echo json_encode($accounts);
}

if (isset($_GET['idpw'])) {

    $thisid = $_GET['idpw'];

    $accounts = array();

    while ($row = $userresult->fetch_assoc()) {

        $id = $row['id'];
        $password = $row['Password'];

        if ($thisid == $id) {

            $account = array('id' => $id, 'password' => $password);
            array_push($accounts, $account);
        }
    }
    echo json_encode($accounts);
}


if (isset($_GET['accountaction'])) {

    $accountaction = $_GET['accountaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $conn->real_escape_string(trim($_POST['id']));
        $title = $conn->real_escape_string(trim($_POST['title']));
        $name = $conn->real_escape_string(trim($_POST['name']));
        $email = $conn->real_escape_string(trim($_POST['email']));
        $password = $conn->real_escape_string(trim($_POST['password']));
        $password = password_hash("$password", PASSWORD_DEFAULT);
        $address = $conn->real_escape_string(trim($_POST['address']));
        $city = $conn->real_escape_string(trim($_POST['city']));
        $phone = $conn->real_escape_string(trim($_POST['phone']));

        if ($accountaction == "add") {

            $insertsql = " INSERT INTO UserAccounts (Title, UserName, Email, Password, Address, City, Telephone)
            VALUES('$title', '$name', '$email', '$password', '$address', '$city', '$phone')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($accountaction == "edit") {

            $updatesql = "UPDATE UserAccounts SET Title='$title', UserName='$name',
            Address = '$address', City= '$city', Telephone= '$phone' WHERE id='$id' ";

            $result = $conn->query($updatesql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($accountaction == "editpw") {

            $updatesql = "UPDATE UserAccounts SET Password='$password' WHERE id='$id' ";

            $result = $conn->query($updatesql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*Favourites*/

$favsqlread = " SELECT favid, customerid, Email,  productid, Name, Img_URL, BrandName, CategoryName FROM `SportZone` 
INNER JOIN Favourites
ON Favourites.productid = SportZone.ID
INNER JOIN Sub_Category
ON Sub_Category.subcatid = SportZone.Sub_CategoryID
INNER JOIN Product_Categories
ON Product_Categories.CategoryID = Sub_Category.maincatid
INNER JOIN Product_Brands
ON Product_Brands.BrandID = SportZone.Brand_ID
INNER JOIN UserAccounts
ON UserAccounts.id = Favourites.customerid ";

$favresult = $conn->query($favsqlread);

if (!$favresult) {
    echo $conn->error;
}

$favtablesqlread = "SELECT * FROM Favourites ";
$favtableresult = $conn->query($favtablesqlread);


if (!$favtableresult) {
    echo $conn->error;
}

if (isset($_GET['allfav'])) {

    $favs = array();

    while ($row = $favresult->fetch_assoc()) {
        $favid = $row['favid'];
        $custid = $row['customerid'];
        $email = $row['Email'];
        $productid = $row['productid'];
        $productname = $row['Name'];
        $productimg = $row['Img_URL'];
        $brand = $row['BrandName'];
        $category = $row['CategoryName'];

        $fav = array('fav id' => $favid, 'customer' => $custid, 'email' => $email, 'product id' => $productid, 'product' => $productname, 'brand' => $brand, 'img' => $productimg, 'category' => $category);

        array_push($favs, $fav);
    }

    echo json_encode($favs);
}



if (isset($_GET['custidfav'])) {

    $thisid = $_GET['custidfav'];

    $favs = array();

    while ($row = $favresult->fetch_assoc()) {
        $favid = $row['favid'];
        $custid = $row['customerid'];
        $email = $row['Email'];
        $productid = $row['productid'];
        $productname = $row['Name'];
        $productimg = $row['Img_URL'];
        $brand = $row['BrandName'];
        $category = $row['CategoryName'];


        if ($thisid == $custid) {

            $fav = array('fav id' => $favid, 'customer' => $custid, 'email' => $email, 'product id' => $productid, 'product' => $productname, 'img' => $productimg, 'brand' => $brand, 'category' => $category);

            array_push($favs, $fav);
        }
    }

    echo json_encode($favs);
}

if (isset($_GET['allfavtable'])) {

    $favs = array();

    while ($row = $favtableresult->fetch_assoc()) {

        $favid = $row['favid'];
        $custid = $row['customerid'];
        $productid = $row['productid'];

        $fav = array('fav id' => $favid, 'customer' => $custid, 'product id' => $productid);

        array_push($favs, $fav);
    }

    echo json_encode($favs);
}

if (isset($_GET['favaction'])) {

    $favaction = $_GET['favaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $customer = $conn->real_escape_string(trim($_POST['customerid']));
        $product = $conn->real_escape_string(trim($_POST['productid']));
        $favid = $conn->real_escape_string(trim($_POST['favid']));
        $favcount = $conn->real_escape_string(trim($_POST['favcount']));

        if ($favaction == "add") {

            $insertsql = "INSERT INTO Favourites (customerid, productid)
            VALUES ('$customer', '$product') ";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }

            $insertsql2 = "UPDATE SportZone SET Favs = '$favcount' WHERE SportZone.ID = '$product' ";

            $result2 = $conn->query($insertsql2);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        } else if ($favaction == "remove") {

            $removesql = "DELETE FROM Favourites WHERE favid = '$favid'";


            $result = $conn->query($removesql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*Reviews*/

$reviewsqlread = "SELECT UserName, Email, ProductID, Review, Rating
FROM Product_Reviews INNER JOIN UserAccounts
ON UserAccounts.id = Product_Reviews.UserAccount";

$reviewresult = $conn->query($reviewsqlread);

if (!$reviewresult) {
    echo $conn->error;
}

if (isset($_GET['allreviews'])) {

    $reviews = array();

    while ($row = $reviewresult->fetch_assoc()) {

        $name = $row['UserName'];
        $email = $row['Email'];

        $productid = $row['ProductID'];
        $review = $row['Review'];
        $rating = $row['Rating'];


        $review = array('name' => $name, 'email' => $email, 'productid' => $productid, 'review' => $review, 'rating' => $rating);
        array_push($reviews, $review);
    }

    echo json_encode($reviews);
}


if (isset($_GET['reviewaction'])) {

    $reviewaction = $_GET['reviewaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $useraccount = $conn->real_escape_string(trim($_POST['accountid']));
        $productid = $conn->real_escape_string(trim($_POST['productid']));
        $review = $conn->real_escape_string(trim($_POST['review']));
        $rating = $conn->real_escape_string(trim($_POST['rating']));

        if ($reviewaction == "add") {
            $insertsql = " INSERT INTO Product_Reviews (UserAccount, ProductID, Review, Rating)
        VALUES('$useraccount', '$productid', '$review', '$rating')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*User Accounts for Admin*/

$adminsqlread = "SELECT * FROM Admin";

$adminresult = $conn->query($adminsqlread);

if (!$adminresult) {
    echo $conn->error;
}

if (isset($_GET['alladminaccounts'])) {

    $accounts = array();

    while ($row = $adminresult->fetch_assoc()) {

        $name = $row['username'];
        $password = $row['password'];


        $account = array('username' => $name, 'password' => $password);

        array_push($accounts, $account);
    }

    echo json_encode($accounts);
}

if (isset($_GET['adminaccountaction'])) {

    $adminaccountaction = $_GET['adminaccountaction'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $username = $conn->real_escape_string(trim($_POST['username']));
        $password = $conn->real_escape_string(trim($_POST['password']));
        $password = password_hash("$password", PASSWORD_DEFAULT);

        if ($adminaccountaction == "add") {
            $insertsql = " INSERT INTO Admin (username, password)
            VALUES('$username', '$password')";

            $result = $conn->query($insertsql);

            if (!$result) {
                echo $conn->error;
            } else {
                echo " ";
            }
        }
    }
}


/*enquiries*/

if (isset($_GET['submitenquiry'])) {

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $enquiry = $conn->real_escape_string(trim($_POST['enquiry']));
        $name = $conn->real_escape_string(trim($_POST['name']));
        $email = $conn->real_escape_string(trim($_POST['email']));


        $insertsql = " INSERT INTO Enquiries (enquiry, name, email)
            VALUES('$enquiry', '$name', '$email')";

        $result = $conn->query($insertsql);

        if (!$result) {
            echo $conn->error;
        } else {
            echo " ";
        }
    }
}





