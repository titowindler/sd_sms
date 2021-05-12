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
                           <h4 class="page-title">Add Ingredients Inventory</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 Add Ingredients Inventory
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

               <?php $ingredient_inventory_id = $_GET['sendID']; ?>



                  <!-- end row -->
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-md-6">
                                 <form class="form-horizontal" method="POST" action="../controller/add_ingredient_inventory_used.php">

                                    <input type="hidden" value="<?php echo $ingredient_inventory_id ?>" name="ingredient_inventoryID">

                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Ingredient Name:</label>
                                       <div class="col-md-10">
                                          <select class="form-control" name="ingredient_name" required>
                                             <?php

                                             $queryViewIngredient = "SELECT * FROM ingredients";
                                             $resultViewIngredient = mysqli_query($conn,$queryViewIngredient);

                                             while($rowViewIngredient = mysqli_fetch_assoc($resultViewIngredient)) {

                                                $ingredient_id = $rowViewIngredient['ingredient_id'];
                                                $ingredientName = ucfirst($rowViewIngredient['ingredientName']);

                                             ?>
                                             <option value="<?php echo $ingredient_id?>"><?php echo $ingredientName?></option>

                                          <?php } ?>

                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Ingredient Used:</label>
                                       <div class="col-md-5">
                                          <input type="text" class="form-control" placeholder="" name="ingredient_used" required>
                                       </div>
                                       <div class="col-md-5">
                                          <select class="form-control" name="ingredient_type">
                                             <option value="L">Litres (L)</option>
                                             <option value="mL">Mililitres (mL)</option>
                                             <option value="g">Grams (g)</option>
                                             <option value="kg">Kilograms (kg)</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10">
                                          <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add_product">
                                          Submit
                                          </button>
                                          <a href="baker_display_ingredients_inventory.php?passID=<?php echo $ingredient_inventory_id ?>" class="btn btn-danger waves-effect waves-light btn-md">
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