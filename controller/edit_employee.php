<?php require('connection.php'); ?>
<?php


$id = $_POST['account_id'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$cnumber = $_POST['contact_number'];
$usertype = $_POST['user_type'];

$conn=connect();

$sql = "UPDATE accounts SET `firstname` = '$fname', `lastname` = '$lname', `contactnumber` = '$cnumber', `usertype` = '$usertype' WHERE `accountId` = '$id'";

$result = mysqli_query($conn,$sql);

if($result){
	 	header("location:../views/admin_view_employee.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
    }
?>