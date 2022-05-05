<?php
include 'dbcon.php';
session_start();
$uname = $_SESSION['userName'];
$email = $_SESSION['userEmail'];

$res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
while ($r = mysqli_fetch_array($res)) {
  $ademail = $r['email'];
  $adname = $r['username'];
}
if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:home.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAYtW3jwQWhwsFBoRxzelC81nDBRvZpi_w"></script>
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
          <form action="./bookingConfirm.php" method="POST" onsubmit="return validateBooking();">
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
                <input type="date" name="dd" class="form-control" id="date" min="2022-04-06" max="2022-04-13" required />

              </div>
            </div>
            <div class="form-group">
              <label for="people">Number of people</label>
              <input type="text" class="form-control" id="people" placeholder="Number of People" required />
            </div>
            <input type="button" class="btn btn-secondary btn-block" value="Check Availavility" id="availbtn" name="availbtn">
            <!-- <input type="submit" class="btn btn-secondary btn-block" value=" Book your Ride Now" name="btnBook" data-toggle="modal" data-target="#exampleModal"> -->


          </form>
        </div>
      </div>
      <div class="availablility" id="availablility">

      </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
          if (from == '' || to == '' || date == '' || time == '' || people == '') {

            $('#errorMsg').html('<div class="alert alert-danger" role="alert">Please fill all the fields</div>');
          } else {
            $.ajax({
              url: 'checkAvailablity.php',
              type: 'POST',
              data: {
                from: from,
                to: to,
                date: date,
                time: time,
                people: people
              },
              success: function(response) {
                // if (response == 'success') {
                // Swal.fire({
                //   title: 'Success',
                //   text: 'Your ride is available',
                //   icon: 'success',
                //   confirmButtonText: 'OK'
                // });
                // } else {
                //   Swal.fire({
                //     title: 'Error',
                //     text: 'Your ride is not available',
                //     icon: 'error',
                //     confirmButtonText: 'OK'
                //   })
                // }
                if (response.includes("distance error")) {
                  $('#errorMsg').html('<div class="alert alert-danger" role="alert">Only max distance of 100 Km available</div>');
                } else {
                  $('#errorMsg').html('');
                  $('#availablility').show();
                  $('#availablility').html(response);
                }

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