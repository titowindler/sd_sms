<?php
session_start();

function setSession($id,$username,$password,$fname,$lname,$cnumber,$usertype){
	$_SESSION["account_id"] =$id;
	$_SESSION["account_username"] = $username;
	$_SESSION["account_password"]=$password;
	$_SESSION["account_fname"]=$fname;
	$_SESSION["account_lname"]=$lname;
	$_SESSION["account_cnumber"]=$cnumber;
	$_SESSION["account_usertype"]=$usertype;
	
}


function unsetSession(){
	session_unset();
	session_destroy(); 
}

?>