<?php
session_start();

include('conn.php');

include('includes/functions.php');

head();

?>

<?php

if (isset($_POST["basket"])) {

	if (isset($_SESSION["basket"])) {

		$product_array_id = array_column($_SESSION["basket"], "id");

		if (!in_array($_GET["id"], $product_array_id)) {

			$count = count($_SESSION["basket"]);

			$product_array = array(

				'id'=>	$_GET["id"],
				'name'	=>$_POST["name"],
				'price'=>$_POST["price"],
				'quantity'=>$_POST["quantity"]
			);

			$_SESSION["basket"][$count] = $product_array;
		} else {
			echo '<script>alert("This item has already been added!")</script>';
		}
	} else {
		$product_array = array(
			'id'=>$_GET["id"],
			'name'=>$_POST["name"],
			'price'=>$_POST["price"],
			'quantity'=>$_POST["quantity"]
		);
		$_SESSION["basket"][0] = $product_array;
	}
}

if (isset($_GET["action"])) {
	if ($_GET["action"] == "delete") {
		foreach ($_SESSION["basket"] as $keys => $values) {
			if ($values["id"] == $_GET["id"]) {
				unset($_SESSION["basket"][$keys]);
				echo '<script>alert("Item has been removed")</script>';
				echo '<script>window.location="basket.php"</script>';
			}
		}
	}
}

if (isset($_GET["complete"])) {

	foreach ($_SESSION["basket"] as $keys => $values) { {
			unset($_SESSION["basket"][$keys]);
			echo '<script>alert("Purchase Confirmed - please cheack your emails for order tracking")</script>';
			echo '<script>window.location="index.php"</script>';
		}
	}
}

head();
navbar();

?>
<br />
<div class="container">

	<div style="clear:both"></div>
	<a href="javascript:history.back()"> <img class="backlogo" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcpVKbStH4n3DWYQ5wIyYVjI17xzv3B1e2pyf6gmjvuuJenbAzveHCzu5ZpUiYJjXI7F0&usqp=CAU" alt=""></a>
	<br>
	<h3>Order Details</h3>
	<div class="table-responsive baskettable">
		<table class="table table-bordered">
			<tr>
				<th width="40%">Item Name</th>
				<th width="10%">Quantity</th>
				<th width="20%">Price</th>
				<th width="15%">Total</th>
				<th width="5%">Action</th>
			</tr>
			<?php
			if (!empty($_SESSION["basket"])) {
				$total = 0;
				foreach ($_SESSION["basket"] as $keys => $values) {
			?>
					<tr>
						<td><?php echo substr($values["name"], 0, 30);  ?></td>
						<td>
							<?php echo $values["quantity"]; ?></td>
						<td>£<?php echo $values["price"]; ?></td>


						<td>£<?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
						<td><a href="basket.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
				<?php
					$total = $total + ($values["quantity"] * $values["price"]);
				}
				?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right"> <?php echo number_format($total, 2); ?></td>
					<td></td>
				</tr>
			<?php
			}
			?>

		</table>
	</div>
	<?php
	if (isset($_SESSION["user"])) {

		$useremail = $_SESSION["user"];
	
		 echo "<a class='rightbutton' href='basket.php?complete'><button type='button' class='btn btn-success'>Confirm Purchase</button> </a>";

	}else{

		echo " <br> <div class = 'container'>   

		<div class='row'>
	
		<div class='col-12 col-md-6'>         
	   <strong> Please login so you can confirm your order...<br></strong>
		
		<div class='loginArea2'>
		

		<form id ='formlogin' method='post' action='processlogin.php'>				
											  
	
						<div class='mb-3 login'><br>
	
						
	
							<label for='exampleInputEmail1' class='form-label'>Email address</label>
							<input type='email' name='email' class='form-control' id='emailInput' aria-describedby='emailHelp'>
							<div id='emailHelp' class='form-text'>We'll never share your email with anyone else.</div>
						</div>
				  
	
				   
							<div class='mb-3 login'>
	
								<label for='exampleInputPassword1' class='form-label'>Password</label>
								<input type='password' name='pwd' class='form-control' id='passwordInput'>
	
							</div>
							<input type='submit' value='Log in' type='button' name='submit' class='btn btn-success'>
	
							</div>                     
						  
			</form>
		</div>";
;
	}
	?>
</div>
</div>


<br><br><br><br><br><br><br>
<br />
<?php
footer();

?>