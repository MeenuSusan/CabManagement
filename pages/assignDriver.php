<?php
//assign driver to vehicle
include 'dbcon.php';
session_start();

$driverId = $_SESSION['userId'];
$vehicleId = $_POST['vehicleId'];
$driverAssignCheckAql = "SELECT `driverAllocated` FROM `vehicle` WHERE `driverAllocated` = '$driverId'";
$driverAssignCheck = mysqli_query($con, $driverAssignCheckAql);
if (mysqli_num_rows($driverAssignCheck) > 0) {
    echo '-1';
} else {

    $assignDriverSql = "UPDATE `vehicle` SET `driverAllocated` = '$driverId' WHERE `id` = '$vehicleId'";
    $assignDriver = mysqli_query($con, $assignDriverSql);
    if ($assignDriver) {
        echo '1';
    } else {
        echo '0';
    }
}
