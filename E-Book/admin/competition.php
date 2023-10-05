<?php

include "admin_header.php";
include "config.php";
if (!isset($_SESSION["admin_name"])) {
    echo"<script>window.location.assign('../index.php')</script>";
  }
?>
<style>
   
        /* width */
        .essay_td p::-webkit-scrollbar {
height:1px;
width: 5px;

}

/* Track */
.essay_td p::-webkit-scrollbar-track {
  background: transparent;
 
}

/* Handle */
.essay_td p::-webkit-scrollbar-thumb {
  background: #ffab00;
  border-radius: 10px;
 
}

/* Handle on hover */
.essay_td p::-webkit-scrollbar-thumb:hover {
  background: #ffab00;
}

.essay_td p{
    max-width: 200px;
    white-space: break-spaces;
    text-align:justify;
      overflow-y: scroll;
       max-height: 100px;
}
.essay_td p span{
   background-color:transparent !important;
}
    
</style>
<!-- Begin Page Content -->

<!-- partial -->
<div class="main-panel ">
    <div class="bg-black" style="    flex-grow: 1 !important; "> 
    <div class="container  content-wrapper h-100">
        <!-- Page Heading -->
        <!-- Content Row -->
        <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">Essay Competition</h1>
        <div class="mb-5 content_scroll pe-5">
            <table class="table table-light table-striped w-100 text-center  table-hover " >
                <thead class="table-dark " >
                    <tr >
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">Email</th>
                        <th class="text-center" scope="col" style="height: 10px !important;">Essay</th>
                        
                        <th class="text-center" scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select = mysqli_query($con, "Select * from tbl_competition where Winner_List='Make Winner'");

                    foreach ($select as $addbook) {
                        echo " <tr>
                    <td>$addbook[Id]</td>
                    <td>$addbook[Name]</td>
                    <td>$addbook[Email]</td>
                    
                    <td class='essay_td' >$addbook[essay]</td>
                    
                    
                    <td >
                    
                    <a class='btn btn-success py-3' href='winner-competition.php?winner=$addbook[Id]'><i class='fa fa-solid fa-medal'></i> $addbook[Winner_List]</a>
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