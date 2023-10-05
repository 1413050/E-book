<?php
include "config.php";
session_start()
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Book Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <!-- DATA TABLE JQUERY-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link href="../img/logo.png" rel="icon">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand text-warning text-decoration-none  brand-logo" style="font-size: 50px !important;" href="index.php">E-<span class="text-white">Book</span></a>
        
          <a class="sidebar-brand text-warning text-decoration-none brand-logo-mini " style="font-size: 50px !important;" href="index.php">E</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                <?php
                              
                  $select = mysqli_query($con, "select * from tbl_admin");
                  $fetch = mysqli_fetch_assoc($select);

                  if (mysqli_num_rows($select)) {
                                        
                  echo "
                      <h5 class='mb-0 font-weight-normal'>$fetch[Name]</h5>
      
                       ";
                                           
                                        
                                    
                   }
                ?>  
                  
                  <span>Admin</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
              
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items my-3" >
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items my-3" >
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./addcat.php">Add Category</a></li>
                <li class="nav-item"> <a class="nav-link" href="./viewcat.php">View Category</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items my-3" >
            <a class="nav-link" data-toggle="collapse" href="#publish" aria-expanded="false" aria-controls="publish">
              <span class="menu-icon">
              <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Publish</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="publish">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./publishbook.php">Publish Books</a></li>
                <li class="nav-item"> <a class="nav-link" href="./viewbooks.php">View Books</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items my-3" >
            <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
              <span class="menu-icon">
              <i class="mdi mdi-truck-delivery"></i>
              </span>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="orders">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./orders.php">Order Placed</a></li>
                <li class="nav-item"> <a class="nav-link" href="./Order-completed.php">Order Completed</a></li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items my-3" >
            <a class="nav-link" data-toggle="collapse" href="#subscribe" aria-expanded="false" aria-controls="subscribe">
              <span class="menu-icon">
              <i class="mdi mdi-wallet-membership"></i>
              </span>
              <span class="menu-title">Subscribers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="subscribe">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./subscription.php">Subscribed Users</a></li>
                
                
              </ul>
            </div>
          </li>

          <li class="nav-item menu-items my-3" >
            <a class="nav-link" data-toggle="collapse" href="#Competition" aria-expanded="false" aria-controls="Competition">
              <span class="menu-icon">
              <i class="mdi mdi-medal"></i>
              </span>
              <span class="menu-title">Competitions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Competition">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="./Competition.php">Essay Competition</a></li>
                <li class="nav-item"> <a class="nav-link" href="./winner-Competition.php">Competition Winner</a></li>
                
              </ul>
            </div>
          </li>

  
         
         
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
         
            <ul class="navbar-nav navbar-nav-right">
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <?php
                              
                              $select = mysqli_query($con, "select * from tbl_admin");
                              $fetch = mysqli_fetch_assoc($select);
            
                              if (mysqli_num_rows($select)) {
                                                    
                              echo "
                              <p class='mb-0 d-none d-sm-block navbar-profile-name'>$fetch[Name]</p>
                  
                                   ";
                                                       
                                                    
                                                
                               }
                            ?>  
                    
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Profile</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Settings</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="admin_logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      
                      <p class="preview-subject mb-1"> Log out  </p>
                      
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0 text-center">Advanced settings</p>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>

        