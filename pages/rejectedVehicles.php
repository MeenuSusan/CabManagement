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
                <h3 class="card-title">Rejected Requests</h3>
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
                    $sql = "SELECT a.username,a.email,a.mobile,a.id,a.profile_pic,a.status,c.reg_no,c.model_company,c.fuel,c.seating_capacity,c.color,c.engine_no,c.chaise_no,c.reg_validity,c.insurence_scheme,c.insurence_validity,c.tax,c.pollution,c.vehicle_img,c.rc_doc
                  from vehicle c INNER JOIN register a WHERE  c.u_id =a.id AND a.status=0";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {

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
                          <td><a href="moreDetailsVehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" id="showmore">ViewMore</a></td>


                        </tr>


              </div>

          <?php

                      }
                    } else {
                      echo '<tr>
          <td colspan="5">No Data Found</td>
        </tr>';
                    }
          ?>
          </thead>
          <tbody>
            </table>
            <div class="form-popup popupf" id="myForm">
              <form action="/action_page.php" class="form-container">


                <div class="leftBox">

                  <label for="owner_name"><b>Owner Name</b></label>
                  <input type="text" placeholder="Enter Owner Name" name="owner_name" value="<?php echo $owner_name; ?>" readonly>
                  <label for="owner_email"><b>Owner Email</b></label>
                  <input type="text" placeholder="Enter Owner Email" name="owner_email" value="<?php echo $owner_email; ?>" readonly>
                  <label for="owner_phone"><b>Owner Phone</b></label>
                  <input type="text" placeholder="Enter Owner Phone" name="owner_phone" value="<?php echo $owner_phone; ?>" readonly>
                  <label for="vehicle"><b>Vehicle</b></label>
                  <input type="text" placeholder="Enter Vehicle" name="vehicle" value="<?php echo $vehicle; ?>" readonly>
                  <label for="registration"><b>Registration</b></label>
                  <input type="text" placeholder="Enter Registration" name="registration" value="<?php echo $registration; ?>" readonly>
                  <label for="seating_capacity"><b>Seating Capacity</b></label>
                  <input type="text" placeholder="Enter Seating Capacity" name="seating_capacity" value="<?php echo $seating_capacity; ?>" readonly>


                </div>

                <div class="centerBox">
                  <label for="fuel"><b>Fuel</b></label>
                  <input type="text" placeholder="Enter Fuel" name="fuel" value="<?php echo $vehi_fuel; ?>" readonly>
                  <label for="color"><b>Color</b></label>
                  <input type="text" placeholder="Enter Color" name="color" value="<?php echo $vehi_color; ?>" readonly>
                  <label for="engine_no"><b>Engine No</b></label>
                  <input type="text" placeholder="Enter Engine No" name="engine_no" value="<?php echo $vehi_engine_no; ?>" readonly>
                  <label for="chaise_no"><b>Chaise No</b></label>
                  <input type="text" placeholder="Enter Chaise No" name="chaise_no" value="<?php echo $vehi_chaise_no; ?>" readonly>
                  <label for="reg_validity"><b>Reg Validity</b></label>
                  <input type="text" placeholder="Enter Reg Validity" name="reg_validity" value="<?php echo $vehi_reg_validity; ?>" readonly>
                  <label for="insurence_scheme"><b>Insurence Scheme</b></label>
                  <input type="text" placeholder="Enter Insurence Scheme" name="insurence_scheme" value="<?php echo $vehi_insurence_scheme; ?>" readonly>
                </div>

                <div class="rightBox">

                  <label for="insurence_validity"><b>Insurence Validity</b></label>
                  <input type="text" placeholder="Enter Insurence Validity" name="insurence_validity" value="<?php echo $vehi_insurence_validity; ?>" readonly>
                  <label for="tax"><b>Tax</b></label>
                  <input type="text" placeholder="Enter Tax" name="tax" value="<?php echo $vehi_tax; ?>" readonly>
                  <label for="pollution"><b>Pollution</b></label>
                  <input type="text" placeholder="Enter Pollution" name="pollution" value="<?php echo $vehi_pollution; ?>" readonly>
                  <label for="vehicle_img"><b>Vehicle Image</b></label>
                  <input type="text" placeholder="Enter Vehicle Image" name="vehicle_img" value="<?php echo $vehi_vehicle_img; ?>" readonly>
                  <label for="rc_doc"><b>RC Doc</b></label>
                  <input type="text" placeholder="Enter RC Doc" name="rc_doc" value="<?php echo $vehi_rc_doc; ?>" readonly>
                  <label for="status"><b>Status</b></label>
                  <table>
                    <tr>
                      <td>
                        <?php

                        if ($vehi_status == 1) { ?>
                          <button class="btn1 btn-success btn-block">Approved</button><?php
                                                                                    } elseif ($vehi_status == 0) { ?>
                          <button class="btn1 btn-danger btn-block">Rejected</button><?php
                                                                                    } elseif ($vehi_status == 2) { ?>
                          <button class="btn1 btn-warning btn-block">Pending</button><?php
                                                                                    } else {
                                                                                      echo "Not Approved";
                                                                                    }
                                                                                      ?>
                      </td>
                    </tr>
                  </table>
                </div>

                <button type="button" class="btn btn-primary cancel" onclick="closeForm()">Close</button>
                <a href="approveVehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" class="btn btn-success" name="btn_approve">Approve</a>
                <a href="rejectVehicle.php?vehicle_id=<?php echo $vehicle_id; ?>" class="btn btn-danger" name="btn_reject">Reject</i></a>
              </form>
            </div>

    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script>
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
      }
      var el = document.getElementById('showmore');
      el.onclick = showMores;


      function showMores() {
        document.getElementById("myForm").style.display = "block";
        return false;
      }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

  </html>
<?php

}
?>