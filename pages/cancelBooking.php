<?php
include 'dbcon.php';
session_start();
$currentUserId = $_SESSION['userId'];
$stat = $_POST['status'];
if($stat==2){
    $currentUserId = '';
}

    $id=$_POST['id'];
    $setStatus="UPDATE `booking` SET `action`='$stat', `driverAllocated`='$currentUserId'WHERE `id`='$id'";
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