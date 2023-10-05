
 <?php 
    include "header.php";
    ?>
 

    <!-- Carousel Start -->
    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative active w-100" style="height: 430px;">
                            <img class="position-absolute" src="img/poster-1.jpg" style="object-fit:fill;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Best Selling Books </h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Most purchased and read books of the week.</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#topproducts">Purchase Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/poster-2.jfif" style="object-fit: fill;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Exciting Competetions</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Competetion for kids to write essay in 3hrs of time.</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-bs-toggle="modal" data-bs-target="#CompModal">Participate Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/poster-3.jpeg" style="object-fit: fill;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">Subscribe Now</h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn">Subscribe to read books in pdf form on the website.</p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#" data-bs-toggle="modal" data-bs-target="#SubscriptionModal">Subscribe Now.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/winner.jpg" alt=""  style="object-fit: fill;">
                    <div class="offer-text">
                        <h4 class="text-primary text-uppercase">Winner Of Essay Competetion </h4>
                        <?php
                        $select=mysqli_query($con,"Select * from tbl_competition where Winner_List='Winner'");
                        foreach($select as $winner){
                        echo"<h2 class='text-white mb-3 py-3 text-center'>$winner[Name] <p id='congrats' class='text-black fw-bolder' ></p></h2>";
                        }
                        ?>
                        
                        <p id="congrats_btn" class="btn btn-warning text-white">Congratulations to Winner!🎊</p>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/essaywritting.jpg" alt="" style="object-fit: fill;">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Competetion</h6>
                        <h3 class="text-white mb-3">Essay Writting </h3>
                        <a href="#!" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CompModal">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="CompModal" tabindex="-1" aria-labelledby="CompModal"
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
                                          <label class="mt-3" for="name">Name*</label>
                                   <input type="text" name="cname" id="name" class="form-control mb-3 py-4 rounded-2"
                                        placeholder="Enter Your Name" Required>

                                        <label class="mt-3" for="age">Age*</label>
                                   <input type="number" name="cage" id="age" class="form-control mb-3 py-4 rounded-2"
                                        placeholder="Enter Your Age" Required>

                                        <label class="mt-3" for="email">Email*</label>
                                    <input type="email" name="cemail" id="email" class="form-control mb-3 py-4 rounded-2"
                                        placeholder="Enter Your Email" Required>

                                        <label class="mt-3" for="password">Password*</label>
                                    <input type="password" id="password" name="cpass" class="form-control mb-3 py-4 rounded-2"
                                        placeholder="Enter Your Password" Required>

                                        <label class="mt-3" for="edu">Education*</label>
                                    <input type="text" name="cedu" id="edu" class="form-control mb-3 py-4 rounded-2"
                                        placeholder="Enter Your Education" Required>
                                    
                                    <textarea name="essay" class="d-none form-control" cols="30" rows="10">essay</textarea>
                                    
                                    <?php
                                     if (isset($_POST['registration_btn'])) {
                                        
                                        $name=$_POST['cname'];
                                        $age=$_POST['cage'];
                                        $email=$_POST['cemail'];
                                        $pass=$_POST['cpass'];
                                        $edu=$_POST['cedu'];
                                        $docx=$_POST['essay'];

                                        if($age <= 18){
                                            $insert=mysqli_query($con,"INSERT INTO tbl_competition values ('null','$name','$age','$email','$pass','$edu',$docx,'Make Winner')");
                                            
                                            echo"<script>window.location.assign('competition.php?name=$name')</script>";
                                            
                                            
                                                   
                                                                    }else{
                                                                        echo"
                                            <script>
                                                Swal.fire({
                                                icon: 'error',
                                                title: 'You Are Older',
                                                text: 'Only under 18 is allowed!',
                                            
                                                });
                                                
                                                    </script>";
                                                                    }
                                     }
                                    ?>
                                   
                                </div>
                                <div class="modal-footer bg-black">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-outline-primary"
                                        name="registration_btn"> Register</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
    <!-- Carousel End -->



    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">
            
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/kids_story-5.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Kids Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/horror_1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Horror Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/comic-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Comic Books</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/fictional_story-1.webp" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Fictional Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/romantic-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Romantic Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/historical-3.webp" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Historical Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/action-1.jpg" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Action Stories</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
        
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 150px;">
                            <img class="img-fluid" src="./admin/img/education-1.png" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>Educational Books</h6>
                            
                        </div>
                    </div>
                </a>
            </div>
           
        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4" id="topproducts"><span class="bg-secondary pr-3">Top Rated Books</span></h2>
        <div class="row px-xl-5" >
            <?php
            $cardcounter=0;
          $select=mysqli_query($con,'SELECT * From tbl_addbook');

          foreach($select as $bookdata) {
           
         echo"

             <div class='col-lg-3 col-md-4 col-sm-6 pb-1'>
                <div class='product-item bg-light mb-4' style='width:250px !important;'>
                    <div class='product-img position-relative overflow-hidden' >
                    <div class='freebooks text-center '><a class='py-2 btn text-white' href='./admin/img/story.pdf' target='gh'>Free Pdf</a></div>
                        <img class='img-fluid w-100' src='./admin/img/$bookdata[BImage]' alt='' style='height:300px;'>
                      
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
            $cardcounter++;
            if ( $cardcounter==8) {
                break;
            }
        }

            ?>
          
        </div>
    </div>
    <!-- Products End -->


   

    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <?php 
    include "footer.php";
    ?>

    <script>
        $('#congrats_btn').click(()=>{
$('#congrats').text('CONGRATS 🥳');
$('#congrats_btn').hide();
        })
    </script>