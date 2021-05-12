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
                          <h6 style="color:white;text-align: center">BAKER</h6>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='baker_view_ingredients.php'>
                        <span>View Ingredients</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='baker_add_ingredients_inventory.php'>
                        <span>Add Ingredients Inventory</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='baker_add_product_made.php'>
                        <span>Add Products Made</span>
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
                           <h4 class="page-title">View Products Made</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Products Made
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
   
                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="baker_add_product_made.php">
                              <button id="addToTable" class="btn btn-danger waves-effect waves-light">Return</button>
                              </a>
                            </div>
                            <div class="m-b-10">
                              <h4>Date: <?php echo $date ?></h4>
                                <a href="baker_insert_product_made.php?sendID=<?php echo $product_inventory_id ?>">
                                 <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Products Made</button>
                               </a>  
                            </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Products Name</th>
                                       <th>Products Made</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                 <?php 

                  $queryViewProductInvMade2 = "SELECT SUM(productinventorymade.productMade) AS totalProductMade,productinventorymade.productInvId FROM productinventorymade
                  WHERE productinventorymade.productInvId = '$product_inventory_id'
                  ";
                  $resultViewProductInvMade2 = mysqli_query($conn,$queryViewProductInvMade2);
                  while($rowViewProductInvMade2 = mysqli_fetch_assoc($resultViewProductInvMade2)) {

                  //ingredientinvused
                  $totalProductMade = $rowViewProductInvMade2['totalProductMade'];
                  
                  }


                  $queryViewProductInvMade = "SELECT * FROM productinventorymade
                  JOIN products
                  ON products.productId = productinventorymade.productId 
                  WHERE productinventorymade.productInvId = '$product_inventory_id'
                  ";
                 
                  $resultViewProductInvMade = mysqli_query($conn,$queryViewProductInvMade);
                  while($rowViewProductInvMade = mysqli_fetch_assoc($resultViewProductInvMade)) {
                 
                  //ProductInvMade
                  $productInventoryMadeId = $rowViewProductInvMade['productInventoryMadeId'];
                  $productInvId = $rowViewProductInvMade['productInvId'];
                  $productId = $rowViewProductInvMade['productId'];
                  $productMade = $rowViewProductInvMade['productMade'];
                  
                  $productName = ucfirst($rowViewProductInvMade['productName']);

                  ?>
                         <tr>
                            <td><?php echo $productName?></td>
                            <td><?php echo $productMade?></td>
                            <td> <a href="../controller/remove_product_inventory_made.php?remove=<?php echo $productInventoryMadeId?>&prodInvId=<?php echo $productInvId?>">REMOVE</a> </td>
                         </tr>

                        <?php } ?>

                        <tr>
                           <td class="text-right"><b>TOTAL PRODUCTS MADE</b></td>
                           <td><b><?php echo $totalProductMade ?></b></td>
                           <td rowspan="1"></td>
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