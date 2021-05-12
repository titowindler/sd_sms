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
                        <a class='nav-link' style='color:white' href='admin_view_employee.php'>
                        <span>View Employees</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:#337ab7' href='admin_view_inventory.php'>
                        <span>View Inventory</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_view_sales.php'>
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
                           <div class="m-b-10">
                           <b>Products Made</b>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Date</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                <?php 

                                   $queryViewProductInv = "SELECT * FROM productinventory 
                                   ORDER BY productInv_date DESC
                                   ";
                                   $resultViewProductInv = mysqli_query($conn,$queryViewProductInv);

                                   while($rowViewProductInv = mysqli_fetch_assoc($resultViewProductInv)) {
                                    
                                     $date = $rowViewProductInv['productInv_date'];
                                     $productInvId = $rowViewProductInv['productInventoryId'];

                                     ?>
                                                                      <tr>
                                       <td><?php echo $date ?></td>
                                       <td>
                                          &nbsp;
                                          <a href="admin_display_productInv.php?passID=<?php echo $productInvId?>">VIEW</a>
                                       </td>
                                    </tr>
                                   <?php } ?>
                                 </tbody>
                              </table>
                           </div>

                           <br><br>

                           <div class="m-b-10">
                           <b>Ingredients Used</b>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Date</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                   $queryViewIngredientInv = "SELECT * FROM ingredientinventory 
                                   ORDER BY ingredientInv_date DESC
                                   ";
                                   $resultViewIngredientInv = mysqli_query($conn,$queryViewIngredientInv);

                                   while($rowViewIngredientInv = mysqli_fetch_assoc($resultViewIngredientInv)) {
                                    
                                     $date = $rowViewIngredientInv['ingredientInv_date'];
                                     $ingredientInvId = $rowViewIngredientInv['ingredientInventoryId'];

                                     ?>
                                      <tr>
                                       <td><?php echo $date ?></td>
                                       <td>
                                          &nbsp;
                                          <a href="admin_display_ingredientInv.php?passID=<?php echo $ingredientInvId?>">VIEW</a>
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