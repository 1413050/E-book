<?php
include "header.php";
if (!isset($_SESSION['log_name'])) {
    echo " <script>
    Swal.fire({
        icon: 'warning',
        title: 'Log In!',
        text: 'Login first to get access!',
        
     });
     setTimeout(function () {
         window.location.assign('index.php');
     }, 500); 
     </script>
        ";
}
?>



<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop List</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-4">
            <!-- Price Start -->
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by
                    CateGory</span></h5>
            <div class="bg-light p-4 mb-30">
                <form>



                    <div class="d-flex  justify-content-center">
                        <div class="nav flex-column nav-pills me-3 text-black" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active px-5 text-black my-2 border-2 border-black border"
                                id="v-pills-all-tab" data-bs-toggle="pill" data-bs-target="#v-pills-all" type="button"
                                role="tab" aria-controls="v-pills-all" aria-selected="true">All Books</button>

                            <?php
                            $select = mysqli_query($con, "Select * from tbl_category");

                            foreach ($select as $CateData) {
                                echo "
                    <button class='nav-link px-5 text-black my-2 border-2 border-black border' id='v-pills-$CateData[Category_Name]-tab' data-bs-toggle='pill'
                    data-bs-target='#v-pills-$CateData[Category_Name]' type='button' role='tab' aria-controls='v-pills-$CateData[Category_Name]'
                    aria-selected='true'>$CateData[Category_Name] Books</button>
                    ";
                            }

                            ?>

                        </div>

                    </div>
                </form>
            </div>
            <!-- Price End -->



        </div>
        <!-- Shop Sidebar End -->


        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div>
                            <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                            <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                        </div>
                        <form method="post" class="subscribedemail d-flex">
                            <input type="email" class="form-control" placeholder="Enter Subscribed Email" name="subsemail"><button type="submit" class="btn btn-primary" name="subsbtn">Submit</button> </form>

                        <?php
                                if (isset($_POST['subsbtn'])) {
                                    $subemail = $_POST['subsemail'];
                                   

                                    $select = mysqli_query($con, "select * from tbl_subscription where Email='$subemail'");
                                    
                                    $fetch = mysqli_fetch_assoc($select); 
                                   
                                    if (mysqli_num_rows($select)) {
                                        $_SESSION["subsmail"]=$fetch["Email"];
                                      
                                            echo "
                                       <script>
                                      
                                        
                                            window.location.assign('shop.php');
                                      
                                        </script>
                                           ";
                                       
                                    }
                                    else {
                                        echo"
                                        <script>
                                       Swal.fire({
                                           icon: 'error',
                                           title: 'Warning!',
                                           text: 'Error ! This Email is not subscribed',
                                           
                                        });
                                       
                                        </script>
                                        
                                        ";
                                    }     
                                      
                                }
                     ?>

                    </div>
                </div>


                <div class="tab-content row" id="v-pills-tabContent">


                    <div class="tab-pane fade show active  " id="v-pills-all" role="tabpanel"
                        aria-labelledby="v-pills-all-tab" tabindex="0">

                        <div class="row">
                            <?php
                            // Set the number of items per page
                            $itemsPerPage = 6;

                            // Calculate the total number of products
                            $totalProducts = mysqli_num_rows(mysqli_query($con, 'SELECT * FROM tbl_addbook'));

                            // Calculate the total number of pages
                            $totalPages = ceil($totalProducts / $itemsPerPage);

                            // Get the current page number from the URL parameter
                            $currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Calculate the offset for the SQL query
                            $offset = ($currentpage - 1) * $itemsPerPage;

                            // Retrieve limited product data based on the current page
                            $select = mysqli_query($con, "SELECT * FROM tbl_addbook LIMIT $offset, $itemsPerPage");

                            foreach ($select as $bookdata) {

                                echo "

                                        <div class='col-lg-4 col-md-4 col-sm-6 pb-1'>
                                            <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                                <div class='product-img position-relative overflow-hidden' >
                                                ";
                                                if(isset($_SESSION['subsmail'])){
                                                    echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                                }

                                               echo"     <img class='img-fluid w-100' src='./admin/img/$bookdata[BImage]' alt='' style='height:250px;'>
                                            
                                               </div>
                                               <div class='text-center py-4'>
                                               <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$bookdata[BName]</p>
                                                   <div class='d-flex align-items-center justify-content-center mt-2'>
                                                       <h5>$$bookdata[BPrice]</h5>

                                                   </div>

                                                   <div class='bookcart'>
                                                   <a class='btn btn-outline-dark' href='./detail.php?SId=$bookdata[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                   </div>

                                           </div>
                                           </div>
                                       </div>
                                   ";
                                                    
                            }

                            ?>
                            <div class="col-12">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item <?php if ($currentpage == 1) echo 'disabled'; ?>">
                                            <a class="page-link"
                                                href="?page=<?php echo $currentpage - 1; ?>">Previous</a>
                                        </li>
                                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                        <li class="page-item <?php if ($currentpage == $i) echo 'active'; ?>">
                                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        </li>
                                        <?php } ?>
                                        <li
                                            class="page-item <?php if ($currentpage == $totalPages) echo 'disabled'; ?>">
                                            <a class="page-link" href="?page=<?php echo $currentpage + 1; ?>">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Display pagination links -->

                    </div>


                    <div class="tab-pane fade  " id="v-pills-Fictional" role="tabpanel"
                        aria-labelledby="v-pills-Fictional-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=1");
                            foreach ($select as $DataBook) {

                                echo "

                                <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                    <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                        <div class='product-img position-relative overflow-hidden' >
                                        ";
                                        if(isset($_SESSION['subsmail'])){
                                            echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                        }

                                       echo"
                                            <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                        
                                        </div>
                                        <div class='text-center py-4'>
                                            <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                            <div class='d-flex align-items-center justify-content-center mt-2'>
                                                <h5>$$DataBook[BPrice]</h5>

                                            </div>

                                            <div class='bookcart'>
                                            <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                ";
                            }

                            ?>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="v-pills-Romantic" role="tabpanel"
                        aria-labelledby="v-pills-Romantic-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=2");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-Horror" role="tabpanel" aria-labelledby="v-pills-Horror-tab"
                        tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=3");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-Historical" role="tabpanel"
                        aria-labelledby="v-pills-Historical-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=4");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="v-pills-Action" role="tabpanel" aria-labelledby="v-pills-Action-tab"
                        tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=5");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                        <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                        </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-Educational" role="tabpanel"
                        aria-labelledby="v-pills-Educational-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=6");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>
                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-KidStories" role="tabpanel"
                        aria-labelledby="v-pills-KidStories-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=11");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="v-pills-Comics" role="tabpanel"
                        aria-labelledby="v-pills-Comics-tab" tabindex="0">
                        <div class="row">
                            <?php


                            $select = mysqli_query($con, "SELECT * From tbl_addbook where Cate_Id=12");
                            foreach ($select as $DataBook) {

                                echo "

                                    <div class='col-md-4 col-lg-4  col-sm-6 pb-1'>
                                        <div class='product-item bg-light mb-4' style='width:250px !important;'>
                                            <div class='product-img position-relative overflow-hidden' >
                                            ";
                                            if(isset($_SESSION['subsmail'])){
                                                echo"  <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>";
                                            }

                                           echo"
                                                <img class='img-fluid w-100' src='./admin/img/$DataBook[BImage]' alt='' style='height:250px;'>
                                            
                                            </div>
                                            <div class='text-center py-4'>
                                                <p class='h5 text-decoration-none text-primary text-uppercase' href=''>$DataBook[BName]</p>
                                                <div class='d-flex align-items-center justify-content-center mt-2'>
                                                    <h5>$$DataBook[BPrice]</h5>

                                                </div>

                                                <div class='bookcart'>
                                                <a class='btn btn-outline-dark' href='./detail.php?SId=$DataBook[Id]'><i class='fa fa-shopping-cart'></i> Add To Cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    ";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->
<?php
include "footer.php";
?>