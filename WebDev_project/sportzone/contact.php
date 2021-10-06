<?php

session_start();
include("includes/functions.php");
head();
navbar()

?>
<div class="container">

<div><a href="https://www.facebook.com/"target="_blank"><img class="contactlogo" src="https://i.imgur.com/ih3D2yf.jpg" alt=""></a>
<a href="https://www.instagram.com/"target="_blank"> <img class="contactlogo" src="https://i.imgur.com/yxC0Fbi.jpg" alt=""></a>
<a href="https://www.twitter.com/"target="_blank"><img class="contactlogo" src="https://i.imgur.com/H3bHnEQ.jpg" alt=""></a></div>
<div><br><h2>Contact</h2> </div>
<br>

<?php
if(isset($_SESSION["user"])){
$email = $_SESSION["user"];
}

echo "<form method='POST' action='processcontact.php'>
<fieldset>
<div class='form-group'>
<label for='name'><strong>Name</strong></label>
<input type='text' class='form-control' name ='name' required = 'required'><br>

<label for='name'><strong>Email</strong></label>
<input type='email' class='form-control' name ='email' ";if(isset($_SESSION["user"])){
    $email= $_SESSION["user"];
    echo"value='$email'";
     }
echo "required = 'required'><br>

<br>

     <label for='msg'><strong>Reason for contact</strong></label>

     <textarea class='form-control' input type='text' rows='10' name ='enquiry' required = 'required'></textarea> <br>                   
           
<input class='btn btn-success' type='submit' value='Sumbit'>
</div>
</fieldset>       
</form>
</div>";

footer()

?>
