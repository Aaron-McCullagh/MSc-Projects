<?php
session_start();

if(isset($_SESSION["user"])){

    include('includes/functions.php');
    head();
    navbar();

include('conn.php');

if(isset($_GET["id"])){    

$id = $_GET['id'];

if($_SESSION['id']==$id){


$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?userid=$id";

$dataset = file_get_contents($endpoint);

$useraccount = json_decode($dataset, true);


foreach($useraccount as $row){
    $id = $row['id'];
    $title = $row['title'];
    $name = $row['name'];
    $email = $row['email'];
    $address = $row['address'];
    $city = $row['city'];
    $phone = $row['phone'];

}

echo"

<div class='container-fluid'>

<div class='reg'>

    <form action='processeditacc.php' method='POST' class='form'>

        <div class='form-group col-sm-1'>
            <label for='title' Type'>Title</label>
            <select name='title' class='form-control'>
                <option value='$title'>$title</option>
                <option value='Mr'>Mr</option>
                <option value='Mrs'>Mrs</option>
                <option value='Miss'>Miss</option>
            </select>
        </div><br>


        <div class='col form-group col-lg-3'>
            <label>Name</label>
            <input type='text' name='name' value = '$name' class='form-control' placeholder='' required = 'required'>
        </div> <br>


        <div class='form-group col-lg-3'>
            <label>Address</label>
            <input type='address' class='form-control' name='address' value = '$address' placeholder='' required = 'required'>
        </div>
        <br>

        <div class='form-group col-md-2'>
            <label>City</label>
            <input type='city' class='form-control' name='city' value = '$city' required = 'required'>
        </div>
        <br>

        <div class='form-group col-md-2'>
            <label>Telephone</label>
            <input type='telephone' class='form-control' name='phone' value = '$phone' required = 'required'>
        </div>
        <br>
        

        <input type='hidden' name='id' value='$id' /> 

       
        <input type='submit' value='Confirm'  type='button' class='btn btn-success'>

    </form>
    </div>
</div>

<br>
";

?>

<?php
footer();
}
}
}

?>