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
                        <a class='nav-link' style='color:#337ab7' href='baker_view_ingredients.php'>
                        <span>View Ingredients</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='baker_add_ingredients_inventory.php'>
                        <span>Add Ingredients Inventory</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='baker_add_product_made.php'>
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
                           <h4 class="page-title">View Ingredients</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Ingredients
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
                              <a href="baker_add_ingredients.php">
                              <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Ingredients</button>
                              </a>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Ingredients Name</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                   $queryViewIngredients = "SELECT * FROM ingredients ";
                                   $resultViewIngredients = mysqli_query($conn,$queryViewIngredients);

                                   while($rowViewIngredients = mysqli_fetch_assoc($resultViewIngredients)) {
                                   
                                   ?> 
                                  
                                    <tr>
                                       <td><?php echo ucfirst($rowViewIngredients['ingredientName']); ?></td>
                                       <td>
                                          &nbsp;
                                          <a href="baker_edit_ingredients.php?getID=<?php echo $rowViewIngredients['ingredient_id']?>">EDIT</a>
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