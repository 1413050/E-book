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
                        <th class="text-center" scope="col" style="height: 10px !important;">Duration</th>
                        <th class="text-center" scope="col">Payment</th>
                      
                        <th class="text-center" scope="col">Subscribe_At</th>
                        <th class="text-center" scope="col">Valid_Upto</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Get the current date
$currentDate = date('Y-m-d');

// Select subscriptions that have expired
$query = "SELECT * FROM tbl_Subscription WHERE End_At <= '$currentDate'";
$result = mysqli_query($con, $query);


// Loop through and delete expired subscriptions
while ($row = mysqli_fetch_assoc($result)) {
    $subscriptionId = $row['Id'];
    
    // Delete the subscription record
    $deleteQuery = "DELETE FROM tbl_Subscription WHERE Id = $subscriptionId";
    $deleteResult = mysqli_query($con, $deleteQuery);
   
}
                    $select = mysqli_query($con, "Select * from tbl_Subscription ");


                    foreach ($select as $subs) {

                        echo " <tr>
                    <td>$subs[Id]</td>
                    <td>$subs[Name]</td>
                    <td>$subs[Email]</td>
                    <td>$subs[Duration]</td>
                    <td><p class='bg-success'>Recieved</p></td>
                    
                    <td>$subs[Subscribe_At]</td>
                    <td>$subs[End_At]</td>
                  
                   
                    
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