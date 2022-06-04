<?php
include 'dbcon.php';
if(isset($_POST['acceptBtn'])){
    $requestedCabVehicleId = $_POST['requestedCabVehicleId'];
    $requestedCabDriverId = $_POST['requestedCabDriverId'];
    $currentVehicleId = $_POST['currentVehicleId'];
    $requestId = $_POST['acceptBtn'];

    //update vehicle table
    $updateVehicleSql = "UPDATE vehicle SET driverAllocated = '$requestedCabDriverId' WHERE id = '$requestedCabVehicleId'";
    $updateVehicleResult = mysqli_query($con, $updateVehicleSql);
    //change old vehicle driverAllocated to -1
    $updateOldVehicleSql = "UPDATE vehicle SET driverAllocated = -1 WHERE id = '$currentVehicleId'";
    $updateOldVehicleResult = mysqli_query($con, $updateOldVehicleSql);
    //update cab request table
    $updateRequestedCabSql = "UPDATE vehicle_request SET status = 1 WHERE id = '$requestId'";
    $updateRequestedCabResult = mysqli_query($con, $updateRequestedCabSql);
    if($updateRequestedCabResult){
        echo '<script>alert("Request Accepted")</script>';
        header("location: ./viewAllCabRequest.php");
    }
}else if($_POST['rejectBtn']){
    $requestedCabVehicleId = $_POST['requestedCabVehicleId'];
    $requestedCabDriverId = $_POST['requestedCabDriverId'];
    $currentVehicleId = $_POST['currentVehicleId'];
    $requestId = $_POST['rejectBtn'];

    $updateRequestedCabSql = "UPDATE vehicle_request SET status = 2 WHERE id = '$requestId'";
    $updateRequestedCabResult = mysqli_query($con, $updateRequestedCabSql);
    if($updateRequestedCabResult){
        echo '<script>alert("Request Rejected")</script>';
        header("location: ./viewAllCabRequest.php");
    }

}

?>