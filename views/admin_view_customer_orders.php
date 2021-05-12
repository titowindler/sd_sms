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
                        <a class='nav-link' style='color:white' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>

                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='admin_view_customer_orders.php'>
                        <span>View Customer Orders</span>
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
                           <h4 class="page-title">View Inventory</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Inventory
                              </li>
                           </ol>
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
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                   $queryViewProducts = "SELECT * FROM orders o 
                                   JOIN products p
                                   ON o.product_id = p.product_id 
                                   JOIN accounts a 
                                   ON o.customer_id = a.accountId
                                   
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
                                       <td>
                                        <?php if($rowViewProducts['order_status'] == 1) { ?>
                                          &nbsp;
                                          <a href="../controller/admin_accept_order.php?accept=<?php echo $rowViewProducts['order_id']?>">ACCEPT ORDER</a>
                                          &nbsp;
                                          <a href="../controller/admin_cancel_order.php?cancel=<?php echo $rowViewProducts['order_id']?>">CANCEL ORDER</a>
                                       </td>
                                        <?php } else { ?>

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