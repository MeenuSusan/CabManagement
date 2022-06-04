<?php
session_start();
include 'dbcon.php';
$vehicleId = $_POST['vehicleId'];
$driverId = $_SESSION['userId'];
//check if driver already send a request
$driverRequestCheckSql = "SELECT `id` FROM `vehicle_request` WHERE status = 0 AND driver_id = '$driverId'";
$driverRequestCheck = mysqli_query($con, $driverRequestCheckSql);
if (mysqli_num_rows($driverRequestCheck) > 0) {
    echo '0';
} 
else {
    $vehicleRequestSql = "INSERT INTO `vehicle_request`(`driver_id`, `vehicle_id`) VALUES ('$driverId','$vehicleId')";
    $vehicleRequest = mysqli_query($con, $vehicleRequestSql);
    if ($vehicleRequest) {
        echo '1';
    } 
    else {
        echo '-1';
    }
}
