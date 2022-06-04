<?php
session_start();
/*

action - 0 : not completed
action - 1 : completed
action - 2 : cancelled
bookingStatus - 0 : pending
bookingStatus - 1 : accepted

*/

if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:../index.php");
  die();
} else {
  include 'dbcon.php';

  $uname = $_SESSION['userName'];
  $email = $_SESSION['userEmail'];
  $user_session_id = $_SESSION['userId'];
  $photo = $_SESSION['proPic'];

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
    <script src="../javascript/validate.js"></script>
    <title>Hello, world!</title>
  </head>

  <body>

    <?php
    include "../assets/templates/usersidebar.php";

    ?>

    <section>
      <div class="container-fluid tableDriver">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Booking History</h3>
              </div>

              <div class="card-body">
                <form action="./bookingHistory.php" method="POST">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Pickup Location</th>
                        <th>Destination Location</th>
                        <th>Pickup Date</th>
                        <th>Pickup Time</th>
                        <th>Amount</th>
                        <th>Booking Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $res = mysqli_query($con, "SELECT id, pickup, destination, TIME_FORMAT(booking_time, '%h:%i %p') as booking_time, date, amount, bookingStatus, payment_status, action, vehicleAllocated,distance  FROM booking WHERE  user_id=$user_session_id");
                      if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_array($res)) {
                          $bookingId = $r['id'];
                          $pickup_location = $r['pickup'];
                          $destination_location = $r['destination'];
                          $time = $r['booking_time'];
                          $date = $r['date'];
                          $amount = $r['amount'];
                          $booking_status = $r['bookingStatus'];
                          $action = $r['action'];
                          $payBtnVisibility = ($r['action'] == 2) ? 'display:none' : '';
                          $payment_status_text = ($r['payment_status'] == 1) ? 'Paid' : 'Pay Now';
                          $payment_status = ($r['payment_status'] == 1) ? 'disabled' : '';
                          $status = ($r['bookingStatus'] == 1) ? '' : 'disabled';
                          if ($r['action'] == 2) {
                            $actionStatusText = 'Cancelled';
                          } else if (($r['action'] == 1) && ($r['bookingStatus'] == 1)) {
                            $actionStatusText = 'Cancelation Not Available';
                          } else {
                            $actionStatusText = 'Cancel';
                          }

                          $actionStatus = ($r['action'] == 1) || ($r['action'] == 2) ? 'disabled' : '';
                      ?>
                          <tr>
                            <td><?php echo  $pickup_location; ?></td>
                            <td><?php echo $destination_location; ?></td>
                            <td><?php echo  $time; ?></td>

                            <td><?php echo $date; ?></td>

                            <td><?php echo $amount; ?></td>
                            <!-- status 0 pending 1 Accepted -->


                            <td><?php



                                if ($booking_status == 1) { ?>
                                <?php
                                  if ($action == 1) { ?>
                                  <button class="btn btn-success" disabled>Completed</button><?php
                                                                                            } elseif ($action == 0) { ?>
                                  <button class="btn btn-info" disabled>Accepted</button><?php
                                                                                            } else if ($action == 2) { ?>
                                  ?>
                                  <button class="btn btn-danger" disabled>Canceled</button><?php
                                                                                            }
                                                                                          } elseif ($booking_status == 0) {

                                                                                            if ($action == 2) { ?>
                                  <button class="btn btn-danger" disabled>Canceled</button><?php
                                                                                            } else { ?>
                                  <button class="btn btn-warning" disabled>Pending</button><?php
                                                                                            }
                                                                                          } else {
                                                                                            echo "Not Approved";
                                                                                          }
                                                                                            ?>
                            </td>

                            <td>
                              <Button type="button" name="cancelBooking" id="cancelBooking" class="btn btn-danger cancelBooking" <?php echo $actionStatus; ?> value="<?php echo $bookingId ?>"><?php echo $actionStatusText; ?></Button>
                              <Button type="button" name="paynow" id="paynow" style="<?php echo $payBtnVisibility; ?>" class="btn btn-success paynow" <?php echo $payment_status; ?> value="<?php echo $bookingId ?>"><?php echo $payment_status_text; ?></Button>
                              <button type="button" id="viewMore" class="btn btn-primary viewMore" value="<?php echo $bookingId; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button>
                              <input type="hidden" name="amt" id="amt" value="<?php echo $amount; ?>">
                            </td>


                          </tr>
                      <?php

                        }
                      } else {
                        echo '
                        <tr>
                        <td colspan="8">No Bookings Found</td>
                        </tr>';
                      }
                      ?>
                      </thead>
                    <tbody>
                  </table>

                </form>
    </section>
    <div id="bookingDetailsContainer"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      $(".cancelBooking").click(function() {
        var id = $(this).val();
        var btn = $(this);
        $(this).attr("disabled", true);
        $.ajax({
          url: "cancelBooking.php",
          method: "POST",
          data: {
            id: id,
            status: 2
          },
          success: function(data) {
            // swal({
            //   title: "Success",
            //   text: "Status Updated",
            //   icon: "success",
            //   button: "OK",
            // });
            btn.html("Cancelled");
            window.location.reload();
          }
        });
      });


      $(".paynow").click(function() {
        var id = $(this).val();
        var btn = $(this);
        var amt = btn.next().val();
        $(this).attr("disabled", true);
        var options = {
          "key": "rzp_test_fXhZr7JtuE5nxg",
          "amount": amt * 100,
          "currency": "INR",
          "name": "Ezy Cabs",
          "description": "Test Transaction",
          "image": "https://image.freepik.com/free-vector/logo-sample-text_355-558.jpg",
          "handler": function(response) {
            $.ajax({
              type: 'post',
              url: 'paynow.php',
              data: {
                paymentId: response.razorpay_payment_id,
                bookingId: id,
                paymentStatus: 1,
              },
              success: function(result) {
                swal("Thank you!", "We will get back to you if required", "success");
                btn.html("Paid");
              }
            });
          }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();

      });


      //view more
      $(".viewMore").click(function() {
        var booking_id = $(this).val();
        $.ajax({
          url: "viewBookingDetails.php",
          method: "POST",
          data: {
            booking_id: booking_id
          },
          success: function(data) {
            $("#bookingDetailsContainer").html(data);
            $("#viewMoreModal").modal("show");
          }
        });
      });
    </script>
  </body>

  </html>
<?php
}
?>