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
                        <a class='nav-link' style='color:#337ab7' href='baker_view_products.php'>
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
                           <h4 class="page-title">View Products</h4>
                         
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="baker_add_products.php">
                              <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Products</button>
                              </a>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th></th>
                                       <th>Product Photo</th>
                                       <th>Products Name</th>
                                       <th>Product Price</th>
                                       <th>Product Quantity</th>
                                       <th>Product Details</th>
                                       <th>Product Category</th>
                                       <!-- <th>Actions</th> -->
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                   $queryViewProducts = "SELECT * FROM products ";
                                   $resultViewProducts = mysqli_query($conn,$queryViewProducts);

                                   while($rowViewProducts = mysqli_fetch_assoc($resultViewProducts)) {
                                   
                                   ?> 
                                  
                                    <tr>
                                       <td>  &nbsp;<a href="baker_add_quantity.php?add_qty=<?php echo $rowViewProducts['product_id']?>">ADD QUANTITY</a></td>
                                       <td><img src="../images/<?php echo  ucfirst($rowViewProducts['product_photo']);?>" width="200" height="200" alt="Template Demo Image"></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_name']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_price']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_qty']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_details']); ?></td>
                                       <td><?php echo ucfirst($rowViewProducts['product_category']); ?></td>
                                     <!--   <td>
                                          &nbsp;
                                          <a href="baker_edit_ingredients.php?getID=<?php echo $rowViewIngredients['ingredient_id']?>">EDIT</a>
                                       </td> -->
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