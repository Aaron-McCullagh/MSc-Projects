<?php

session_start();

include('includes/functions.php');

if(isset($_POST['email'])){

    $emailentered = ($_POST['email']);

    if(isset($_POST['pwd'])){

        $passwordentered = ($_POST['pwd']);
        
$endpoint = "http://amccullagh06.lampt.eeecs.qub.ac.uk/api/sportzone.php?allaccounts";

$dataset = file_get_contents($endpoint);

$allaccounts = json_decode($dataset, true);

foreach ($allaccounts as $row) {
    $id = $row['id'];
    $email = $row['email'];
    $password = $row['password'];

$pw = password_verify ( $passwordentered, $password );

if ($emailentered == "$email" && $pw==TRUE) {    

    $_SESSION['user'] = $emailentered;
    $_SESSION['id'] = $id;  

    header('Location: myaccount.php');

}
}

head();
navbar();
echo "
<div class='container-fluid'>
<div class='loginArea'>
<form id ='formlogin' method='post' action='processlogin.php'>
     
 <div class='row'>

            <div class='col-8'>
           

                <div class='mb-3 login'>
                
                     <div><strong>Username or Password incorrect!</strong></div><br>   
                    <label for='exampleInputEmail1' class='form-label'>Email address</label>
                    <input type='email' name='email' class='form-control' id='emailInput' aria-describedby='emailHelp'>
                    <div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
                </div>
            </div>

            <div class='row'>
                <div class='col-8'>
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
";
footer2();
}

}

?>
