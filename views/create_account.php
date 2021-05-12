<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="News Portal.">
      <!-- App title -->
      <title>SALES MANAGEMENT SYSTEM</title>
      <!-- App css -->
      <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
      <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
      <script src="assets/js/modernizr.min.js"></script>
   </head>
   <body class="bg-transparent">
      <!-- HOME -->
      <section>
         <div class="container-alt">
            <div class="row">
               <div class="col-sm-12">
                  <div class="wrapper-page">
                     <div class="m-t-40 account-pages">
                        <div class="text-center">
                           <h2 class="text-uppercase">
                              <br>
                              <h3 style="color:black">SALES MANAGEMENT SYSTEM</h3>
                           </h2>
                        </div>
                        <div class="account-content">
                           <form class="form-horizontal" method="post" action="../controller/userController.php">
                              <div class="form-group ">
                                 <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" name="user_username" placeholder="Customer Name" autocomplete="off">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="col-xs-12">
                                    <input class="form-control" type="text" name="user_password" required="" placeholder="Password" autocomplete="off">
                                 </div>
                              </div>
                              <div class="form-group ">
                                 <div class="col-xs-12">
                                    <input class="form-control" type="text" required="" name="user_username" placeholder="Username" autocomplete="off">
                                 </div>
                              </div>
                            
                              <div class="form-group">
                                 <div class="col-md-4">
                                    <button type="submit" class="btn w-md btn-bordered btn-primary waves-effect waves-light"  name="loginUser">Login</button>
                                 </div>
                                 <div class="col-md-4">
                                    <a href="index.php" class="btn w-md btn-bordered btn-danger waves-effect waves-light">Cancel</a>
                                 </div>
                              </div> 

                           </form>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- END HOME -->
      <!-- jQuery  -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/detect.js"></script>
      <script src="assets/js/fastclick.js"></script>
      <script src="assets/js/jquery.blockUI.js"></script>
      <script src="assets/js/waves.js"></script>
      <script src="assets/js/jquery.slimscroll.js"></script>
      <script src="assets/js/jquery.scrollTo.min.js"></script>
      <!-- App js -->
      <script src="assets/js/jquery.core.js"></script>
      <script src="assets/js/jquery.app.js"></script>
   </body>
</html>