<?php
include 'dbcon.php';

if(isset($_POST['bookingId']) ){
    $paymentStatus = $_POST['paymentStatus'];
    $bookingId=$_POST['bookingId'];
    $paymentId = $_POST['paymentId'];
    $setStatus="UPDATE `booking` SET `payment_status`='$paymentStatus', `payment_id`='$paymentId' WHERE `id`='$bookingId'";
    $setStatusResult=mysqli_query($con,$setStatus);
    if($setStatusResult)
    {
        
        echo "success";
    }
    else
    {
        echo "fail";
    }
}

