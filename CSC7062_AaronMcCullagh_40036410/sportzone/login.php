<?php
session_start();
if(isset($_SESSION["user"])){
header('Location: myaccount.php');
}

include('includes/functions.php');

head();
navbar();


?>
  <div class='container-fluid'>

    <div class='loginArea'>

    <form id ='formlogin' method='post' action='processlogin.php'>

            
                 <div class='row'>

                <div class='col-12'>
               

                    <div class='mb-3 login'>

                    

                        <label for='exampleInputEmail1' class='form-label'>Email address</label>
                        <input type='email' name='email' class='form-control' id='emailInput' aria-describedby='emailHelp'>
                        <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div><br>
                  

                <div class='row'>
                    <div class='col-12'>
                        <div class='mb-3 login'>

                            <label for='exampleInputPassword1' class='form-label'>Password</label>
                            <input type='password' name='pwd' class='form-control' id='passwordInput'>

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









  

