<?php require('connection.php'); ?>
<?php


$accept = $_GET['accept'];

$conn=connect();

$sql = "UPDATE orders SET order_status = '2' WHERE `order_id` = '$accept'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/admin_view_customer_orders.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>