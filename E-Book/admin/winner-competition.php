<?php

include "admin_header.php";
include "config.php";
if (!isset($_SESSION["admin_name"])) {
    echo"<script>window.location.assign('../index.php')</script>";
  }
  if(isset($_GET['winner'])){
      $winner_id=$_GET['winner'];
      $update=mysqli_query($con,"Update tbl_competition set Winner_List='Winner' where Id=$winner_id ");
    }

    if (isset($_GET['winner_name'] )) {
      $wd=$_GET['winner_name'];
      $Delete=mysqli_query($con,"DELETE FROM tbl_competition where Name='$wd'");
      if($Delete){
          echo"<script>window.location.assign('winner-competition.php')</script>";
      }
  }
?>

<!-- Begin Page Content -->

<!-- partial -->
<div class="main-panel ">
    <div class="content-wrapper" > 
    <div class="container ">
        <!-- Page Heading -->
        <!-- Content Row -->
        <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">Competiton winners</h1>
        <div class="mb-5 content_scroll pe-5">
            <table class="table table-success table-striped w-100 text-center  table-hover " >
                <thead class="table-dark text-center" >
                    <tr >
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Age</th>
                        <th class="text-center" scope="col">Email</th>
                        
                        <th class="text-center" scope="col">Winners</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter=0;
                    $select = mysqli_query($con, "Select * from tbl_competition where Winner_List='Winner'");

                    foreach ($select as $addbook) {
                        echo " <tr>
                    <td class='py-4'>$addbook[Id]</td>
                    <td class='py-4'>$addbook[Name]</td>
                    <td class='py-4'>$addbook[Age]</td>
                    <td class='py-4'>$addbook[Email]</td>
                    
                    
                    
                    <td class='py-4'>
                    <div class='d-flex align-items-center justify-content-center'>
                    
                    <a class='btn btn-success disabled d-flex align-items-center py-3'><i class='fa fa-solid fa-medal'></i>$addbook[Winner_List]</a>
                    <a class='btn btn-danger  d-flex align-items-center py-3 ms-2' href='winner-competition.php?winner_name=$addbook[Name]'><i class='fa fa-solid fa-trash'></i>Delete</a></div>

                    </td>
                   
                    
                  </tr>";
                  $counter++;
                  if ( $counter==1) {
                      break;
                  }
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
        
 