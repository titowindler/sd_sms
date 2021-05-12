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
                        <a class='nav-link' style='color:white' href='admin_dashboard.php'>
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
   
                  <div class="row" id="exampl">
                     <div class="col-md-12">
                        <div class="demo-box m-t-20">
                           <div class="m-b-30">
                              <a href="admin_view_inventory.php">
                              <button id="addToTable" class="btn btn-danger waves-effect waves-light">Return</button>
                              </a>
                            </div>
                            <div class="m-b-10">
                              <h4>Date: <?php echo $date ?></h4>
                                <a href="#">
                                 <button id="addToTable" class="btn btn-primary waves-effect waves-light" style="cursor:pointer" OnClick="CallPrint(this.value)">Print</button>
                               </a>  
                            </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>Ingredients Name</th>
                                       <th>Ingredients Used</th>
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
                                     </tr>

                  <?php } ?>



                                    <tr>
                                       <td class="text-right"><b>TOTAL INGREDIENTS USED</b></td>
                                       <td><b><?php echo $totalIngredientUsed ?></b></td>
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