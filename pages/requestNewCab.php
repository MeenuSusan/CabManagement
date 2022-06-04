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
        <title>Driver Dashboard</title>
    </head>

    <body>

        <?php
        include "../assets/templates/driversidebar.php";

        ?>
        <div class="request">
            <div class="main-booking-container col-4">

                <div class="form-container_booking">
                    <form action="#" method="POST">
                        <h3>Get Your Vehicle</h3>
                        <div class="form-group" id="errorMsg">

                        </div>
                        <div class="form-group">
                            <label for="location">Select Vehicle Category</label>
                            <div class="form-group">
                                <select class="form-control" id="selectVehicleCat">
                                    <option disabled selected>-SELECT-</option>
                                    <?php
                                    $selectVehicleCat = mysqli_query($con, "SELECT `id`, `category`, `price` FROM `vehiclerate`");
                                    while ($row = mysqli_fetch_array($selectVehicleCat)) {
                                        $vehicleCatId = $row['id'];
                                        $vehicleCat = $row['category'];
                                        $vehiclePrice = $row['price'];
                                        echo '
                                        <option value="' . $vehicleCatId . '">' . $vehicleCat . '</option>
                            
                                        ';
                                    }

                                    ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="location">Select Vehicle </label>
                            <div class="form-group">

                                <select class="form-control" id="sel1">
                                    <option disabled selected>-SELECT-</option>
                                </select>
                            </div>

                        </div>

                        <input type="button" class="btn btn-secondary btn-block" value="Get My Car" id="getCar" name="getCar">
                        <!-- <input type="submit" class="btn btn-secondary btn-block" value=" Book your Ride Now" name="btnBook" data-toggle="modal" data-target="#exampleModal"> -->


                    </form>
                </div>
            </div>
            <div class="availablility" id="availablility">

            </div>
        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $("#selectVehicleCat").on("change", function() {
                    var vehicleCatId = $(this).val();
                    $.ajax({
                        url: "getVehicle.php",
                        method: "POST",
                        data: {
                            vehicleCatId: vehicleCatId
                        },
                        success: function(data) {
                            console.log(data);
                            $("#sel1").html(data);
                        }
                    });
                });


                //req for vehicle
                $("#getCar").on("click", function() {
                    var vehicleId = $("#sel1").val();
                    if (vehicleId != null) {
                        $.ajax({
                            url: "assignDriver.php",
                            method: "POST",
                            data: {
                                vehicleId: vehicleId
                            },
                            success: function(data) {
                                if (data == "1") {
                                    Swal.fire({
                                        title: 'Success',
                                        text: 'Your vehicle has been assigned to you',
                                        type: 'success',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location.href = "viewMyCab.php";
                                        }
                                    });
                                } else if (data == "0") {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Your vehicle has not been assigned to you',
                                        type: 'error',
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.value) {
                                            window.location.href = "requestNewCab.php";
                                        }
                                    });
                                } else if (data == "-1") {
                                    Swal.fire({
                                        title: '<strong>A vehicle has been already assigned to you</strong>',
                                        icon: 'info',
                                        html: 'Do you want to proceed with the request?',
                                        showDenyButton: true,
                                        showCancelButton: false,
                                        confirmButtonText: 'Yes, Proceed',
                                        denyButtonText: `Cancel`,
                                    }).then((result) => {
                                        /* Read more about isConfirmed, isDenied below */
                                        if (result.isConfirmed) {
                                            $.ajax({
                                                url: "sendVehicleAssignRequest.php",
                                                method: "POST",
                                                data: {
                                                    vehicleId: vehicleId
                                                },
                                                success: function(data2) {
                                                    if (data2 == "1") {
                                                        Swal.fire('Request send successfully!', '', 'success')
                                                    } else if (data2 == "0") {
                                                        Swal.fire('Cannot have multiple request at a time', '', 'error')
                                                    } else {
                                                        Swal.fire('Request send failed!', '', 'error')
                                                    }
                                                }
                                            });

                                        } else if (result.isDenied) {
                                            Swal.fire('Operation cancelled', '', 'info')
                                        }
                                    });
                                } else {

                                }
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Fill all the fields',
                            text: 'Please fill all the fields',
                        })
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
}
?>