<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $ingredient_name = strtolower($_POST['ingredient_name']);


	$query = "INSERT INTO ingredients (ingredient_id,ingredientName)
	 VALUES (NULL,'$ingredient_name')";

	$result = mysqli_query($conn,$query);

	 if($result){
		header("location:../views/baker_view_ingredients.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>