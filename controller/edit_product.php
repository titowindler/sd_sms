<?php require('connection.php'); ?>
<?php

$conn=connect();

$id = $_POST['productID'];
$product_name = strtolower($_POST['product_name']);
$product_price = $_POST['product_price'];


$sql = "UPDATE products SET `productName` = '$product_name', `productPrice` = '$product_price' WHERE `productId` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/employee_view_product.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>