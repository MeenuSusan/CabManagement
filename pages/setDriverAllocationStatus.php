<?php
include 'dbcon.php';
session_start();
$currentUserId = $_SESSION['userId'];
$stat = $_POST['status'];
if($stat==0){
    $currentUserId = '';
}

    $id=$_POST['id'];
    $selectCarId = "SELECT `id` FROM `vehicle` WHERE `driverAllocated` = '$currentUserId'";
    $selectCarIdResult = mysqli_query($con, $selectCarId);
    $selectCarIdRow = mysqli_fetch_array($selectCarIdResult);
    $carId = $selectCarIdRow['id'];
    $setStatus="UPDATE `booking` SET `bookingStatus`='$stat',`vehicleAllocated`='$carId' WHERE `id`='$id'";
    $setStatusResult=mysqli_query($con,$setStatus);
    if($setStatusResult)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }

?>