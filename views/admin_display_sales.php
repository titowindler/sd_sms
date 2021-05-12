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
                        <h6 style="color:white;text-align: center">ADMINISTRATOR</h6>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_view_employee.php'>
                        <span>View Employees</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_view_inventory.php'>
                        <span>View Inventory</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='admin_view_sales.php'>
                        <span>View Sales</span>
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
                           <h4 class="page-title">View Sales</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Sales
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


                  <div class="row" id="exampl">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="admin_view_sales.php">
                              <button id="addToTable" class="btn btn-danger waves-effect waves-light">Return</button>
                              </a>
                            </div>
                            <div class="m-b-10">
                              <h4>Date: <?php echo $date ?></h4>
                                <a href="#">
                                 <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="cursor:pointer" OnClick="CallPrint(this.value)">Print</button>
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

      <script>
            $(function($) {

            });


function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>

   </body>
</html>