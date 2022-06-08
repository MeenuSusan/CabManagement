<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:../index.php");
  die();
} else {
  include 'dbcon.php';
  $uname = $_SESSION['userName'];
  $email = $_SESSION['userEmail'];
  $photo = $_SESSION['proPic'];
  $currentUserId = $_SESSION['userId'];
  $res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
  while ($r = mysqli_fetch_array($res)) {
    $ademail = $r['email'];
    $adname = $r['username'];
  }
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
    <title>Payment History</title>
  </head>

  <body>

    <?php
    include "../assets/templates/adminsidebar.php";

    ?>
    <section>
      <div class="container-fluid tableDriver">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vehicle Payment History</h3>
              </div>
              <form action="./"></form>
              <div class="card-body">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Owner Name</th>
                      <th>Passenger Name</th>
                      <th>Vehicle Name</th>
                      <th>Booking</th>
                      <th>Date</th>
                      <th>Ride Duration</th>
                      <th>Amount Received</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = mysqli_query($con, "SELECT register.username,payment.id,booking.vehicleAllocated as vehicleId ,payment.booking_id as booking_id,payment.vehicle_payment as driver_payment FROM
                     `payment` JOIN `booking`JOIN `register` ON payment.booking_id=booking.id AND booking.user_id=register.id" );
                    $i = 0;

                    while ($r = mysqli_fetch_array($res)) {
                      $i++;
                      $bookingId = $r['booking_id'];
                      $vehicleId = $r['vehicleId'];
                      //select driver name from register table
                      $res2 = mysqli_query($con, "SELECT vehicle.model_company,register.username from `vehicle` JOIN `register`  where  vehicle.id='$vehicleId' and register.id=vehicle.u_id ");
                      $r2 = mysqli_fetch_array($res2);
                      $vehicleName = $r2['model_company'];
                      $vehicleowner= $r2['username'];


                      //select booking details
                      $res1 = mysqli_query($con, "SELECT pickup, destination, TIMESTAMPDIFF(MINUTE,completed_time,booking_time) as total_time, date from `booking` where id='$bookingId'");
                      $r1 = mysqli_fetch_array($res1);
                      $pickup = $r1['pickup'];
                      $destination = $r1['destination'];
                      $total_time_raw = $r1['total_time'];
                      if ($total_time_raw < 60) {
                        $total_time = abs($total_time_raw) . " minutes";
                      } else {
                        $total_time = hoursandmins($total_time_raw) . ' hours';
                      }
                      $date = $r1['date'];
                      $paymentId = $r['id'];
                      $amount = $r['driver_payment'];
                      $bookingDetails = $pickup . " <b> - </b> " . $destination;
                    ?>
                      <tr>
                        <td><?php echo  $i; ?></td>
                        <td><?php echo  $vehicleowner;?></td>
                        <td><?php echo $r['username']; ?></td>
                       
                       
                        <td><?php echo $vehicleName; ?></td>
                        <td><?php echo $bookingDetails; ?></td>


                        <td><?php echo $date; ?></td>
                        <td><?php echo  $total_time ?></td>

                        <td><?php echo 'Rs ' . $amount; ?></td>


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
        //cancel ride
        $(".setStatus").click(function() {
          var id = $(this).val();
          var btn = $(this);
          var completeBtn = $(this).siblings('.setAction');
          $(this).attr("disabled", true);
          $.ajax({
            url: "setDriverAllocationStatus.php",
            method: "POST",
            data: {
              id: id,
              status: 0
            },
            success: function(data) {
              // swal({
              //   title: "Success",
              //   text: "Status Updated",
              //   icon: "success",
              //   button: "OK",
              // });
              btn.html("Cancelled");
              completeBtn.attr("disabled", true);
            }
          });
        });

        //mark as completed
        $(".setAction").click(function() {
          var id = $(this).val();
          var btnC = $(this);
          $(this).attr("disabled", true);
          var cancelBtn = $(this).siblings('.setStatus');
          console.log(cancelBtn);
          $.ajax({
            url: "markRideCompletion.php",
            method: "POST",
            data: {
              id: id,
              action: 1
            },
            success: function(data) {
              // swal({
              //   title: "Success",
              //   text: "Status Updated",
              //   icon: "success",
              //   button: "OK",
              // });
              btnC.html("Completed");
              cancelBtn.attr("disabled", true);
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

<?php
function hoursandmins($time, $format = '%02d:%02d')
{
  if ($time < 1) {
    return;
  }
  $hours = floor($time / 60);
  $minutes = ($time % 60);
  return sprintf($format, $hours, $minutes);
}

?>