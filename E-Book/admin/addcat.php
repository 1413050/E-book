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
    <h1 class="display-1 fw-bolder text-center mb-4 text-gray-800">Add Books Category</h1>

    <div class="container">
        <form class="row contact_form" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12 form-group p_star">
                <input type="text" required class="form-control" name="addcategory_name" placeholder="Enter New Category">
            </div>
            <div class="col-md-12 form-group p_star">
                <input type="file" required class="form-control" name="addcategory_path" placeholder="Enter Category Path">
            </div>

            <div class="col-md-12 form-group d-flex justify-content-center">
                <input type="submit" value="Add Category" class="btn btn-danger mt-3 " name="addcategory_btn">
            </div>
        </form>
        <?php
        if (isset($_POST['addcategory_btn'])) {
            $cn = $_POST['addcategory_name'];
            $cfile = $_FILES['addcategory_path']['name'];

            $tmpname = $_FILES['addcategory_path']['tmp_name'];
            move_uploaded_file($tmpname,"../books/".$cfile);
            $insert = mysqli_query($con, "insert into tbl_category values('null','$cn','./books/$cfile')");
            if ($insert > 0) {
                echo '
                   <div class="alert alert-success alert-dismissible fade show text-center mx-5" role="alert">
                     <strong>Added!</strong> Your Category has been added.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                ';
            } else {
                echo "product not added";
            }
        }
        ?>
    
    </div>
</div>
          

    <!-- /.container-fluid -->


<!-- End of Main Content -->


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <?php
       
          include "admin_footer.php";
          ?>