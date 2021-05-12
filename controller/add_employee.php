<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $fname = strtolower($_POST['first_name']);
	$lname = strtolower($_POST['last_name']);
	$cnumber = $_POST['contact_number'];
	$usertype = $_POST['user_type'];	

	$username = $lname;
	$password = md5($lname);

	$query = "INSERT INTO accounts (accountId,account_username,account_password,firstname,lastname,contactnumber,usertype)
	 VALUES (NULL,'$username','$password','$fname','$lname','$cnumber','$usertype')";

	$result = mysqli_query($conn,$query);

	 if($result){
		header("location:../views/admin_view_employee.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>