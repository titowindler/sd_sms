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
                          <h6 style="color:white;text-align: center">CUSTOMER</h6>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='customer_view_products.php'>
                        <span>View Products</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='customer_view_order.php'>
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
                           <h4 class="page-title">View Orders</h4>
                         
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                             </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th></th>
                                       <th>Customer Name</th>
                                       <th>Product Name</th>
                                       <th>Product Price</th>
                                       <th>Customer Order Qty</th>
                                       <th>Total Price</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                   $queryViewProducts = "SELECT * FROM orders o 
                                   JOIN products p
                                   ON o.product_id = p.product_id 
                                   JOIN accounts a 
                                   ON o.customer_id = a.accountId
                                   WHERE o.customer_id = '$account_id'
                                   ";
                                   $resultViewProducts = mysqli_query($conn,$queryViewProducts);

                                   while($rowViewProducts = mysqli_fetch_assoc($resultViewProducts)) {
                                   
                                   ?> 
                                  
                                    <tr>
                                       <td></td>
                                       <td><?php echo ucfirst($rowViewProducts['firstname']); ?>  <?php echo ucfirst($rowViewProducts['lastname']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_name']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_price']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['order_qty']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['total_price']); ?></td>
                                      <td>
                                        <?php if($rowViewProducts['order_status'] == 0) { ?>
                                          <h5>Cancel Order</h5>
                                        <?php } ?>

                                         <?php if($rowViewProducts['order_status'] == 1) { ?>
                                          <h5>Order Is Pending</h5>
                                        <?php } ?>

                                         <?php if($rowViewProducts['order_status'] == 2) { ?>
                                          <h5>Accepted Order</h5>
                                        <?php } ?>

                                       </td>
                                    </tr>

                                 <?php } ?>

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