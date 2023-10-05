<?php

include "config.php";
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-BOOK SHOP</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="E-BOOK" name="Book selling and reading website">

    <!-- Favicon -->
    <link href="./img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   <!-- ---- SUMERNOTE --- -->
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<style>
    .product-img{
position: relative !important;
}

.freebooks{
content:'' !important;
    position: absolute !important;
height:40px !important;
width: 100px !important;
background:red;
top:0px;
right:0;
z-index: 100;
color:white;
clip-path: polygon(100% 0%, 100% 54%, 100% 100%, 25% 100%, 0% 50%, 25% 0%);
}
</style>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">E</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">BOOK</span>
                </a>
            </div>

            <div class="col-4  text-left">
                
            </div>


            <div class="col-4  text-right">
                <?php
                if (!isset($_SESSION['log_name'])) {
                    echo'
                    <div class="btn-group my-2">
                    <button class="btn btn-warning text-white" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up <i class="fa-regular fa-user"></i></button>
                    </div>

                   <div class="btn-group mx-2 my-2">
                    <button class="btn btn-warning text-white " data-bs-toggle="modal" data-bs-target="#login" type="button">Log in <i class="fa fa-sign-in" ></i></button>
                   </div>
                ';
                }else{
                    echo' 
                    <div class="btn-group mx-2 my-2">
                    <button class="btn btn-info text-white " type="button" data-bs-toggle="modal" data-bs-target="#SubscriptionModal">Subscription</button>
                    </div>
                    <div class="btn-group mx-2 my-2">
                    <a href="./logout.php" class="btn btn-danger text-white " type="button">Log Out</a>
                    </div>
                    ';
                }
                
                ?>


            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <?php
                    if (isset($_POST['signin_btn'])) {

                        $sname = $_POST['signin_name'];
                        $semail = $_POST['signin_email'];
                        $spass = $_POST['signin_pass'];
                        $scpass = $_POST['signin_cpass'];

                        if ($spass == $scpass) {

                            $insert = mysqli_query($con, "INSERT INTO tbl_signin VALUES(null,'$sname','$semail','$spass')");
                            echo"<script> 
                            Swal.fire({
                                icon: 'success',
                                title: 'Congrats!',
                                text: 'You are Signed in.',
                               
                              });
                            </script>
                            ";
                        } else {
                                                                                  
                            echo"<script> 
                            Swal.fire({
                                icon: 'error',
                                title: 'Error...',
                                text: 'Password doesn,t match!',
                               
                              });
                            </script>
                            ";
                        }
                    }
                ?>

    <!-- SIGN IN MODAL START -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center bg-black">
                    <h1 class="modal-title text-primary " id="exampleModalLabel">SIGN<span class="text-white">-UP
                            TO</span> <span class="text-white">E</span>-BOOK</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close fs-2"></i></button>
                </div>
                <form method="post">
                    <div class="modal-body">

                        <label for="name" class="form-label mt-2">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                            name="signin_name">

                        <label for="email" class="form-label mt-2">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Your Email"
                            name="signin_email">


                        <label for="pass" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="pass" placeholder="Enter You Password"
                            name="signin_pass">

                        <label for="cpass" class="form-label mt-2">Repeat-Password</label>
                        <input type="password" class="form-control mb-4" id="cpass" placeholder="Repeat-Password"
                            name="signin_cpass">
                    </div>
                    <div class="modal-footer text-white d-flex align-items-center justify-content-center bg-black">


                        <input type="submit" class="btn-outline-primary fs-5 btn  px-5" value="Sign Up"
                            name="signin_btn">


                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- SIGN IN MODAL  -->

    <?php
                                if (isset($_POST['login_btn'])) {
                                    $lemail = $_POST['login_email'];
                                    $lpass= $_POST['login_pass'];

                                    $select = mysqli_query($con, "select * from tbl_admin where Email='$lemail' and Password='$lpass'");
                                    $fetch = mysqli_fetch_assoc($select);

                                    if (mysqli_num_rows($select)) {

                                        $_SESSION["admin_name"]=$fetch["Name"];
                                        if ($fetch['Email'] == 'azmeershah621@gmail.com') {
                                            echo '
                                       <script>window.location.assign("./admin/index.php")</script>
      
                                           ';
                                           
                                        }
                                    }
                                    
                                }
                            ?>
    <?php
                                if (isset($_POST['login_btn'])) {
                                    $lemail = $_POST['login_email'];
                                    $lpass= $_POST['login_pass'];

                                    $select = mysqli_query($con, "select * from tbl_signin where Email='$lemail' and Password='$lpass'");
                                    
                                    $fetch = mysqli_fetch_assoc($select); 
                                   
                                    if (mysqli_num_rows($select)) {
                                        $_SESSION["log_name"]=$fetch["Name"];
                                      
                                            echo "
                                       <script>
                                       Swal.fire({
                                           icon: 'success',
                                           title: 'Welcome!',
                                           text: 'You are Logged in.',
                                           
                                        });
                                        setTimeout(function () {
                                            window.location.assign('index.php');
                                        }, 1000); 
                                        </script>
                                           ";
                                           
                                        
                                    }
                                    else {
                                        echo"
                                        <script>
                                       Swal.fire({
                                           icon: 'error',
                                           title: 'Warning!',
                                           text: 'Error ! Unvalid Email or Password',
                                           
                                        });
                                       
                                        </script>
                                        
                                        ";
                                    }
                                }
                     ?>


    <!-- Log-in Modal start -->
    <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center bg-black">
                    <h1 class="modal-title text-primary " id="exampleModalLabel">LOG<span class="text-white">-IN
                            TO</span> <span class="text-white">E</span>-BOOK</h1>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa fa-close fs-2"></i></button>
                </div>
                <form method="post">
                    <div class="modal-body">


                        <label for="lemail" class="form-label mt-2">Email address</label>
                        <input type="email" class="form-control" id="lemail" placeholder="Enter Your Email"
                            name="login_email">


                        <label for="lpass" class="form-label mt-2">Password</label>
                        <input type="password" class="form-control" id="lpass" placeholder="Enter You Password"
                            name="login_pass">


                    </div>

                    <div class="modal-footer text-white d-flex align-items-center justify-content-center bg-black">


                        <input type="submit" class="btn-outline-primary fs-5 btn  px-5" value="Log in" name="login_btn">


                    </div>

                </form>
            </div>

        </div>
    </div>

    <!-- Log-in Modal end -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                    href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">
                            <?php
                $select=mysqli_query($con,"Select * from tbl_category");
                
                foreach($select as $CateData){
                    echo "<a href='$CateData[Category_Path]?A=$CateData[Category_Id]' class='nav-item nav-link'>$CateData[Category_Name]</a> ";
                }
                
                ?>



                        </div>
                </nav>
            </div>

            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-primary bg-dark px-2">E</span>
                        <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">BOOK</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
                            <?php
                if (isset($_SESSION['log_name'])) {
                    echo'
                            <a href="shop.php" class="nav-item nav-link">Shop</a>

                            <a href="detail.php" class="nav-item nav-link">Shop Detail</a>
                            
                           ';
                }
                ?>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="cart.php" class="btn px-0" role="button">
                                <i class="fas fa-shopping-cart text-primary"></i>

                                <span class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px;">

                                    <?php 
                                $IP=$_SERVER['REMOTE_ADDR'];
                                $select=mysqli_query($con,"select * from tbl_addingcart where IP_Address='$IP'");
                               echo mysqli_num_rows($select);
                                ?>

                                </span>
                            </a>

                        </div>
                    </div>



                    <!-- Modal -->
                    <div class="modal fade" id="SubscriptionModal" tabindex="-1" aria-labelledby="SubscriptionModal"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-black">
                                    <h1 class="modal-title text-primary " id="exampleModalLabel">Subscribe <span
                                            class="text-white">TO</span> <span class="text-white">E</span>-BOOK</h1>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                        aria-label="Close"><i class="fa fa-close fs-2"></i></button>
                                </div>
                                <div class="modal-body">
                                   <form action="" method="post">
                                   <input type="text" name="sname" class="form-control my-3"
                                        placeholder="Enter Your Name" Required>
                                    <input type="email" name="semail" class="form-control my-3"
                                        placeholder="Enter Your Email" Required>
                                    <select name="sselect" class="form-control my-3" id="selectsub" Required>
                                        <option value="">Select Subcription</option>
                                        <option value="3 Months">1 to 3 Months</option>
                                        <option value="6 Months">1 to 6 Months</option>
                                        <option value="1 Year">1 Year</option>
                                    </select>
                                    <?php
                                    // if (isset($_POST['subscribe_btn'])) {
                                    //     $name=$_POST['sname'];
                                    //     $email=$_POST['semail'];
                                    //     $select=$_POST['sselect'];

                                    //     $insert=mysqli_query($con,"INSERT INTO tbl_subscription values ('null','$name','$email','$select',default)");
                                    //     if($insert){
                                    //         echo"<script>
                                    //             Swal.fire({
                                    //             icon: 'info',
                                    //             title: 'Subscription',
                                    //             text: 'Request sended to Admin.',
                                            
                                    //             });
                                    //                 </script>
                                    //                                     ";
                                    //                                 }
                                    //                             }
                         
                            if (isset($_POST['subscribe_btn'])) {
                                $name = $_POST['sname'];
                                $email = $_POST['semail'];
                                $select = $_POST['sselect'];

                                // Calculate the end date based on the selected subscription duration
                                $currentDate = date('Y-m-d'); // Get the current date in YYYY-MM-DD format

                                switch ($select) {
                                    case '3 Months':
                                        $endDate = date('Y-m-d', strtotime($currentDate . ' +3 months'));
                                        break;
                                    case '6 Months':
                                        $endDate = date('Y-m-d', strtotime($currentDate . ' +6 months'));
                                        break;
                                    case '1 Year':
                                        $endDate = date('Y-m-d', strtotime($currentDate . ' +1 year'));
                                        break;
                                    default:
                                        $endDate = null; // Handle the case where no duration is selected
                                        break;
                                }

                                // Insert the subscription details including the end date into the database
                                $insert = mysqli_query($con, "INSERT INTO tbl_subscription (id, name, email, duration, Subscribe_At, End_At) 
                                                            VALUES (null, '$name', '$email', '$select', '$currentDate', '$endDate')");

                                if ($insert) {
                                    echo "<script>
                                            Swal.fire({
                                            icon: 'info',
                                            title: 'Subscription',
                                            text: 'Log in with your email to enjoy subscription',
                                            });
                                        </script>";
                                } else {
                                    // Handle the case where insertion fails
                                    echo "Error: " . mysqli_error($con);
                                }
                            }


                                                                ?>
                                   
                                </div>
                                <div class="modal-footer bg-black">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary"
                                        name="subscribe_btn">Subscribe</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>

                
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->