<?php
include 'dbcon.php';
$action = $_POST['action'];
$totalAmount = $_POST['totalAmount'];
$currentTime = date("H:i:s");

    $id=$_POST['id'];
    $setStatus="UPDATE `booking` SET `action`='$action' , `completed_time`='$currentTime' WHERE `id`='$id'";
    $setStatusResult=mysqli_query($con,$setStatus);
    if($setStatusResult)
    {
         //insert payment details
        $companyAmount = $totalAmount * 0.20;
        $vehicleOwnerAmt = $totalAmount * 0.20;
        $driverAmount = $totalAmount - ($companyAmount+$vehicleOwnerAmt);
        $sql = "INSERT INTO `payment`(`booking_id`, `company`, `driver_payment`, `vehicle_payment`) VALUES ('$id','$companyAmount','$driverAmount','$vehicleOwnerAmt')";
        $result = mysqli_query($con, $sql);
        echo "success";
    }
    else
    {
        echo "fail";
    }
