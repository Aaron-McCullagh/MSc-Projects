<?php

include('includes/functions.php');
include('conn.php');
head();
navbar();

?>

<div class="container-fluid reg">


    <form action='processreg.php' method='POST' class="form">

        <div class="form-group col-sm-1">
            <label for="titleType">Title</label>
            <select name="title" class="form-control">
            <option selected disabled>Select</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs</option>
                <option value="Miss">Miss</option>
            </select>
        </div><br>


        <div class="col form-group col-lg-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="" required = "required">
        </div> <br>



        <div class="form-group col-lg-3">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" required = "required">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div> <br>



        <div class="form-group col-lg-3">
            <label>Address</label>
            <input type="address" class="form-control" name="address" placeholder="" required = "required">
        </div>
        <br>

        <div class="form-group col-md-2">
            <label>City</label>
            <input type="city" class="form-control" name="city" placeholder="" required = "required">
        </div>
        <br>

        <div class="form-group col-md-2">
            <label>Telephone</label>
            <input type="telephone" class="form-control" name="phone" placeholder="" required = "required">
        </div>
        <br>

        <div class="form-group col-md-2">
        <label for="password" class="d-flex">Enter password</label>
                    <i class="fas fa-lock prefix grey-text d-flex"></i>
                    <input type="password" id="password" name="password" class="form-control validate">
                    
                  </div>
                  <div class="form-group col-md-2">
                  <label for="password2" class="d-flex">Confirm password</label>
                    <i class="fas fa-lock prefix grey-text d-flex"></i>
                    <input type="password" id="password2" name="password2" class="form-control">
                    
                  </div>
        <br>
        <input type="submit" value="Register"  type="button" class="btn btn-success">

    </form>
</div>

<br>
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
footer();


?>