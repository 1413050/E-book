<?php

include "admin_header.php";
include "config.php";
if (!isset($_SESSION["admin_name"])) {
    echo"<script>window.location.assign('../index.php')</script>";
  }
  if(isset($_GET['status'])){
    $status_id=$_GET['status'];
    $update=mysqli_query($con,"Update tbl_orders set Status='Delivered' where Id=$status_id ");
  }
?>

<!-- Begin Page Content -->

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper" > 
    <div class="container ">
        <!-- Page Heading -->
        <!-- Content Row -->
        <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">Order Delivered Placed</h1>
        <div class="mb-5 content_scroll pe-5">
            <table class="table table-success table-striped w-100 text-center  table-hover " >
                <thead class="table-dark text-center" >
                    <tr >
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col" style="height: 10px !important;">Mobile_Number</th>
                        <th class="text-center" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($con, "Select * from tbl_orders where Status='Delivered'");

                    foreach ($select as $addbook) {
                        echo " <tr>
                    <td>$addbook[Id]</td>
                    <td>$addbook[Name]</td>
                    <td>$addbook[Email]</td>
                    <td>$addbook[Mobile_Number]</td>
                    
                    
                    <td >
                    <div class='d-flex align-items-center flex-column'>
                    
                    <a class='btn btn-primary disabled d-flex align-items-center py-3'><i class='fa fa-solid fa-truck'></i>$addbook[Status]</a></div>
                    </td>
                   
                    
                  </tr>";
                    }

                    ?>
                </tbody>
            </table>



        </div>

        <!-- Content Row -->

    </div>
    </div>



        <!-- End of Main Content -->

        <?php
        include "admin_footer.php";
        ?>
        
    <script>
        let table = new DataTable('.table');
    </script>