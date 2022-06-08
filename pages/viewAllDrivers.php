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
        <style>
            .mycab {

                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 3vw;
                top: 3vw;
                width: 20vw;
                padding: 3vw 4vw;
                position: absolute;
                left: -4vw;
            }


            .main {
                width: 50%;
                margin: 50px auto;
            }

            /* Bootstrap 4 text input with search icon */

            .has-search .form-control {
                padding-left: 2.375rem;
            }

            .has-search .form-control-feedback {
                position: absolute;
                z-index: 2;
                display: block;
                width: 2.375rem;
                height: 2.375rem;
                line-height: 2.375rem;
                text-align: center;
                pointer-events: none;
                color: #aaa;
            }
            th {

  text-align: center;
}
        </style>
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
                            <div class="card-header d-flex justify-content-between">
                                <h3 class="card-title">All Drivers</h3>
                                <div class="form-group has-search w-25">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" id="searchBox" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="mycab" id="searchResult"></div>
                            <div class="mycab" id="mycab">
                            <table class="table table-bordered">
                  <thead>
                    <tr >
                        <th>Driver Profile</th>
                      <th>Driver Name</th>
                      <th>Driver Email</th>
                      <th>Driver Phone</th>

                      <th>Driver_DOB</th>
                    <th>Gender</th>
                      <th>Driver License</th>
                      <th>Driver_License Expiry</th>
                      <!-- <th>Driver License Image</th>
                    <th>Driver Image</th> -->
                      <th>Driver Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = mysqli_query($con, "SELECT a.username,a.email,a.mobile,a.id,b.address,b.dob,b.gender,b.license_no,b.license_validity,
                  b.licence_doc,a.profile_pic,a.status from driver b INNER JOIN register a on  b.d_id =a.id where a.type=2");

                    if (mysqli_num_rows($res) > 0) {
                      while ($r = mysqli_fetch_array($res)) {
                        $driver_id = $r['id'];
                        $driver_name = $r['username'];
                        $driver_email = $r['email'];
                        $driver_phone = $r['mobile'];
                        $driver_address = $r['address'];
                        $driver_dob = $r['dob'];
                        $driver_gender = $r['gender'];
                        $driver_license = $r['license_no'];
                        $driver_photo= $r['profile_pic'];
                        $driver_license_expiry = $r['license_validity'];
                        // $driver_license_image=$r['licence_doc'];
                        // $driver_image=$r['profile_pic'];
                        $driver_status = $r['status'];
                    ?>
                        <tr>
                        <td width="200"><?php echo '<img class="card-img-top" style="border-radius:100%;width:6vw;height:4vw;" src="../assets/uploads/' .  $driver_photo . '" alt="vehicle-img">' ?></td>
                          <td><?php echo $driver_name; ?></td>
                          <td><?php echo $driver_email; ?></td>
                          <td><?php echo $driver_phone; ?></td>

                          <td><?php echo $driver_dob; ?></td>
                          <td><?php echo $driver_gender;?></td>

                          <td><?php echo $driver_license; ?></td>
                          <td><?php echo $driver_license_expiry; ?></td>
                          <!-- <td><img src="../../images/<?php echo $driver_license_image; ?>" alt=""></td>
                      <td><img src="../../images/<?php echo $driver_image; ?>" alt=""></td> -->

                          <td><?php

                              if ($driver_status == 1) { ?>
                              <div class="content">Active</div><?php
                                                                              } elseif ($driver_status == 0) { ?>
                              <div class="">Inactive</div><?php
                                                                              } elseif ($driver_status == 2) { ?>
                              <div class="">Pending</div><?php
                                                                              } else {
                                                                                echo "Not Approved";
                                                                              }
                                                                              ?>
                          </td>
                          </td>
                          <td class="btn_arp">
                            <!-- <a href="viewDriverRequest.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-primary">View</a> -->
                            <!-- <span> <a href="approve.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-success" name="btn_approve"><i class="fa fa-check"></i></a></span> -->
                            <a href="reject.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-danger" id="exampleModal" ><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
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

                                        

                                
                            </div>
                
        </section>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {

                //search for page name
                $("#searchBox").on("keyup", function() {
                    $("#searchResult").html("");
                    if ($("#searchBox").val().length > 0) {
                        var value = $(this).val().toLowerCase() + "%";

                        if ($("#searchBox").val() == "") {
                            $("#searchResult").html("");
                        }
                        $("#searchResult").show();
                        $.ajax({
                            url: "vehicleSearch.php",
                            type: "POST",
                            data: {
                                search: value,
                            },
                            success: function(data) {
                                $("#searchResult").html(data);
                                $("#mycab").hide();
                            },
                        });
                    } else {
                        $("#searchResult").hide();
                        $("#mycab").show();
                    }
                });

                // $("#searchBox").on("keyup", function() {
                //     var value = $(this).val().toLowerCase();

                // });
            });
        </script>
    </body>

    </html>
<?php
}
?>