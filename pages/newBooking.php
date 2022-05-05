<?php
include 'dbcon.php';
session_start();
$currentUserId = $_SESSION['userId'];

if (isset($_POST['confirm'])) {
  $source = $_POST['from'];
  $destin = $_POST['to'];
  $tim = $_POST['time'];
  $date = $_POST['date'];
  $amnt = $_POST['total'];
  $distance = $_POST['distance'];
  $vehicle_id = $_POST['vehicle_id'];


  //insert into booking table
  $sql = "INSERT INTO `booking`(`pickup`, `destination`, `booking_time`, `date`, `distance`, `vehicleAllocated`, `amount`, `user_id`) VALUES ('$source','$destin','$tim','$date','$distance','$vehicle_id','$amnt','$currentUserId')";
  $result = mysqli_query($con, $sql);
  $booking_id = mysqli_insert_id($con);
  if ($result) {
    echo '<script type="text/javascript"> alert("Booking Successful")</script>';
    header("Location: ./bookingHistory.php");
  } else {
    echo '<script type="text/javascript"> alert("Booking Unsuccessful")</script>';
  }
}

?>