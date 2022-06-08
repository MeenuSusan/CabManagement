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
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
        </link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Google Maps JavaScript library -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAYtW3jwQWhwsFBoRxzelC81nDBRvZpi_w">
        </script>
        <script src="../javascript/validate.js"></script>
        <title>User Dashboard</title>
    </head>

    <body>

        <?php
        include "../assets/templates/usersidebar.php";

        ?>
        <div class="book">
            <div class="main-booking-container col-4">

                <div class="form-container_booking">



                    <h3>BOOK YOUR RIDE</h3>
                    <div class="form-group" id="errorMsg">

                    </div>
                    <div class="form-group">
                        <label for="location">Enter Pickup Location</label>
                        <input type="text" class="form-control" id="fromAddr" name="fromAddr" placeholder="Type address..." required />

                    </div>
                    <div class="form-group">
                        <label for="destination">Enter Destination</label>
                        <input type="text" class="form-control" id="toAddr" name="toAddr" placeholder="Type address..." required />
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="time">Time</label>
                            <input type="time" name="tym" class="form-control" id="time" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date</label>
                            <input type="date" min="<?php echo date('Y-m-d');?>" name="dd" class="form-control"placeholder="dd-mm-yyyy" id="date"  required />

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="people">Number of people</label>
                        <input type="text" class="form-control" id="people" placeholder="Number of People" required />
                    </div>
                    <div class="form-group">
                        <label for="category">Cab Type</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <?php
                            //select category from vehiclerate
                            $sqlCat = "SELECT id,category,price FROM `vehiclerate`";
                            $resultCat = mysqli_query($con, $sqlCat);
                            while ($rowCat = mysqli_fetch_array($resultCat)) {
                                $catId = $rowCat['id'];
                                $catName = $rowCat['category'];
                                $catPrice = $rowCat['price'];
                                echo "<option  value='$catId' required>$catName - Rs $catPrice /KM</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <input type="button" class="btn btn-secondary btn-block" value="Check Availability" id="availbtn" name="availbtn">
                    <input type="button" class="btn btn-primary btn-block" value="Book Now" id="bookNow" name="bookNow" style="display: none;">
                    <!-- <input type="submit" class="btn btn-secondary btn-block" value=" Book your Ride Now" name="btnBook" data-toggle="modal" data-target="#exampleModal"> -->



                </div>
            </div>
            <div id="bookingDetails"></div>
        </div>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        

        <!-- <script>
            $(function() {
  var $dp1 = $("#date");
  $dp1.datepicker({
    changeYear: true,
    changeMonth: true,
    minDate: 0,
    dateFormat: "yy-m-dd",
    yearRange: "-100:+20",
  });
});

// disable time before current time
$(function() {
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' +
        ((''+day).length<2 ? '0' : '') + day;
    $("#time").attr("min", output);
});






    </script> -->
        <script>
            
            var from = 'fromAddr';
            var to = 'toAddr';

            $(document).ready(function() {
                var autocomplete;
                autocompleteFrom = new google.maps.places.Autocomplete((document.getElementById(from)), {
                    types: ['geocode'],
                });
                autocompleteTo = new google.maps.places.Autocomplete((document.getElementById(to)), {
                    types: ['geocode'],
                });

                google.maps.event.addListener(autocompleteFrom, 'place_changed', function() {
                    var near_place = autocompleteFrom.getPlace();
                });
                google.maps.event.addListener(autocompleteTo, 'place_changed', function() {
                    var near_place = autocompleteTo.getPlace();
                });


                //check availablity
                $('#availbtn').click(function() {

                    var from = $('#fromAddr').val();
                    var to = $('#toAddr').val();
                    var date = $('#date').val();
                    var time = $('#time').val();
                    var people = $('#people').val();
                    var category = $('#category').val();
                    if (from == '' || to == '' || date == '' || time == '' || people == '' || category == '') {

                        $('#errorMsg').html(
                            '<div class="alert alert-danger" role="alert">Please fill all the fields</div>');
                    } else {
                        $.ajax({
                            url: 'checkAvailablity.php',
                            type: 'POST',
                            data: {
                                from: from,
                                to: to,
                                people: people,
                                category: category
                            },
                            success: function(response) {

                                if (response == 'success') {
                                    $('#bookNow').show();
                                    $('#availbtn').hide();
                                    $('#errorMsg').html(
                                        '<div class="alert alert-success" role="alert">Available</div>');
                                } else {
                                    $('#errorMsg').html(response);
                                    $('#bookNow').hide();
                                    $('#availbtn').show();
                                }
                            }
                        });
                    }
                });
                //check is any value changed
                $('#fromAddr').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    $('#errorMsg').html('');
                });
                $('#toAddr').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    ('#errorMsg').html('');
                });
                $('#date').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    ('#errorMsg').html('');
                });
                $('#time').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    ('#errorMsg').html('');
                });
                $('#people').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    ('#errorMsg').html('');
                });
                $('#category').change(function() {
                    $('#availbtn').show();
                    $('#bookNow').hide();
                    ('#errorMsg').html('');
                });

                $('#bookNow').click(function() {
                    var from = $('#fromAddr').val();
                    var to = $('#toAddr').val();
                    var date = $('#date').val();
                    var time = $('#time').val();
                    var people = $('#people').val();
                    var category = $('#category').val();
                    if (from == '' || to == '' || date == '' || time == '' || people == '' || category == '') {

                        $('#errorMsg').html(
                            '<div class="alert alert-danger" role="alert">Please fill all the fields</div>');
                    } else {
                        $.ajax({
                            url: 'getBookingDetails.php',
                            type: 'POST',
                            data: {
                                from: from,
                                to: to,
                                people: people,
                                category: category,
                                date: date,
                                time: time
                            },
                            success: function(response) {
                                $('#bookingDetails').html(response);
                                $("#confirmationModal").modal('show');
                            }
                        });
                    }
                });
            });
        </script>

    </body>

    </html>
<?php
}
?>