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

            .vehcard {}

            .mycab img {
                width: 22rem;
                height: 10rem;
            }

            .brand {
                width: 100%;
                height: 3vw;
                background-color: #ddf542;
                text-align: center;
                font-weight: bold;
                padding: 0.5vw;
            }

            .cardet {
                padding: 1vw 0.5vw 1vw 0.5vw;
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
                                <h3 class="card-title">Vehicle Requests</h3>
                                <div class="form-group has-search w-25">
                                    <span class="fa fa-search form-control-feedback"></span>
                                    <input type="text" id="searchBox" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="mycab" id="searchResult"></div>
                            <div class="mycab" id="mycab">
                                <?php
                                //select vehicle details
                                $selectVehicleSql = "SELECT `id`, `model_company`,`reg_no`,`category`,`fuel`,`vehicle_img`,`seating_capacity` FROM `vehicle`";
                                $selectVehicle = mysqli_query($con, $selectVehicleSql);
                                if (mysqli_num_rows($selectVehicle) > 0) {
                                    while ($row = mysqli_fetch_array($selectVehicle)) {
                                        $vehicleId = $row['id'];
                                        $vehicleName = $row['model_company'];
                                        $vehicleRegNo = $row['reg_no'];
                                        $vehicleCategoryId = $row['category'];
                                        //select vehicle category
                                        $selectVehicleCategorySql = "SELECT `id`, `category` FROM `vehiclerate` WHERE `id` = $vehicleCategoryId";
                                        $selectVehicleCategory = mysqli_query($con, $selectVehicleCategorySql);
                                        if (mysqli_num_rows($selectVehicleCategory) > 0) {
                                            while ($row2 = mysqli_fetch_array($selectVehicleCategory)) {
                                                $vehicleCategory = $row2['category'];
                                            }
                                        }
                                        $vehicleFuel = $row['fuel'];
                                        $vehicleImg = $row['vehicle_img'];
                                        $vehicleSeatingCapacity = $row['seating_capacity'];
                                        echo '
                    <div class="vehcard mycabBox">
                
                <div class="card" style="width: 22rem;">
                <img class="card-img-top" src="../assets/uploads/' . $vehicleImg . '" alt="Card image cap">
                <div class="card-body p-0 m-0">
                    <div class="brand">
                        ' . $vehicleName . '
                    </div>
                    <div class="cardet">
                        <table>
                        <tr>
                          <th>
                              Reg. No.:
                          </th>
                          <td>
                          ' . $vehicleRegNo . '
                          </td>
                      </tr>
              
                      <tr>
                          <th>
                              Category :
                          </th>
                          <td>
                          ' . $vehicleCategory . '
                          </td>
                      </tr>
                      <tr>
                          <th>
                              Fuel :
                          </th>
                          <td>
                          ' . $vehicleFuel . '
                          </td>
                      </tr>
                      <tr>
                          <th>
                              Seating Capacity :
                          </th>
                          <td>
                          ' . $vehicleSeatingCapacity . '
                          </td>
                      </tr>
                        </table>
                      
                    </div>
                  
              
                </div>
              </div>
              </div>
                ';
                                    }
                                } else {
                                    echo '
                <div class="card" style="width: 22rem;">
                <p class="text-center">No vehicle allocated</p>
                <a href="./requestNewCab.php" class="btn btn-primary btn-block">Add Vehicle</a>
                </div>
                ';
                                }
                                ?>

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