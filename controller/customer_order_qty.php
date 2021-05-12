<?php require('connection.php'); ?>
<?php

	$conn=connect();
	
    $order_quantity = $_POST['order_quantity'];
    $prodID = $_POST['prodID'];
    $customerID = $_POST['customerID'];



    $sqlFetch = "SELECT * FROM products WHERE product_id = '$prodID' ";
    $resultFetch = mysqli_query($conn,$sqlFetch);

    while($rowFetch = mysqli_fetch_assoc($resultFetch)) {
    	$product_price = $rowFetch['product_price'];
    	$product_qty = $rowFetch['product_qty']; 
    }

    // for total price
    $total_price = $product_price * $order_quantity;


    // for deduction of product qty
    $new_prod_qty = $product_qty - $order_quantity;

	$query = "INSERT INTO orders (order_id,product_id,customer_id,order_qty,total_price,order_status)
	 VALUES (NULL,'$prodID','$customerID','$order_quantity','$total_price',1)";

	$result = mysqli_query($conn,$query);

	 $sqlUpdate = "UPDATE products SET `product_qty` = '$new_prod_qty' 
	 WHERE `product_id` = '$prodID' ";
	 $resultUpdate = mysqli_query($conn,$sqlUpdate);

	 if($result){
		header("location:../views/customer_view_order.php");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }

?>