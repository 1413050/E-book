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
            <h1 class="display-1 fw-bolder text-center mb-4 text-gray-800">Update Book Details</h1>
            <!-- Content Row -->
            <!---Form---->
            <div class="col-12">
<?php
if(isset($_GET['Uid'])){
    $updateid=$_GET['Uid'];
    $show=mysqli_query($con,("select * from tbl_addbook where Id='$updateid'"));
    foreach($show as $fetch){
        
        $Cid = $fetch['Cate_Id'];
        $bname = $fetch['BName'];
        $bprice =  $fetch['BPrice'] ;
        $bdesp = $fetch['BDesp'] ;
        $bimg = $fetch['BImage'] ;
    
}
}
?>


                <form class="row contact_form" action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-12 form-group p_star">
                        <input type="text" required class="form-control" name="update_name" placeholder="Enter Book Name" value="<?php echo $bname?>">
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="number" required class="form-control" name="update_price" value="<?php echo $bprice?>" placeholder="Add Book Price" >
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <!-- <input type="text" required class="form-control"   
                                        placeholder="Add Book Category"> -->
                        <select class="form-select" aria-label="Default select example" name="update_category" disabled>
                            
                            <?php
                            $select = mysqli_query($con, "Select * from tbl_category where Category_Id=$Cid");

                            foreach ($select as $addCate) {
                                echo " 
                    
                    
                    <option value='$addCate[Category_Id]' class='bg-transparent'>$addCate[Category_Name]</option>";
                            } ?>
                        </select>
                    </div>

                    <div class="col-md-12 form-group p_star" >
                        <textarea name="update_desp" class="form-control" placeholder="Add Book Description" rows="10"><?php echo $bdesp?></textarea>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <input type="file" class="form-control mt-3" name="update_img" >
                    </div>
                    <div class="col-md-12 form-group d-flex justify-content-center">
                        <input type="submit" value="Add Book" class="btn btn-danger mt-3 " name="update_btn">
                    </div>
                </form>
            </div>
        </div>

        <!-----PHP CODE----->
     
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php
        if (isset($_POST['update_btn'])) {
            $bn = $_POST['update_name'];
            $bp = $_POST['update_price'];
            $bd = $_POST['update_desp'];
            
            $bimg = $_FILES['update_img']['name'];

            $tmpname = $_FILES['update_img']['tmp_name'];
            move_uploaded_file($tmpname, "img/" . $bimg);

            $update = mysqli_query($con, "Update tbl_addbook set BName='$bn',BPrice='$bp',BDesp='$bd',BImage='$bimg' where Id=$updateid");
            if ($update > 0) {
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
    <?php
    include "admin_footer.php";
    ?>