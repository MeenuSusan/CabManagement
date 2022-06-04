<?php
session_start();
include 'dbcon.php';
$currentUserId = $_SESSION['userId'];
$stat = $_POST['status'];


    $id=$_POST['id'];
    $setStatus="UPDATE `booking` SET `action`='$stat' WHERE `id`='$id'";
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