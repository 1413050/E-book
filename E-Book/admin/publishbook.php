<?php
include "config.php";
include "admin_header.php";
if (!isset($_SESSION["admin_name"])) {
    echo"<script>window.location.assign('../index.php')</script>";
  }
?>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="display-1 fw-bolder text-center mb-4 text-gray-800">Publish Books</h1>
            <!-- Content Row -->
            <!---Form---->
            <div class="col-12">


                <form class="row contact_form" action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 form-group p_star">
                        <input type="text" required class="form-control" name="addbook_name" placeholder="Enter Book Name">
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="number" required class="form-control" name="addbook_price" vlue="" placeholder="Add Book Price">
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <!-- <input type="text" required class="form-control"   
                                        placeholder="Add Book Category"> -->
                        <select class="form-select" aria-label="Default select example" name="addbook_category">
                            
                            <?php
                            $select = mysqli_query($con, "Select * from tbl_category");

                            foreach ($select as $addCate) {
                                echo " 
                    
                    
                    <option value='$addCate[Category_Id]' class='bg-transparent'>$addCate[Category_Name]</option>";
                            } ?>
                        </select>
                    </div>

                    <div class="col-md-12 form-group p_star">
                        <textarea name="addbook_desp" class="form-control" placeholder="Add Book Description" rows="10"></textarea>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="file" class="form-control mt-3" name="addbook_img">
                    </div>
                    <div class="col-md-12 form-group d-flex justify-content-center">
                        <input type="submit" value="Add Book" class="btn btn-danger mt-3 " name="addbook_btn">
                    </div>
                </form>
            </div>
        </div>

        <!-----PHP CODE----->
        <?php
        if (isset($_POST['addbook_btn'])) {
            $bn = $_POST['addbook_name'];
            $bp = $_POST['addbook_price'];
            $bd = $_POST['addbook_desp'];
            $bc = $_POST['addbook_category'];
            $bimg = $_FILES['addbook_img']['name'];

            $tmpname = $_FILES['addbook_img']['tmp_name'];
            move_uploaded_file($tmpname, "img/" . $bimg);

            $insert = mysqli_query($con, "insert into tbl_addbook values('null','$bn',$bp,'$bd','$bimg','$bc')");
            if ($insert > 0) {
                echo '
                   <div class="alert alert-success alert-dismissible fade show text-center mx-5" role="alert">
                     <strong>Added!</strong> Your Book has been added.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                ';
            } else {
                echo "product not added";
            }
        }
        ?>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
    include "admin_footer.php";
    ?>