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
                <span class="breadcrumb-item active">Checkout</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="container-fluid">
 <form method="post">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Name</label>
                        <input class="form-control py-3 rounded-1" type="text" placeholder="Enter Your Name" name="fname" required>
                    </div>
                    
                    <div class="col-md-12 form-group">
                        <label>E-mail</label>
                        <input class="form-control py-3 rounded-1" type="email" placeholder="example@email.com" name="email" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Mobile No</label>
                        <input class="form-control py-3 rounded-1" type="tel" placeholder="+123 456 789" name="mobile" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Address To Deliver</label>
                        <input class="form-control py-3 rounded-1" type="text" placeholder="123 Street" name="address1" required >
                    </div>
                    
                    <div class="col-md-12 form-group">
                        <label>Country</label>
                        <input class="form-control py-3 rounded-1" type="text" placeholder="Enter Country Name" name="country" required>
                    </div> 
                    <div class="col-md-12 form-group">
                        <label>City</label>
                        <input class="form-control py-3 rounded-1" type="text" placeholder="Enter City Name" name="city" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label>State</label>
                        <input class="form-control py-3 rounded-1" type="text" placeholder="Enter State Name" name="state" required>
                    </div>
                    
                    
                    <!-- <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div> -->
                </div>
            </div>




            <!-- <div class="collapse mb-5" id="shipping-address">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                <div class="bg-light p-30">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">

                    <h6 class="mb-3">Products</h6>
                    <?php
                    $IP = $_SERVER['REMOTE_ADDR'];
                    $selectdata = mysqli_query($con, "Select * from tbl_addingcart where IP_Address='$IP'");
                    $fetch = mysqli_fetch_assoc($select);
                    foreach ($selectdata as $getdata) {
                        echo "

      
        <div class='d-flex justify-content-between'>
            <p>$getdata[BName]</p>
            <p>$$getdata[Bprice]</p>
        </div>
    ";
                    }

                    ?>

                </div>
                <div class="border-bottom pt-3 pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <?php
                        $IP = $_SERVER['REMOTE_ADDR'];
                        $select=mysqli_query($con,"Select SUM(Bprice) from tbl_addingcart where IP_Address='$IP'");
                        
                        $result=mysqli_fetch_assoc($select);
                        $subtotal = $result['SUM(Bprice)'] ?: 0;
                        ?>
                       <h6 >$<span id="sub_total"><?php echo $subtotal; ?> </span></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium" >$<span id="cart_shipping">10</span> </h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="total_Cart"></h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                <div class="bg-light p-30">

                    <div class="form-group mb-4">
                        <div class="custom-control custom-radio">
                            <input type="radio" value="Yes" class="custom-control-input" name="payment" id="banktransfer" checked>
                            <label class="custom-control-label" for="banktransfer">Cash on Delivery</label>
                        </div>
                    </div>
                    <input class="btn btn-block btn-primary font-weight-bold py-3" name="order_btn" type="submit" value="Place Order">
                </div>
            </div>
        </div>
    </div>
 </form>
</div>



<!-- INSERT DATA IN TBL ORDERS -->

<?php
if(isset($_POST['order_btn'])){
$fname=$_POST['fname'];

$email=$_POST['email'];
$pnumber=$_POST['mobile'];
$address1=$_POST['address1'];
$country=$_POST['country'];
$city=$_POST['city'];
$state=$_POST['state'];

$pay=$_POST['payment'];


$insert=mysqli_query($con,"insert into tbl_orders values ('null','$fname','$email','$pnumber','$address1','$city,$country','$state','$pay','Deliver Now!',default)");
if($insert){
    
    echo"<script> Swal.fire(
        'Your Order has been placed!',
        'Continue Shopping',
        'success'
      )
     
      </script>";

      $IP = $_SERVER['REMOTE_ADDR'];
      $Delete=mysqli_query($con,"DELETE FROM tbl_addingcart where IP_Address='$IP'");
      echo "<meta http-equiv='refresh' content='2;url=shop.php' />";

}
else
{
    echo"ERROR OCCURS";
}
}

?>
<!-- Checkout End -->

<?php
include "footer.php";
?>

   
  // Set the initial value of total cart to $0
  var total_amount = $('#total_Cart');
    total_amount.text('$0');

    // Attempt to parse the sub_total and cart_shipping values
    let ST = parseFloat($('#sub_total').text()) || 0; // Default to 0 if parsing fails
    let CS = parseFloat($('#cart_shipping').text()) || 0; // Default to 0 if parsing fails
    let total_cart = ST + CS;

    // Update the total cart amount
    total_amount.text('$' + total_cart);
</script>

