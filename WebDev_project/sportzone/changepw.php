<?php
session_start();


if(isset($_SESSION["user"])){

$id = $_GET['id'];

if($_SESSION["id"]==$id){

  include('includes/functions.php');
  include('conn.php');


$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?userid=$id";

$dataset = file_get_contents($endpoint);

$useraccount = json_decode($dataset, true);

Head();
navbar();

 echo"
 <div class='container-fluid'>
 <div class='reg'>
    <form action='processpwchange.php' method='POST' class='form'>

 <div class='form-group col-md-2'>
 <label for='password' class='d-flex'>Password</label>
             <i class='fas fa-lock prefix grey-text d-flex'></i>
             <input type='password' id='current' name='current' class='form-control validate'>
</div><br>
 <div class='form-group col-md-2'>
 <label for='password' class='d-flex'>New password</label>
             <i class='fas fa-lock prefix grey-text d-flex'></i>
             <input type='password' id='password' name='password' class='form-control validate'>
             
           </div>
           <div class='form-group col-md-2'>
           <label for='password2' class='d-flex'>Confirm new password</label>
             <i class='fas fa-lock prefix grey-text d-flex'></i>
             <input type='password' id='password2' name='password2' class='form-control'>             
           </div>

           <br>
           <input type='submit' value='Confirm'  type='button' class='btn btn-success'>
           <input type='hidden' name='id' value='$id' /> 

</form>
</div>
</div>

";
?>

<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("password2");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<?php

footer2();
}
}
?>