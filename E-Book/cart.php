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


if (isset($_GET['cartdlt'] )) {
    $Cd=$_GET['cartdlt'];
    $Delete=mysqli_query($con,"DELETE FROM tbl_addingcart where Cid=$Cd");
    if($Delete){
        echo"<script>window.location.assign('cart.php')</script>";
    }
}
?>


<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->



<!-- Cart Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">


                <?php
$IP = $_SERVER['REMOTE_ADDR'];
$selectdata = mysqli_query($con, "Select * from tbl_addingcart where IP_Address='$IP'");
$fetch=mysqli_fetch_assoc($select);
if(mysqli_num_rows($selectdata)==0 ){
    echo"<h1 class='text-danger'>Your Cart is Empty Start Shopping Now!</h1>";

    
}else{
    foreach ($selectdata as $getdata) {
        echo "
    
            <tr>
                <td class='align-middle'><img src='./admin/$getdata[Image]' alt='' style='width: 50px;'> $getdata[BName]</td>
                <td class='align-middle'>$getdata[Bprice]</td>
                <td class='align-middle'>
                    <div class='input-group quantity mx-auto' style='width: 100px;'>
                        
                         <input type='number' class='form-control form-control-sm bg-transparent border-0 text-center disabled' value='1' disabled>
                       
                       
                    </div>
                </td>
                <td class='align-middle'>$getdata[Bprice]</td>
                <td class='align-middle'><a href='cart.php?cartdlt=$getdata[Cid]' class='btn btn-sm btn-danger'><i class='fa fa-times'></i></button></td>
            </tr>
        ";
    }   
}
?>





                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
    <form class="mb-30" action=""></form>
    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
    <?php
        $IP = $_SERVER['REMOTE_ADDR'];
        $select = mysqli_query($con, "Select SUM(Bprice) from tbl_addingcart where IP_Address='$IP'");

        $result = mysqli_fetch_assoc($select);
        $subtotal = $result['SUM(Bprice)'] ?: 0; // Default to 0 if no data is available
    ?>
    <div class="bg-light p-30 mb-5">
        <div class="border-bottom pb-2">
            <div class="d-flex justify-content-between mb-3">
                <h6>Subtotal</h6>
                <h6>$<span id="sub_total"><?php echo $subtotal; ?></span></h6>
            </div>
            <div class="d-flex justify-content-between">
                <h6 class="font-weight-medium">Shipping</h6>
                <h6 class="font-weight-medium">$<span id="cart_shipping">10</span></h6>
            </div>
        </div>

        <div class="pt-2">
            <div class="d-flex justify-content-between mt-2">
                <h5>Total</h5>
                <h5 id="total_Cart">$0</h5>
            </div>
            <a href="./checkout.php" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
        </div>
    </div>
</div>
</div>
</div>
<!-- Cart End -->

<?php
include "footer.php";
?>
<script>
$(document).ready(function () {
    // Set the initial value of total cart to $0
    var total_amount = $('#total_Cart');
    total_amount.text('$0');

    // Attempt to parse the sub_total and cart_shipping values
    let ST = parseFloat($('#sub_total').text()) || 0; // Default to 0 if parsing fails
    let CS = parseFloat($('#cart_shipping').text()) || 0; // Default to 0 if parsing fails
    let total_cart = ST + CS;

    // Update the total cart amount
    total_amount.text('$' + total_cart);
});
</script>
