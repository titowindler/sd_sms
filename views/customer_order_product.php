<!DOCTYPE html>
<html lang="en">
   <?php include('includes/headScripts.php');?>
   <body class="fixed-left">
      <!-- Begin page -->
      <div id="wrapper">
         <!-- Button mobile view to collapse sidebar menu -->
         <?php include('includes/topheader.php');?>

         <?php 

         $orderID = $_GET['order'];

         $sqlFetch = "SELECT * FROM products WHERE product_id = '$orderID' ";
         $resultFetch = mysqli_query($conn,$sqlFetch);

        while($rowFetch = mysqli_fetch_assoc($resultFetch)) {
          $product_qty = $rowFetch['product_qty']; 
        }

         $customerID = $_SESSION['account_id'];

         ?>

         <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">
               <!--- Sidemenu -->
               <div id="sidebar-menu">
                 <ul>
                     <li class='nav-item'>
                          <h6 style="color:white;text-align: center">CUSTOMER</h6>

                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='customer_view_products.php'>
                        <span>View Products</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='customer_view_order.php'>
                        <span>View Orders</span>
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
                           <h4 class="page-title">Order Products</h4>
                          
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-md-6">
                                 <form class="form-horizontal" method="POST" action="../controller/customer_order_qty.php">

                                    <input type="hidden" value="<?php echo $orderID ?>" name="prodID">

                                    <input type="hidden" value="<?php echo $customerID ?>" name="customerID">

                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Order Quantity:</label>
                                       <div class="col-md-10">
                                          <input type="number" min="1" max="<?php echo $product_qty ?>" class="form-control" name="order_quantity" required>
                                       </div>
                                    </div>
  
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10">
                                          <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add_product">
                                          Submit
                                          </button>
                                          <a href="customer_view_products.php" class="btn btn-danger waves-effect waves-light btn-md">
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