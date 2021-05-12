<?php require('connection.php'); ?>
<?php


$id = $_GET['remove'];
$passID = $_GET['prodInvId'];

$conn=connect();

$sql = "DELETE FROM productinventorymade WHERE `productInventoryMadeId` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/baker_display_product_made.php?passID=$passID");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>