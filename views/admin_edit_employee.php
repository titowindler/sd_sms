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
                        <a class='nav-link' style='color:#337ab7' href='admin_view_employee.php'>
                        <span>View Employees</span>
                        </a>
                     </li>
                     <li class='nav-item'>
                        <a class='nav-link' style='color:white' href='admin_view_inventory.php'>
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
                           <h4 class="page-title">Edit Employees</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 Edit Employees
                              </li>
                           </ol>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>

                  <?php 

                  $get_id = $_GET['getID'];

                  $queryGetEmp = "SELECT * FROM accounts WHERE accountId = '$get_id' ";
                  $resultGetEmp = mysqli_query($conn,$queryGetEmp);

                  while($rowGetEmp = mysqli_fetch_assoc($resultGetEmp)) {
                     $fname = $rowGetEmp['firstname'];
                     $lname = $rowGetEmp['lastname'];
                     $cnumber = $rowGetEmp['contactnumber'];
                     $usertype = $rowGetEmp['usertype'];
                  }

                  ?>

                  <!-- end row -->
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="row">
                              <div class="col-md-6">
                                 <form class="form-horizontal" method="POST" action="../controller/edit_employee.php">

                                    <input type="hidden" value="<?php echo $get_id ?>" name="account_id">

                                    <div class="form-group">
                                       <label class="col-md-2 control-label">First Name:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" value="<?php echo $fname ?>" name="first_name" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Last Name:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" value="<?php echo $lname ?>" name="last_name" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Contact Number:</label>
                                       <div class="col-md-10">
                                          <input type="text" class="form-control" value="<?php echo $cnumber ?>" name="contact_number" required>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">Usertype:</label>
                                       <div class="col-md-10">
                                          <select class="form-control" name="user_type" required>
                                             <option hidden selected value="<?php echo $usertype ?>">
                                                <?php if($usertype == 2) { 
                                                echo "Baker"; 
                                              }else{ 
                                                echo "Employee";
                                                } ?>
                                             </option>
                                             <option value="2">Baker</option>
                                             <option value="3">Employee</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-2 control-label">&nbsp;</label>
                                       <div class="col-md-10">
                                          <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="add_inventory">
                                          Submit
                                          </button>
                                          <a href="admin_view_employee.php" class="btn btn-danger waves-effect waves-light btn-md">
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