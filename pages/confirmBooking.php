<?php
include 'dbcon.php';
session_start();
$currentUserId = $_SESSION['userId'];
$uname = $_SESSION['userName'];
$email = $_SESSION['userEmail'];

$res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
while ($r = mysqli_fetch_array($res)) {
  $ademail = $r['email'];
  $adname = $r['username'];
}
if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:home.php");
  die();
} else {
  
    $source = $_POST['from'];
    $destin = $_POST['to'];
    $tim = $_POST['time'];
    $date = $_POST['date'];
    $amnt = $_POST['total'];
    $distance = $_POST['distance'];
    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_id = $_POST['vehicle_id'];
    $vehicle_category = $_POST['vehicle_category'];
    $vehicle_seating_capacity = $_POST['vehicle_seating_capacity'];
    //echo '<script type="text/javascript"> alert("jii")</script>';
  
?>



  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Hello, world!</title>
  </head>

  <body>

    <?php
    include "../assets/templates/usersidebar.php";

    ?>

    <div class="main-booking-container" style="width: 35vw;">

      <div class="container">
        <form method="post" action="#" class="bc-container">
          <h1>Confirm Booking</h1>
          <table>

            <tr>
              <th>Pickup Location :</th>
              <td><?php echo $source; ?></td>
            </tr>
            <tr>
              <th>Destination :</th>
              <td><?php echo $destin; ?></td>
            </tr>
            <tr>
              <th>Total Distance :</th>
              <td><?php echo $distance . ' Km'; ?></td>
            </tr>
            <tr>
              <th>Time :</th>
              <td><?php echo $tim; ?></td>
            </tr>
            <tr>
              <th>Date :</th>
              <td><?php echo $date; ?></td>
            </tr>
            <tr>
              <th>Vehicle :</th>
              <td><?php echo $vehicle_name; ?></td>
            </tr>
            <tr>
              <th>Vehicle Category :</th>
              <td><?php echo $vehicle_category; ?></td>
            </tr>
            <tr>
              <th>Seating Capacity :</th>
              <td><?php echo $vehicle_seating_capacity; ?></td>
            </tr>
            <tr>
              <th>Total Amount :</th>
              <td><?php echo $amnt; ?></td>
            </tr>
          </table>

          <input type="hidden" name="from" value="<?php echo $source;?>">
          <input type="hidden" name="to" value="<?php echo $destin;?>">
          <input type="hidden" name="date" value="<?php echo $date;?>">
          <input type="hidden" name="time" value="<?php echo $tim;?>">
          <input type="hidden" name="distance" value="<?php echo $distance;?>">
          <input type="hidden" name="total" id="total" value="<?php echo $amnt;?>">
          <input type="hidden" name="vehicle_id" value="<?php echo $vehicle_id;?>">

          <!-- <button type="button" name="confirm" class="btn btn1 btn-dark col-5"><a href="../examples/booking_successful.php">Confirm Now</a></button>-->
          <button type="submit" name="confirm" class="btn btn1 btn-dark col-5">Confirm Now</button>
          <input type="button"class="btn btn1 btn-dark col-5" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
        </form>

      </div>

    </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#total').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_fXhZr7JtuE5nxg", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "Ezy Cabs",
                        "description": "Test Transaction",
                        "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>
 
    
  </body>

  </html>
<?php
}
?>


