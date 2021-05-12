<?php require('connection.php'); ?>
<?php

$conn=connect();

$id = $_POST['prodID'];
$add_qty = $_POST['add_quantity'];

$sql = "UPDATE products SET `product_qty` = '$add_qty' WHERE `product_id` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/baker_view_products.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>