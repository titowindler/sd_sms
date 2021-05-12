<?php require('connection.php'); ?>
<?php require('sessions.php'); ?>
<?php

	$conn=connect();
	
    $productInvId = $_POST['productInvID'];
    $productLeftOverId = $_POST['product_leftoverID'];

    $queryViewProductLeftOver = "SELECT * FROM productinventoryleftover 
    JOIN products ON products.productId = productinventoryleftover.productId 
   	WHERE productinventoryleftover.productLeftOverId = '$productLeftOverId'
    ";

    $resultViewProductLeftOver = mysqli_query($conn,$queryViewProductLeftOver);

    while($rowViewProductLeftOver = mysqli_fetch_assoc($resultViewProductLeftOver)) {

    $productLeftOverId = $rowViewProductLeftOver['productLeftOverId'];
    $product_id = $rowViewProductLeftOver['productId'];
    $productName = ucfirst($rowViewProductLeftOver['productName']);
    $productPrice = $rowViewProductLeftOver['productPrice'];
    $productLeftOver = $rowViewProductLeftOver['productLeftOver'];
                                           
    }

    $productBought = $_POST['product_bought'];

    // calculation for total price
	$totalPrice = ($productPrice*$productBought);

	// calculation for product left over
	//$totalProductLeftOver = ($productBought-$productLeftOver);

	$totalProductLeftOver = ($productLeftOver-$productBought);


	if($productBought <= $productLeftOver) {
    // query for sales
	$query = "INSERT INTO productinventorysale (productInventorySaleId,productInvId,productId,productBought,productTotalPrice)
	 VALUES (NULL,'$productInvId','$product_id','$productBought','$totalPrice')";
	$result = mysqli_query($conn,$query);


	// query for product leftovers 
	$query2 = "UPDATE productinventoryleftover SET `productLeftOver` = '$totalProductLeftOver' WHERE `productLeftOverId` = '$productLeftOverId'
	";
    $result2 = mysqli_query($conn,$query2);

	 if($result AND $result2){
		header("location:../views/employee_display_product_inventory.php?passID=$productInvId");
	 }else{
	 	echo "ERROR!". mysqli_error($conn);
	 }
	}else{
	  $display = "Product Made is low cannot purchase this product";
	  header("location:../views/employee_display_product_inventory.php?passID=$productInvId&info=".$display);
	}

?>