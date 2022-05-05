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
    <title>Hello, world!</title>
  </head>

  <body>

    <?php
    //include "../assets/templates/usersidebar.php";

    ?>
    <div class="container">
      <div class="row">
        <div class="col-6 bg-dark ml-5">
jbkjevbkjsvb
        </div>
        <div class="col-4 bg-light">
kbvekvbhjebhvfj
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
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
      });
    </script>

  </body>

  </html>
<?php
}
?>