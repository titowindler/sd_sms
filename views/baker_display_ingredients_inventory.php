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
                        <a class='nav-link' style='color:#337ab7' href='baker_add_ingredients_inventory.php'>
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
                           <h4 class="page-title">View Ingredients Inventory</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Ingredients Inventory
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

                  <?php
                  
                  $ingredient_inventory_id = $_GET['passID'];

                  $queryViewIngredientInv = "SELECT * FROM ingredientInventory 
                  WHERE ingredientInventoryId = '$ingredient_inventory_id'
                  ";
                  $resultViewIngredientInv = mysqli_query($conn,$queryViewIngredientInv);

                  while($rowViewIngredientInv = mysqli_fetch_assoc($resultViewIngredientInv)) {
                                    
                  $date = $rowViewIngredientInv['ingredientInv_date'];
                  $ingredientInvId = $rowViewIngredientInv['ingredientInventoryId'];

                  }

                  ?> 
   
                  <div class="row">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="baker_add_ingredients_inventory.php">
                              <button id="addToTable" class="btn btn-danger waves-effect waves-light">Return</button>
                              </a>
                            </div>
                            <div class="m-b-10">
                              <h4>Date: <?php echo $date ?></h4>
                                <a href="baker_add_ingredients_inv.php?sendID=<?php echo $ingredientInvId?>">
                                 <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Ingredient Inventory</button>
                               </a>  
                            </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Ingredients Name</th>
                                       <th>Ingredients Used</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                  <?php
                  
                  $ingredient_inventory_id = $_GET['passID'];

                  $queryViewIngredientInvUsed2 = "SELECT SUM(ingredientinventoryused.ingredientUsed) AS totalIngredientUsed,ingredientinventoryused.ingredientInvId FROM ingredientinventoryused
                  WHERE ingredientinventoryused.ingredientInvId = '$ingredient_inventory_id'
                  ";
                  $resultViewIngredientInvUsed2 = mysqli_query($conn,$queryViewIngredientInvUsed2);
   
                  while($rowViewIngredientInvUsed2 = mysqli_fetch_assoc($resultViewIngredientInvUsed2)) {


                  //ingredientinvused
                  $totalIngredientUsed = $rowViewIngredientInvUsed2['totalIngredientUsed'];
                  
                  }

                  $queryViewIngredientInvUsed = "SELECT * FROM ingredientinventoryused
                  JOIN ingredients
                  ON ingredients.ingredient_id = ingredientinventoryused.ingredientId
                  WHERE ingredientinventoryused.ingredientInvId = '$ingredient_inventory_id'
                  ";

                 
                  $resultViewIngredientInvUsed = mysqli_query($conn,$queryViewIngredientInvUsed);

                  while($rowViewIngredientInvUsed = mysqli_fetch_assoc($resultViewIngredientInvUsed)) {
                 
                  //ingredientinvused
                  $ingredientInventoryUsedId = $rowViewIngredientInvUsed['ingredientInventoryUsedId'];
                  $ingredientInvId = $rowViewIngredientInvUsed['ingredientInvId'];
                  $ingredientId = $rowViewIngredientInvUsed['ingredientId'];
                  $ingredientUsed = $rowViewIngredientInvUsed['ingredientUsed'];
                  $ingredientType = $rowViewIngredientInvUsed['ingredientType'];
                  
                  $ingredientName = ucfirst($rowViewIngredientInvUsed['ingredientName']);

                  ?>
                                    <tr>
                                       <td><?php echo $ingredientName ?></td>
                                       <td><?php echo $ingredientUsed ?>(<?php echo $ingredientType ?>)</td>
                                       <td> <a href="../controller/remove_ingredient_inventory_used.php?remove=<?php echo $ingredientInventoryUsedId ?>&invId=<?php echo $ingredientInvId?>">REMOVE</a> </td>
                                    </tr>

                  <?php } ?>



                                    <tr>
                                       <td class="text-right"><b>TOTAL INGREDIENTS USED</b></td>
                                       <td><b><?php echo $totalIngredientUsed ?></b></td>
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