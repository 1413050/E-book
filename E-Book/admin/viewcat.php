
    <?php 
    
    
         include "config.php";
     include "admin_header.php";
     if (!isset($_SESSION["admin_name"])) {
      echo"<script>window.location.assign('../index.php')</script>";
    }
     if (isset($_GET['catdlt'] )) {
      $id=$_GET['catdlt'];
      $Delete=mysqli_query($con,"DELETE  FROM tbl_category where Category_Id=$id");
      if($Delete){
          echo"<script>window.location.assign('viewcat.php')</script>";
      }
  }
    
  ?>
    
    ?>

      <!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
       <h1 class="display-3 fw-bolder mb-4 text-gray-800 text-center">View Categories</h1>
         <div class="container mb-5">
          <table class="table table-dark text-center text-white">
            <thead>
                <tr>
                    <th  class="text-center text-white" scope="col" >#</th>
                    <th  class="text-center text-white" scope="col" >C.Name</th>
                    <th  class="text-center text-white" scope="col" >C.Path</th>
                    <th  class="text-center text-white" scope="col" >Actions</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $select=mysqli_query($con,"Select * from tbl_category");
                
                foreach($select as $addCate){
                    echo " <tr>
                    <td>$addCate[Category_Id]</td>
                    <td>$addCate[Category_Name]</td>
                    <td>$addCate[Category_Path]</td>
                   
                    <td ><div class='d-flex align-items-center justify-content-center'>
                    <a class='btn btn-danger me-2 d-flex align-items-center py-3' href='viewcat.php?catdlt=$addCate[Category_Id]'><i class='me-1 fa fa-solid fa-trash'></i> Delete</a></div></td>
                   
                    
                  </tr>";
                }
                
                ?>
            </tbody>
           </table>



         </div>
    </div>

            <?php 
     include "admin_footer.php";
    ?>
    
    <script>
        let table = new DataTable('.table');
    </script>
