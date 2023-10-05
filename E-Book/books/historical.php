<?php
include "books_header.php";
if (!isset($_SESSION['log_name'])) {
    echo " <script>
    Swal.fire({
        icon: 'warning',
        title: 'Log In!',
        text: 'Login first to get access!',
        
     });
     setTimeout(function () {
         window.location.assign('../index.php');
     }, 500); 
     </script>
        ";
}
?>




<div class="container pt-5 pb-3">
    <p class="display-3 fw-bolder text-black text-center" style="font-family: 'Roboto',sans-serif !important;">Historical Books</p>
    <div class="row px-xl-5 mt-5 ">
        <?php
        if (isset($_GET['A'])) {
            $category_id = $_GET['A'];
            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=$category_id");
            foreach ($select as $DataBook) {

                echo "

            <div class='col-md-4 col-sm-6 pb-1'>
                <div class='product-item bg-light mb-4' style='width:250px !important;'>
                    <div class='product-img position-relative overflow-hidden' >
                        <img class='img-fluid w-100' src='../admin/img/$DataBook[BImage]' alt='' style='height:300px;'>
                      
                    </div>
                    <div class='text-center py-4'>
                        <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                        <div class='d-flex align-items-center justify-content-center mt-2'>
                            <h5>$$DataBook[BPrice]</h5>

                        </div>
                        <div class='bookcart'>
                        <a class='btn btn-outline-dark' href='../detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                        </div>

                    </div>
                </div>
            </div>
            ";
            }
        } else {
            echo "Go Ahead";
        }
        ?>

    </div>
</div>



<?php
include "books_footer.php";
?>