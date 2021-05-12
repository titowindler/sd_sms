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
                           <h4 class="page-title">View Employees</h4>
                           <ol class="breadcrumb p-0 m-0">
                              <li>
                                 <a href="#">Snowbee</a>
                              </li>
                              <li class="active">
                                 View Employees
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
                              <a href="admin_add_employee.php">
                              <button id="addToTable" class="btn btn-success waves-effect waves-light">Add Employee</button>
                              </a>
                           </div>
                           <div class="table-responsive">
                              <table class="table m-0 table-colored-bordered table-bordered-primary" id="#viewUsers" width="100%">
                                 <thead>
                                    <tr>
                                       <th>First Name</th>
                                       <th>Last Name</th>
                                       <th>Contact Number</th>
                                       <th>User Type</th>
                                       <th>Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   <?php 

                                  
                                   $queryViewEmp = "SELECT * FROM accounts WHERE usertype = '2' OR usertype = '3' ";
                                   $resultViewEmp = mysqli_query($conn,$queryViewEmp);

                                   while($rowViewEmp = mysqli_fetch_assoc($resultViewEmp)) {
                                   
                                   ?> 
                                    <tr>
                                       <td><?php echo $rowViewEmp['firstname']; ?></td>
                                       <td><?php echo $rowViewEmp['lastname']; ?></td>
                                       <td><?php echo $rowViewEmp['contactnumber']; ?></td>
                                       <td><?php

                                       if($rowViewEmp['usertype'] == 2){
                                          echo "Baker";
                                       }else{
                                          echo "Employee";
                                       }

                                        ?></td>
                                       <td>
                                          &nbsp;
                                          <a href="admin_edit_employee.php?getID=<?php echo $rowViewEmp['accountId'] ?>">EDIT</a>
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