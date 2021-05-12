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
                           <h4 class="page-title">Add Products</h4>
                           
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-md-6">
                                 <form class="form-horizontal" method="POST" action="../controller/add_product.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Product Name:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" placeholder="" name="product_name" required>
                                       </div>
                                    </div>
                                     <div class="form-group">
                                       <label class="col-md-2 control-label">Product Price:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" placeholder="" name="price" required>
                                       </div>
                                    </div>
                                     <div class="form-group">
                                       <label class="col-md-2 control-label">Product Details:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" placeholder="" name="details" required>
                                       </div>
                                    </div>
                                     <div class="form-group">
                                       <label class="col-md-2 control-label">Product Category:</label>
                                       <div class="col-md-10">
                                          <select class="form-control" name="category">
                                             <option selected hidden>Choose A Category</option>
                                             <option value="Pastry">Pastry</option>
                                             <option value="Bread">Bread</option>
                                             <option value="Pie">Pie</option>
                                          </select>
                                       </div>
                                    </div>
                                      <div class="form-group">
                                       <label class="col-md-2 control-label">Product Picture:</label>
                                       <div class="col-md-10">
                                          <input type="file" class="form-control" placeholder="" name="image" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10">
                                          <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add_inventory">
                                          Submit
                                          </button>
                                          <a href="baker_view_products.php" class="btn btn-danger waves-effect waves-light btn-md">
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