<?php

include "admin_header.php";
include "config.php";
if (!isset($_SESSION["admin_name"])) {
    echo "<script>window.location.assign('../index.php')</script>";
}



if (isset($_GET['id'] )) {
    $bid=$_GET['id'];
    $Delete=mysqli_query($con,"DELETE FROM tbl_addbook where Id=$bid");
    if($Delete){
        echo"<script>window.location.assign('viewbooks.php')</script>";
    }
}
?>
<!-- Begin Page Content -->

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Page Heading -->
        <!-- Content Row -->
        <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">Books</h1>
        <div class="container mb-5">
            <table class="table table-success  table-hover ">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="py-4">#</th>
                        <th scope="col" class="py-4">B.Name</th>
                        <th scope="col" class="py-4">B.Price</th>
                        <th scope="col" class="py-4" style="height: 10px !important;">B.Desp</th>
                        <th scope="col" class="py-4">B.Image</th>
                        <th scope="col" class="py-4">B.Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($con, "Select * from tbl_addbook");

                    foreach ($select as $addbook) {
                        echo " <tr>
                    <td>$addbook[Id]</td>
                    <td>$addbook[BName]</td>
                    <td>$addbook[BPrice]</td>
                    <td style='max-width:200px; overflow:hidden;'>$addbook[BDesp]</td>
                    <td ><img src='./img/$addbook[BImage]'  style='border-radius:0% !important; height:70px; witdh:100px;' /></td>
                    <td ><div class='d-flex'>
                    <a href='viewbooks.php?id=$addbook[Id]' class='btn btn-danger me-2 d-flex align-items-center py-3'><i class='me-1 fa fa-solid fa-trash'></i> Delete</a><a href='update.php?Uid=$addbook[Id]' class='btn btn-success d-flex align-items-center py-3' 
                    >
                    <i class='fa fa-regular me-1 fa-pen-to-square'></i> Edit
                </a>
                
                   
                    
                  </tr>";
                    }

                    ?>
                </tbody>
            </table>



        </div>








        <!-- End of Main Content -->

        <?php
        include "admin_footer.php";
        ?>

        <script>
         
            let table = new DataTable('.table');
        </script>