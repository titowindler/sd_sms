        
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            
                            <?php if($_SESSION['user_type'] == '1') {
                        	echo "<li class='menu-title'><center>Administrator</center></li>";
                            } ?>

                    
                            <?php if($_SESSION['user_type'] == '2') {
                            echo "<li class='menu-title'><center>
                            Seller</center></li>";
                            } ?>

                            <?php if($_SESSION['user_type'] == '3') {
                            echo "<li class='menu-title'><center>Buyer</center></li>";
                            } ?>

                        <?php 
                        //Admin
                        if($_SESSION['user_type'] == '1') { ?>
                        
                           
                           <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='dashboard.php'> <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                  </a>
                            </li>

                            <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='users_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Users</span>
                                  </a>
                             </li>

                            <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='markets_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Market</span>
                                  </a>
                             </li>

                              <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='transactions_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Transaction</span>
                                  </a>
                             </li>

                              <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='shippers_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Shipper</span>
                                  </a>
                             </li>
                       
                        </ul> 
                    <?php } ?>



                        <?php 
                        //Seller
                        if($_SESSION['user_type'] == '2') { ?>

                            <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='dashboard.php'> <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                  </a>
                            </li>

                            <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='market.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>Market</span>
                                  </a>
                             </li>

                             <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='sellerInventory_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Inventory</span>
                                  </a>
                             </li>

                       <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='sellerTransactions_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Transactions</span>
                                  </a>
                             </li>

                        </ul> 
                    <?php } ?>


                    <?php 
                     //Buyer
                    if($_SESSION['user_type'] == '3') { ?>

                           <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='dashboard.php'> <i class="mdi mdi-view-dashboard"></i>
                                    <span>Dashboard</span>
                                  </a>
                            </li>

                            <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='market.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>Market</span>
                                  </a>
                             </li>

                             <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='buyerPurchases_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Purchases</span>
                                  </a>
                             </li>

                                <li class='nav-item'>
                                  <a class='nav-link' style='color:white' href='buyerTransactions_view.php'><i class="mdi mdi-calendar-clock"></i>
                                    <span>View Transactions</span>
                                  </a>
                             </li>

                        </ul> 
                    <?php } ?>


                     <?php if($_SESSION['user_type'] == '4') { ?>
                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>
                            
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar-clock"></i> <span> Schedules</span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#add-category.php">Add New Schedules</a></li>
                                    <li><a href="#manage-categories.php">Manage Schedules</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-desktop-mac"></i> <span> Announcements  </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#add-category.php">Add Announcements</a></li>
                                    <li><a href="#manage-categories.php">Manage Announcements</a></li>
                                </ul>
                            </li>

                        </ul> 
                    <?php } ?>
                    </div>

                    
                     <div class="clearfix"></div>

                         <!-- Seller Current Balance -->
                         <?php
                          $id = $_SESSION['user_id'];
                          $conn = connect();
                          $sql = "SELECT * FROM seller WHERE userID = $id ";
                          $result = mysqli_query($conn,$sql);
                          while($row=mysqli_fetch_array($result))
                          {
                            $sellerBalance = $row['sellerBalance'];
                          }

                          if($_SESSION['user_type'] == '2') {
                          echo "<div class='help-box'>
                          <h6 class='text-muted m-t-0'>User Current Balance:</h6>
                          <h4 class=''><span class='text-custom'>PHP: $sellerBalance</h4>
                          <a href='send_balance_seller.php' class='btn btn-success'>Send Balance</a>
                          </div>";
                            } ?>

                          <!-- Buyer Current Balance -->
                          <?php

                          $id = $_SESSION['user_id'];
                          $conn = connect();
                          $sql = "SELECT * FROM buyer WHERE userID = $id";
                          $result = mysqli_query($conn,$sql);
                          while($row=mysqli_fetch_array($result))
                          {
                            $buyerBalance = $row['buyerBalance'];
                          }


                          if($_SESSION['user_type'] == '3') {
                          echo "<div class='help-box'>
                          <h6 class='text-muted m-t-0'>User Current Balance:</h6>
                          <h4 class=''><span class='text-custom'>PHP: $buyerBalance</h4>
                          <a href='add_balance_buyer.php' class='btn btn-primary'>Add Balance</a>
                          </div>";
                            } ?>     
                    </div>
                  </div>