<?php require('connection.php'); ?>
<?php


$cancel = $_GET['cancel'];

$conn=connect();

$sql = "UPDATE orders SET order_status = '0' WHERE `order_id` = '$cancel'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/admin_view_customer_orders.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>