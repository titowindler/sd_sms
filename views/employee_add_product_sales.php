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
                           <h4 class="page-title">Add Product Sales</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 Add Product Sales
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

                  <?php $product_inventory_id = $_GET['sendID']; ?>

                  <!-- end row -->
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-md-6">
                                 <form class="form-horizontal" method="POST" action="../controller/add_product_sales.php">
                                    
                                    <input type="hidden" value="<?php echo $product_inventory_id?>" name="productInvID">

                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Product Name:</label>
                                       <div class="col-md-10">
                                          <select class="form-control" name="product_leftoverID" required>
                                              <?php

                                             $queryViewProductLeftOver = "SELECT productinventoryleftover.productLeftOverId,productinventoryleftover.productInvId,products.productName, products.productPrice FROM productinventoryleftover 
                                             JOIN products ON products.productId = productinventoryleftover.productId
                                             WHERE productinventoryleftover.productInvId = '$product_inventory_id' 
                                             ";
                                             $resultViewProductLeftOver = mysqli_query($conn,$queryViewProductLeftOver);

                                             while($rowViewProductLeftOver = mysqli_fetch_assoc($resultViewProductLeftOver)) {

                                                $productLeftOverId = $rowViewProductLeftOver['productLeftOverId'];
                                                $product_id = $rowViewProductLeftOver['productId'];
                                                $productName = ucfirst($rowViewProductLeftOver['productName']);
                                                $productPrice = $rowViewProductLeftOver['productPrice'];

                                             ?>
                                           
                                             <option value="<?php echo $productLeftOverId?>"><?php echo $productName ?> - <?php echo $productPrice ?></option>
                                                <?php } ?>
                                          </select>
                                          
                                          <?php //echo $queryViewProductLeftOver ?>

                                       </div> 
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Product Bought:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" name="product_bought" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10">
                                          <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add_product">
                                          Submit
                                          </button>
                                          <a href="employee_display_product_inventory.php?passID=<?php echo $product_inventory_id?>" class="btn btn-danger waves-effect waves-light btn-md">
                                          Cancel
                                          </a>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
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