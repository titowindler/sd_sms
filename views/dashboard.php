<!DOCTYPE html>
<html lang="en">
   <?php include('includes/headScripts.php');?>
   <body class="fixed-left">
      <!-- Begin page -->
    <?php if($_SESSION['account_usertype'] == 1) { ?> 
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
                        <a class='nav-link' style='color:#337ab7' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>

                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_view_customer_orders.php'>
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
                           <h4 class="page-title">Dashboard</h4>
                          
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>


            <?php

               $queryPendingOrders = "SELECT * FROM orders WHERE order_status = '1' ";
               $resultPendingOrders = mysqli_query($conn,$queryPendingOrders);
               $totalPendingOrders = mysqli_num_rows($resultPendingOrders);

            ?>

              <?php

               $queryAcceptOrders = "SELECT * FROM orders WHERE order_status = '2' ";
               $resultAcceptOrders = mysqli_query($conn,$queryAcceptOrders);
               $totalAcceptOrders = mysqli_num_rows($resultAcceptOrders);

            ?>


                  <!-- end row -->
                  <div class="row">
                     <a href="">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="card-box widget-box-one">
                             <div class="wigdet-one-content">
                                 <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Pending Orders</p>
                                 <h2><?php echo $totalPendingOrders ?></h2>
                              </div>
                           </div>
                        </div>
                        <!-- end col -->
                     </a>

                      <a href="">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="card-box widget-box-one">
                             <div class="wigdet-one-content">
                                 <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Accept Orders</p>
                                 <h2><?php echo $totalAcceptOrders ?></h2>
                              </div>
                           </div>
                        </div>
                        <!-- end col -->
                     </a>

               
                  </div>
                  <!-- end row -->



               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>

<?php } ?>

   <!-- Begin page -->
    <?php if($_SESSION['account_usertype'] == 2) { ?> 
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
                        <a class='nav-link' style='color:#337ab7' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='baker_view_products.php'>
                        <span>View Products</span>
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
                           <h4 class="page-title">Dashboard</h4>
                          
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

                  <?php

                  $queryProducts = "SELECT * FROM products";
                  $resultProducts = mysqli_query($conn,$queryProducts);
                  $totalProducts = mysqli_num_rows($resultProducts);


                  ?>

                  <!-- end row -->
                  <div class="row">
                     <a href="#">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="card-box widget-box-one">
                             <div class="wigdet-one-content">
                                 <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Products</p>
                                 <h2><?php echo $totalProducts ?></h2>
                              </div>
                           </div>
                        </div>
                        <!-- end col -->
                     </a>
                  </div>
                  <!-- end row -->

               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>

<?php } ?>

   <!-- Begin page -->
    <?php if($_SESSION['account_usertype'] == 3) { ?> 
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
                        <a class='nav-link' style='color:#337ab7' href='dashboard.php'>
                        <span>Dashboard</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='customer_view_products.php'>
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
                           <h4 class="page-title">Dashboard</h4>
                         
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

               <?php

                  $queryProducts = "SELECT * FROM orders WHERE customer_id = '$account_id' ";
                  $resultProducts = mysqli_query($conn,$queryProducts);
                  $totalProducts = mysqli_num_rows($resultProducts);

               ?>

                  <!-- end row -->
                  <div class="row">
                     <a href= "#">
                        <div class="col-lg-4 col-md-4 col-sm-6">
                           <div class="card-box widget-box-one">
                             <div class="wigdet-one-content">
                                 <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Orders</p>
                                 <h2><?php echo $totalProducts ?></h2>
                              </div>
                           </div>
                        </div>
                        <!-- end col -->
                     </a>

            
                  </div>
                  <!-- end row -->

               </div>
               <!-- container -->
            </div>
            <!-- content -->
            <?php include('includes/footer.php');?>
         </div>
      </div>

<?php } ?>

      <!-- END wrapper -->
      <?php include('includes/footerScripts.php');?>
   </body>
</html>