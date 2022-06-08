<?php
/*

action - 0 : not completed
action - 1 : completed
action - 2 : cancelled
bookingStatus - 0 : pending
bookingStatus - 1 : accepted

*/
include 'dbcon.php';
session_start();
$uname = $_SESSION['userName'];
$email = $_SESSION['userEmail'];
$user_session_id = $_SESSION['userId'];
$photo = $_SESSION['proPic'];

$res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
while ($r = mysqli_fetch_array($res)) {
  $ademail = $r['email'];
  $adname = $r['username'];
}
if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:../index.php");
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
    <script src="../javascript/validate.js"></script>
    <title>Hello, world!</title>
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
                <h3 class="card-title">My Cab Requests</h3>
              </div>

              <div class="card-body">
                <form action="./bookingHistory.php" method="POST">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Requested Vehicle</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $selectRequestedCabSql = "SELECT vehicle_id,status FROM vehicle_request WHERE driver_id = '$user_session_id'";
                      $selectRequestedCabResult = mysqli_query($con, $selectRequestedCabSql);
                      if (mysqli_num_rows($selectRequestedCabResult) > 0) {
                        while ($row = mysqli_fetch_assoc($selectRequestedCabResult)) {
                          $vehicle_id = $row['vehicle_id'];
                          $status = $row['status'];
                          $statusText = ($row['status'] == 0) ? "Pending" : (($row['status'] == 1) ? "Accepted" : "Cancelled");
                          $sql = "SELECT model_company,id FROM vehicle WHERE  id = '$row[vehicle_id]'";
                          $result = mysqli_query($con, $sql);
                          if (mysqli_num_rows($result) > 0) {
                            $rowN = mysqli_fetch_assoc($result);
                            $model_company = $rowN['model_company'];
                            
                            echo '<tr>  
                            <td>' . $model_company . '</td>
                            <td>' . $statusText . '</td>
                            </tr>';
                          }
                        }
                      }else{
                        echo '<tr>  
                        <td colspan="2">No Requests</td>
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

  </body>

  </html>
<?php
}
?>