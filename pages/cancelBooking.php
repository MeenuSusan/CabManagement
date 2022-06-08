<?php
session_start();
include 'dbcon.php';
include 'sendEmail.php';
$currentUserId = $_SESSION['userId'];
$stat = $_POST['status'];

$emailQuery = "SELECT email FROM register WHERE id='$currentUserId' ";
$emailQueryRes = mysqli_query($con, $emailQuery);
$r = mysqli_fetch_array($emailQueryRes);
$email = $r['email'];

$id = $_POST['id'];
$setStatus = "UPDATE `booking` SET `action`='$stat' WHERE `id`='$id'";
$setStatusResult = mysqli_query($con, $setStatus);
if ($setStatusResult) {
    echo "success";
    sendMail($email, "Ride cancelled", "Your ride has been cancelled");
} else {
    echo "fail";
}
?>