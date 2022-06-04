<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:../index.php");
  die();
} else {
  include 'dbcon.php';
  $s_id = $_SESSION['session_id'];
  $uname = $_SESSION['userName'];
  $email = $_SESSION['userEmail'];
  $photo = $_SESSION['proPic'];
  $currentUserId = $_SESSION['userId'];


  $resp = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
  while ($r = mysqli_fetch_array($resp)) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
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
                <h3 class="card-title">Vehicle Requests</h3>
              </div>

              <div class="card-body">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Vehicle</th>
                      <th>Register_No</th>
                      <th>Fuel</th>
                      <th>Seating</th>
                      <th>View More</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = mysqli_query($con, "SELECT a.username,a.email,a.mobile,a.id,a.profile_pic,a.status,c.u_id,c.reg_no,c.model_company,c.fuel,c.seating_capacity,c.color,c.engine_no,c.chaise_no,c.reg_validity,c.insurence_scheme,c.insurence_validity,c.tax,c.pollution,c.vehicle_img,c.rc_doc
                   from vehicle c INNER JOIN register a WHERE  c.u_id =a.id AND a.status=2");


                    while ($r = mysqli_fetch_array($res)) {

                      $vehicle_id = $r['id'];
                      $owner_name = $r['username'];
                      $owner_email = $r['email'];
                      $owner_phone = $r['mobile'];
                      $vehicle = $r['model_company'];
                      $registration = $r['reg_no'];
                      $seating_capacity = $r['seating_capacity'];
                      $vehi_fuel = $r['fuel'];
                      $vehi_color = $r['color'];
                      $vehi_engine_no = $r['engine_no'];
                      $vehi_chaise_no = $r['chaise_no'];
                      $vehi_reg_validity = $r['reg_validity'];
                      $vehi_insurence_scheme = $r['insurence_scheme'];
                      $vehi_insurence_validity = $r['insurence_validity'];
                      $vehi_tax = $r['tax'];
                      $vehi_pollution = $r['pollution'];
                      $vehi_vehicle_img = $r['vehicle_img'];
                      $vehi_rc_doc = $r['rc_doc'];
                      $vehi_status = $r['status'];
                    ?>

                      <tr>
                        <td><?php echo $owner_name; ?></td>
                        <td><?php echo $owner_email; ?></td>
                        <td><?php echo $owner_phone; ?></td>
                        <td><?php echo $vehicle; ?></td>
                        <td><?php echo $registration; ?></td>
                        <td><?php echo $vehi_fuel; ?></td>
                        <td><?php echo $seating_capacity; ?></td>
                        <td><a href="moreDetailsVehicle.php?vehicle_id=<?php echo $vehicle_id; ?>">ViewMore</a></td>


                      </tr>


              </div>

            <?php

                    }
            ?>
            </thead>
            <tbody>
              </table>
              <div class="form-popup popupf" id="myForm">



                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>
<?php

}
?>