<?php

include "admin_header.php";
include "config.php";
if (!isset($_SESSION["admin_name"])) {
    echo"<script>window.location.assign('../index.php')</script>";
  }
?>
<style>
    .content-wrapper{
        overflow-x: scroll;
    }
        /* width */
        .content-wrapper::-webkit-scrollbar {
height:10px;
width: 10px;

}

/* Track */
.content-wrapper::-webkit-scrollbar-track {
  background: #000;
 
}

/* Handle */
.content-wrapper::-webkit-scrollbar-thumb {
  background: #ffab00;
  border-radius: 30px;
 
}

/* Handle on hover */
.content-wrapper::-webkit-scrollbar-thumb:hover {
  background: #ffab00;
}
    td{
        max-width: 200px;
    }
</style>
<!-- Begin Page Content -->

<!-- partial -->
<div class="main-panel ">
    <div class="bg-black" style="    flex-grow: 1 !important; "> 
    <div class="container  content-wrapper h-100">
        <!-- Page Heading -->
        <!-- Content Row -->
        <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">Order Placed</h1>
        <div class="mb-5 content_scroll pe-5">
            <table class="table table-success table-striped w-100 text-center  table-hover " >
                <thead class="table-dark " >
                    <tr >
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col" style="height: 10px !important;">Mobile_Number</th>
                        <th class="text-center" scope="col">Adress</th>
                      
                        <th class="text-center" scope="col">City,Country</th>
                        <th class="text-center" scope="col">State</th>
                        <th class="text-center" scope="col">Cash On Delivery</th>
                        <th class="text-center" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($con, "Select * from tbl_orders where Status='Deliver Now!'");

                    foreach ($select as $addbook) {
                        echo " <tr>
                    <td>$addbook[Id]</td>
                    <td>$addbook[Name]</td>
                    <td>$addbook[Email]</td>
                    <td>$addbook[Mobile_Number]</td>
                    <td>$addbook[Address_1]</td>
                    <td style='overflow:hidden;'>$addbook[City_Country]</td>
                    <td>$addbook[State]</td>
                    <td>$addbook[CashOnDelivery]</td>
                    <td >
                    
                    <a class='btn btn-success py-3' href='Order-completed.php?status=$addbook[Id]'><i class='fa fa-solid fa-truck'></i> $addbook[Status]</a>
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