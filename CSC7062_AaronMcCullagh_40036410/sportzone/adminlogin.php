<?php
session_start();
if(isset($_SESSION["admin"])){
header('Location: admin/index.php');
}

include('includes/functions.php');

head();
navbar();




?>
  <div class='container-fluid'>

    <?php if(isset($_Get['error'])){
        $error = $_Get['error'];
        if($error=="invalid"){
            echo"
        
            <h2 id='productName'>Invalid Login details entered!</h2> <br><br>
             
         
             </div> ";   
        }
       
};
        
     ?>

    <div class='loginArea'>

    <form id ='formlogin' method='post' action='admin/processadmin.php'>

            
                 <div class='row'>

                <div class='col-12'>   
                    
                <div class='mb-3 login'>                    

                        <label for='exampleInputEmail1' class='form-label'>Username</label>
                        <input type='name' name='username' class='form-control' >                        
                  
    <br>
                <div class='row'>
                    <div class='col-12'>
                        <div class='mb-3 login'>

                            <label for='exampleInputPassword1' class='form-label'>Password</label>
                            <input type='password' name='password' class='form-control' id='passwordInput'>
                            
                        </div>
                        <input type='submit' value='Log in' type='button' name='submit' class='btn btn-success'>

                        </div>                     
                      
        </form>
    </div>
</div>
</div>
</div>

</div> 

<?php

footer2();

?>
