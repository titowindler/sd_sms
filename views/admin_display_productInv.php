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
                  
                    $product_inventory_id = $_GET['passID'];

                    $queryViewProductInv = "SELECT * FROM productinventory 
                    WHERE productInventoryId = '$product_inventory_id'
                    ";
                    $resultViewProductInv = mysqli_query($conn,$queryViewProductInv);

                    while($rowViewProductInv = mysqli_fetch_assoc($resultViewProductInv)) {
                                    
                    $date = $rowViewProductInv['productInv_date'];
                    $productInvId = $rowViewProductInv['productInventoryId'];

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
                                       <th>Products Name</th>
                                       <th>Products Made</th>
                                    </tr>
                                 </thead>
                                 <tbody>

                 <?php 

                  $queryViewProductInvMade2 = "SELECT SUM(productinventorymade.productMade) AS totalProductMade,productinventorymade.productInvId FROM productinventorymade
                  WHERE productinventorymade.productInvId = '$product_inventory_id'
                  ";
                  $resultViewProductInvMade2 = mysqli_query($conn,$queryViewProductInvMade2);
                  while($rowViewProductInvMade2 = mysqli_fetch_assoc($resultViewProductInvMade2)) {

                  //ingredientinvused
                  $totalProductMade = $rowViewProductInvMade2['totalProductMade'];
                  
                  }


                  $queryViewProductInvMade = "SELECT * FROM productinventorymade
                  JOIN products
                  ON products.productId = productinventorymade.productId 
                  WHERE productinventorymade.productInvId = '$product_inventory_id'
                  ";
                 
                  $resultViewProductInvMade = mysqli_query($conn,$queryViewProductInvMade);
                  while($rowViewProductInvMade = mysqli_fetch_assoc($resultViewProductInvMade)) {
                 
                  //ProductInvMade
                  $productInventoryMadeId = $rowViewProductInvMade['productInventoryMadeId'];
                  $productInvId = $rowViewProductInvMade['productInvId'];
                  $productId = $rowViewProductInvMade['productId'];
                  $productMade = $rowViewProductInvMade['productMade'];
                  
                  $productName = ucfirst($rowViewProductInvMade['productName']);

                  ?>
                         <tr>
                            <td><?php echo $productName?></td>
                            <td><?php echo $productMade?></td>
                          </tr>

                        <?php } ?>

                        <tr>
                           <td class="text-right"><b>TOTAL PRODUCTS MADE</b></td>
                           <td><b><?php echo $totalProductMade ?></b></td>
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