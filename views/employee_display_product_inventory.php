<!DOCTYPE html>
<html lang="en">
   <?php include('includes/headScripts.php');?>
   <body class="fixed-left">
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Button mobile view to collapse sidebar menu -->
         <?php include('includes/topheader.php');?>
         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                  <ul>
                     <li class='nav-item'>
                        <h6 style="color:white;text-align: center">EMPLOYEE</h6>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='employee_view_product.php'>
                        <span>View Products</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='employee_add_product_inventory.php'>
                        <span>Add Product Inventory</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>


         <div class="content-page">
            <!-- Start content -->
            <div class="content">
               <div class="container">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="page-title-box">
                           <h4 class="page-title">View Product Inventory</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Product Inventory
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

               <?php
                  
                  $product_inventory_id = $_GET['passID'];

                    $queryViewProductInv = "SELECT * FROM productinventory 
                    WHERE productInventoryId = '$product_inventory_id'
                    ";
                    $resultViewProductInv = mysqli_query($conn,$queryViewProductInv);

                    while($rowViewProductInv = mysqli_fetch_assoc($resultViewProductInv)) {
                                    
                    $date = $rowViewProductInv['productInv_date'];
                    $productInvId = $rowViewProductInv['productInventoryId'];

                  }

                  ?> 

      <?php if(isset($_GET['perfect'])) { 
          $getSuccess =  $_GET['perfect'];
      ?>
        <div class="alert alert-success" id="alert"><?php echo $getSuccess; ?></div>
      <?php } else if(isset($_GET['info'])) { 
         $getFail = $_GET['info'];
      ?>

        <div class="alert alert-danger" id="alert"><?php echo $getFail; ?></div>

      <?php } else if(isset($_GET['right'])) { 
        $getUpdate = $_GET['right'];
      ?>

        <div class="alert alert-info" id="alert"><?php echo $getUpdate; ?></div>

      <?php } ?>


                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="employee_add_product_inventory.php">
                              <button id="addToTable" class="btn btn-danger waves-effect waves-light">Return</button>
                              </a>
                            </div>
                            <div class="m-b-10">
                              <h4>Date: <?php echo $date ?></h4>
                                <a href="employee_add_product_sales.php?sendID=<?php echo $productInvId?>">
                                 <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Product Sales</button>
                               </a>  
                            </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Product Name</th>
                                       <th>Product Price</th>
                                       <th>Product Bought</th>
                                       <th>Total Price</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                <?php 

                  $queryViewProductSales2 = "SELECT SUM(productinventorysale.productTotalPrice) AS totalProductPrice,productinventorysale.productInvId FROM productinventorysale
                  WHERE productinventorysale.productInvId = '$product_inventory_id'
                  ";
                  $resultViewProductSales2 = mysqli_query($conn,$queryViewProductSales2);
                  while($rowViewProductSales2 = mysqli_fetch_assoc($resultViewProductSales2)) {

                  //ingredientinvused
                  $totalProductPrice = $rowViewProductSales2['totalProductPrice'];
                  
                  }

                  $queryViewProductSales = "SELECT * FROM productinventorysale
                  JOIN products
                  ON products.productId = productinventorysale.productId 
                  WHERE productinventorysale.productInvId = '$product_inventory_id'
                  ";
                 
                  $resultViewProductSales = mysqli_query($conn,$queryViewProductSales);
                  while($rowViewProductSales = mysqli_fetch_assoc($resultViewProductSales)) {
                 
                  //ProductInvMade
                  $productInventoryMadeId = $rowViewProductSales['productInventorySaleId'];
                  $productInvId = $rowViewProductSales['productInvId'];
                  $productId = $rowViewProductSales['productId'];
                  $productBought = $rowViewProductSales['productBought'];
                  $productTotalPrice = $rowViewProductSales['productTotalPrice'];
                  
                  $productName = ucwords($rowViewProductSales['productName']);
                  $productPrice = $rowViewProductSales['productPrice'];

                  ?>
                 
                                    <tr>
                                       <td><?php echo $productName ?></td>
                                       <td><?php echo $productPrice ?></td>
                                       <td><?php echo $productBought ?></td>
                                       <td><?php echo $productTotalPrice ?></td>
                                    </tr>

                                  <?php } ?>

                                    <tr>
                                       <td></td>
                                       <td></td>
                                       <td class="text-right"><b>TOTAL PRODUCT SALES</b></td>
                                       <td><b><?php echo $totalProductPrice ?></b></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>

                            <div class="m-b-10 m-t-30">
                              <b>Product Leftovers</b>
                            </div>

                             <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Product Name</th>
                                       <th>Number of left overs</th>
                                      <!--  <th>Actions</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>

                                <?php

                                $queryLeftOver2 = "SELECT SUM(productinventoryleftover.productLeftOver) AS totalProductLeftOver,productinventoryleftover.productInvId FROM productinventoryleftover
                                 WHERE productinventoryleftover.productInvId = '$product_inventory_id'
                                 ";
                                $resultLeftOver2 = mysqli_query($conn,$queryLeftOver2);

                                while($rowLeftOver2 = mysqli_fetch_assoc($resultLeftOver2)) {

                                  $totalProductLeftOver = $rowLeftOver2['totalProductLeftOver'];
                                
                                }

                                $queryLeftOver = "SELECT * FROM productinventoryleftover
                                JOIN products ON products.productId = productinventoryleftover.productId 
                                WHERE productinventoryleftover.productInvId = '$product_inventory_id'
                                 ";
                                $resultLeftOver = mysqli_query($conn,$queryLeftOver);

                                while($rowLeftOver = mysqli_fetch_assoc($resultLeftOver)) {

                                  $productLeftOver = $rowLeftOver['productLeftOver'];
                                  $productName = ucwords($rowLeftOver['productName']);

                                ?>
                                    <tr>
                                       <td><?php echo $productName ?></td>
                                       <td><?php echo $productLeftOver?></td>
                                    </tr>

                                  <?php } ?>

                                    <tr>
                                       <td class="text-right"><b>TOTAL PRODUCT LEFT OVERS</b></td>
                                       <td rowspan="1"><b><?php echo $totalProductLeftOver ?></b></td>
                                     <!--   <td></td> -->
                                    </tr>
                                 </tbody>
                              </table>
                           </div>


                        </div>
                     </div>
                  </div>
                  <!--- end row -->
               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>
      <!-- END wrapper -->
      <?php include('includes/footerScripts.php');?>
   </body>
</html>