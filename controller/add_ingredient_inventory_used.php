<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $ingredient_inventoryID = $_POST['ingredient_inventoryID'];
    $ingredientID = $_POST['ingredient_name'];
	$ingredient_used = $_POST['ingredient_used'];
	$ingredient_type = $_POST['ingredient_type'];


	$query = "INSERT INTO ingredientinventoryused (ingredientInventoryUsedId,ingredientInvId,ingredientId,ingredientUsed,ingredientType)
	 VALUES (NULL,'$ingredient_inventoryID','$ingredientID','$ingredient_used','$ingredient_type')";

	$result = mysqli_query($conn,$query);

	 if($result){
		header("location:../views/baker_display_ingredients_inventory.php?passID=$ingredient_inventoryID");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>