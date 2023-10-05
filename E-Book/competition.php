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
<style>
    .note-editing-area{
        height: 100vh !important;
    }
    
    .d{
        display: none;
    }
</style>


<div class="container">
    <div class="row">
    <p class="display-3 fw-bolder text-black text-center" style="font-family: 'Roboto',sans-serif !important;">Essay Competetiion</p>
        <div class="col  ">
            <div class="d-flex align-items-center justify-content-center">
                
            <button class="btn btn-outline-dark my-5 btn-lg fs-1 " id="start-comp">Start Now <i class="fa-solid fa-hourglass-start ms-2" ></i></button>

            </div>
<form method="post" class="d" id="competition_form">
    <div class="time_counter d-flex align-items-center justify-content-end my-4">
<button class=" btn btn-danger px-3 py-2" id="timer" type="button"> </button>
    </div>

    <textarea name="essay"  id="competetion_summernote" cols="30" rows="50"></textarea>
    
<div class="d-flex align-items-center justify-content-center">
<button class="btn btn-primary my-5 btn-lg fs-1" id="submitEssay" name="submit_essay">Submit Now</button>
</div>
</form>
<?php
// if(isset($_POST['submit_essay'])){
//     $name=$_GET['name'];
//     $essay=$_POST['essay'];
//     // $update=mysqli_query($con,"update tbl_competition set essay='$essay' where Name='$name'");
//     $update = mysqli_query($con, "UPDATE tbl_competition SET essay = '$essay' WHERE Name = '$name'");
//     if($update){
//         echo"<script>window.location.assign('./index.php')</script>";
//     }
// }

if (isset($_POST['submit_essay'])) {
    $name = $_GET['name'];
    $essay = $_POST['essay'];

    // Create a prepared statement
    $stmt = $con->prepare("UPDATE tbl_competition SET essay = ? WHERE Name = ?");

    // Bind parameters
    $stmt->bind_param("ss", $essay, $name);

    // Execute the statement
    if ($stmt->execute()) {
        echo " <script>
        Swal.fire({
            icon: 'success',
            title: 'Submitted!',
            text: 'Essay Submitted Successfully!',
            
         });
         setTimeout(function () {
             window.location.assign('index.php');
         }, 2000); 
         </script>
            ";
    } else {
        // Handle any errors that occur during execution
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

?>

        </div>
    </div>
</div>


<?php 
include "footer.php";
?>
<script>
     $(document).ready(function() {
        $('#start-comp').click(()=>{
            var timer;

var timeLeft = 10800;

            $('#competition_form').css("display","block");
            $('#start-comp').hide();
            function updateTimer() {
                var minutes = Math.floor(timeLeft / 60);
                var seconds = timeLeft % 60;
                $('#timer').text(minutes + ':' + (seconds < 10 ? '0' : '') + seconds + ' Time Left');
            }
            updateTimer();
            
    // Start the timer when the "Submit" button is clicked
    $('#submitEssay').click(function() {
        if (timeLeft > 0) {
            // Stop the timer
            clearInterval(timer);
            // Submit the essay
            $('#competition_form').submit();
        }
    });

    // Update the timer every second
    timer = setInterval(function() {
        if (timeLeft > 0) {
            timeLeft--;
            updateTimer();
        } else {
            // Time is up, automatically submit the essay
            // submitEssay();
            $('#submitEssay').click();
            clearInterval(timer);
        }
    }, 1000);
        })

  // 3 minutes in seconds

    // Update the timer display
  

    // Start the timer when the page loads
 

    // Function to submit the essay
    // function submitEssay() {
    //     var essayData = $('#essay').val();

        // Send the essay data to the PHP script for processing
        // $.ajax({
        //     url: 'submit_essay.php',
        //     type: 'POST',
        //     data: { essay: essayData },
        //     success: function(response) {
        //         // Handle the response from the server (e.g., display a confirmation message)
        //         alert(response);
        //     },
        //     error: function() {
        //         alert('Error submitting the essay.');
        //     }
        // });
    // }

});


    $(document).ready(function() {
        $("#competetion_summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>