<?php require('connection.php'); ?>
<?php

$conn=connect();

$id = $_POST['ingredient_id'];
$ingredient_name = strtolower($_POST['ingredient_name']);

$sql = "UPDATE ingredients SET `ingredientName` = '$ingredient_name' WHERE `ingredient_id` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/baker_view_ingredients.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>