<?php
/*

action - 0 : not completed
action - 1 : completed
action - 2 : cancelled
bookingStatus - 0 : pending
bookingStatus - 1 : accepted

*/

session_start();
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
    include "../assets/templates/adminsidebar.php";

    ?>

    <section>
      <div class="container-fluid tableDriver">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Driver Cab Request</h3>
              </div>

              <div class="card-body">
                <form action="./bookingHistory.php" method="POST">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Driver</th>
                        <th>Requested Vehicle</th>
                        <th>Current Vehicle</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $i = 0;
                      $selectRequestedCabSql = "SELECT id,vehicle_id,status,driver_id FROM vehicle_request";
                      $selectRequestedCabResult = mysqli_query($con, $selectRequestedCabSql);
                      if (mysqli_num_rows($selectRequestedCabResult) > 0) {

                        while ($row3 = mysqli_fetch_assoc($selectRequestedCabResult)) {
                          $i++;
                          $requestId = $row3['id'];
                          $requestedCabVehicleId = $row3['vehicle_id'];
                          $requestedCabStatus = $row3['status'];
                          $requestedCabDriverId = $row3['driver_id'];
                          $statusText = ($row3['status'] == 0) ? "Pending" : (($row3['status'] == 1) ? "Accepted" : "Cancelled");
                          //get driver name
                          $selectDriverNameSql = "SELECT username FROM register WHERE id = '$requestedCabDriverId'";
                          $selectDriverNameResult = mysqli_query($con, $selectDriverNameSql);
                          if (mysqli_num_rows($selectDriverNameResult) > 0) {
                            while ($row4 = mysqli_fetch_assoc($selectDriverNameResult)) {
                              $driverName = $row4['username'];
                            }
                          }
                          //get current vehicle name
                          $selectCurrentVehicleNameSql = "SELECT model_company,id FROM vehicle WHERE driverAllocated = '$requestedCabDriverId'";
                          $selectCurrentVehicleNameResult = mysqli_query($con, $selectCurrentVehicleNameSql);
                          if (mysqli_num_rows($selectCurrentVehicleNameResult) > 0) {
                            while ($row5 = mysqli_fetch_assoc($selectCurrentVehicleNameResult)) {
                              $currentVehicleName = $row5['model_company'];
                              $currentVehicleId = $row5['id'];
                            }
                          }

                          $sql = "SELECT model_company,id FROM vehicle WHERE  id = '$row3[vehicle_id]'";
                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                            $rowN = mysqli_fetch_assoc($result);
                            $requestedCabName = $rowN['model_company'];


                            echo '<tr>
                            <td>' . $i . '</td> 
                            <td>' . $driverName . '</td>
                            <td>' . $requestedCabName . '</td>
                            <td>' . $currentVehicleName . '</td>
                            <td>'.$statusText.'</td>  

                            
                            </tr>';
                          }
                        }
                      }else{
                        echo '<tr>
                        <td colspan="5">No Data Found</td>
                        </tr>';
                      }
                      ?>
                    <tbody>
                  </table>

                </form>
    </section>
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
    </script>
  </body>

  </html>
<?php
}
?>