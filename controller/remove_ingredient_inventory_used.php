<?php require('connection.php'); ?>
<?php


$id = $_GET['remove'];
$passID = $_GET['invId'];

$conn=connect();

$sql = "DELETE FROM ingredientinventoryused WHERE `ingredientInventoryUsedId` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/baker_display_ingredients_inventory.php?passID=$passID");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>