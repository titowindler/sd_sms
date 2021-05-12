<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

if(isset($_POST['loginUser'])){
	userLogin();
}

// Logging In A New User
function userLogin(){
	$username=$_POST['user_username'];
	$password= md5($_POST['user_password']);
	//$secret = "secretAdmin";
	$conn=connect();
	$sql = "SELECT * FROM accounts WHERE account_username='$username' AND account_password='$password' LIMIT 1";
	$result= mysqli_query($conn,$sql);

	 if (mysqli_num_rows($result) > 0) {
    
	 	while($row = mysqli_fetch_assoc($result)) {
			setSession($row['accountId'],$row['account_username'],$row['account_password'],$row['firstname'],$row['lastname'],$row['contactnumber'],$row['usertype']);
			header('Location:../views/dashboard.php');
	 	}
	 } else {
		//var_dump($conn);
		$error =  "Incorrect Username and/or Password!";
	 	header('Location:../views/index.php?error='.$error);
	 }
	 	mysqli_close($conn);
}

?>
