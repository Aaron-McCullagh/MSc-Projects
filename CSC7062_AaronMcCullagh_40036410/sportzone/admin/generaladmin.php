<?php
session_start();

/*if(!isset($_SESSION["admin"])){

    header("Location: ../adminlogin.php");
}*/

include("../includes/functions.php");
adminHead();
adminNav();

$action = $_GET['action'];

if($action=="add"){

  echo "  <div class = 'container'>
           <br>
           <h2>Add Category</h2>
           <br>
           <form method='POST' action='processaddcat.php'> 
           <div class='form-group w-50'>
            <label for='category'><strong>Category Name</strong></label>
            <input type='text' class='form-control' name ='category' required = 'required'><br>
            <input class='btn btn-success' type='submit' value='Add'>
</div>      
</form> 
</div>   
  
  " ;

} else if ($action=="addsubcat"){

  echo "  <div class = 'container'>
           <br>
           <h2>Add Sub Category</h2>
           <br>
           <form method='POST' action='processaddsubcat.php'>";

           $endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allcategories";
           $dataset = file_get_contents($endpoint);
           $allcategories = json_decode($dataset, true);

        echo "  <div class='col-8 brandorcatlist' >
           <select name='maincatid' id_data class='custom-select brandorcatselect' >
           <option value='' selected disabled>Select Category</option>";
           foreach($allcategories as $row){

               $catid = $row['id'];
               $category = $row['name'];
               echo "<option value='$catid'>$category</option>";

           }

         echo "  </select>
           </div>           
           <br>
           <div class='form-group w-50'>
           <label for='category'><strong>Sub Category Name</strong></label>
           <input type='text' class='form-control' name ='subcat' required = 'required'><br>
           <input class='btn btn-success' type='submit' value='Add'>
           </div>      
</form> 
</div> 
           ";

}


else if ($action =="addbrand"){

    
  echo "  <div class = 'container'>
           <br>
           <h2>Add Brand</h2>
           <br>
           <form method='POST' action='processaddbrand.php'> 
           <div class='form-group w-50'>
            <label for='category'><strong>Brand Name</strong></label>
            <input type='text' class='form-control' name ='brand' required = 'required'><br>
            <input class='btn btn-success' type='submit' value='Add'>
</div>      
</form> 
</div>   
  
  " ;
}

else if ($action =="regadmin"){

  echo "  <div class = 'container'>
           <br>
           <h2>Add User</h2>
           <br>
           <form method='POST' action='processnewadmin.php'> 
           <div class='form-group w-50'>
            <label for='category'><strong>Username</strong></label>
            <input type='text' class='form-control' name ='username' required = 'required'><br>
            </div>
            <div class='form-group w-50'>
            <label for='password' class='d-flex'>Enter password</label>
                        <i class='fas fa-lock prefix grey-text d-flex'></i>
                        <input type='password' id='password' name='password' class='form-control validate'>
                        
                      </div>
                      <div class='form-group w-50'>
                      <label for='password2' class='d-flex'>Confirm password</label>
                        <i class='fas fa-lock prefix grey-text d-flex'></i>
                        <input type='password' id='password2' name='password2' class='form-control'>
                        
                      </div>
            <br>
            
            <input class='btn btn-success' type='submit' value='Add'>
            
</div>      
</form> 
</div>   
  
  ";
  
}
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

adminFooter();

?>
