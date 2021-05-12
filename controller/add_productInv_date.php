<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $date = $_POST['date'];

	$query = "INSERT INTO productinventory (productInventoryId,productInv_date)
	 VALUES (NULL,'$date')";

	$result = mysqli_query($conn,$query);

	 if($result){
		header("location:../views/baker_add_product_made.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>