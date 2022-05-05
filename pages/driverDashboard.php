<?php
include 'dbcon.php';
session_start();
$uname = $_SESSION['userName'];
$email = $_SESSION['userEmail'];
$photo = $_SESSION['proPic'];

$res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
while ($r = mysqli_fetch_array($res)) {
  $ademail = $r['email'];
  $adname = $r['username'];
}
if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:home.php");
  die();
} else {
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Driver Dashboard</title>
  </head>

  <body>

    <?php
    include "../assets/templates/driversidebar.php";

    ?>
    <section>
      <div class="container-fluid tableDriver">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Passenger Bookings</h3>
              </div>
              <form action="./"></form>
              <div class="card-body">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Pickup Location</th>
                      <th>Destination Location</th>
                      <th>Pickup Date</th>
                      <th>Pickup Time</th>
                      <th>Amount</th>
                      <th>Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = mysqli_query($con, "SELECT id, pickup, destination, TIME_FORMAT(booking_time, '%h:%i %p') as booking_time, date, amount, bookingStatus, action, vehicleAllocated,distance
                  FROM `booking`
                   WHERE  `bookingStatus`=0 AND `action` != 2");


                    while ($r = mysqli_fetch_array($res)) {

                      $pickup_location = $r['pickup'];
                      $destination_location = $r['destination'];
                      $time = $r['booking_time'];
                      $date = $r['date'];
                      $amount = $r['amount'];
                      $status = ($r['bookingStatus'] != 1) ? '' : 'disabled';
                      $buttonText = ($r['bookingStatus'] != 1) ? 'Accept' : 'Accepted';
                      $bookingId = $r['id'];
                    ?>
                      <tr>
                        <td><?php echo  $pickup_location; ?></td>
                        <td><?php echo $destination_location; ?></td>


                        <td><?php echo $date; ?></td>
                        <td><?php echo  $time; ?></td>

                        <td>Rs&nbsp;<?php echo  $amount; ?></td>


                        <td><Button type="button" name="setStatus" id="setStatus" class="btn btn-success setStatus" <?php echo $status;?> value="<?php echo $bookingId?>"><?php echo $buttonText;?></Button> </td>

                      </tr>
                    <?php

                    }
                    ?>
                    </thead>
                  <tbody>
                </table>


    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        $(".setStatus").click(function() {
          var id = $(this).val();
          var btn = $(this);
          $(this).attr("disabled", true);
          $.ajax({
            url: "setDriverAllocationStatus.php",
            method: "POST",
            data: {
              id: id,
              status:1
            },
            success: function(data) {
              // swal({
              //   title: "Success",
              //   text: "Status Updated",
              //   icon: "success",
              //   button: "OK",
              // });
              btn.html("Accepted");
            }
          });
        });
      });
    </script>
  </body>

  </html>
<?php
}
?>