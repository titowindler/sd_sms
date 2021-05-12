<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $product_inventoryID = $_POST['product_inventoryID'];
    $productID = $_POST['product_name'];
	$product_made = $_POST['product_made'];


	$query = "INSERT INTO productinventorymade (productInventoryMadeId,productInvId,productId,productMade)
	 VALUES (NULL,'$product_inventoryID','$productID','$product_made')";

	$result = mysqli_query($conn,$query);

    $query2 = "INSERT INTO productinventoryleftover (productLeftOverId,productInvId,productId,productLeftOver)
  	 VALUES (NULL,'$product_inventoryID','$productID','$product_made')";
	$result2 = mysqli_query($conn,$query2);


	 if($result){
		header("location:../views/baker_display_product_made.php?passID=$product_inventoryID");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>