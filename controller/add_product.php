<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $product_name = strtolower($_POST['product_name']);
    $product_price = $_POST['price'];
    $product_details = $_POST['details'];
    $product_category = $_POST['category'];


    $filename = '';
	//check if file uploaded exists and there are no errors during upload
	if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
		if($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {
			if($_FILES['image']['type'] < 10000000){
	//define the new location and name of the photo (images/1001_mypic.png)
			$filename = "../images/" .$number."_".$_FILES['image']['name'];
	//tell PHP to move the file from where and to where
			move_uploaded_file($_FILES['image']['tmp_name'], $filename);	
			}
	   	 }
	  }

	$query = "INSERT INTO products (product_id,product_name,product_price,product_qty,product_details,product_photo,product_category)
	 VALUES (NULL,'$product_name','$product_price','0','$product_details','$filename','$product_category')";

	$result = mysqli_query($conn,$query);

	 if($result){
		header("location:../views/baker_view_products.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>