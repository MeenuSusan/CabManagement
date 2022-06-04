<?php
//get vehicle details from table vehicle where category = vehicleCatId
include 'dbcon.php';
$vehicleCatId = $_POST['vehicleCatId'];
$selectVehicleSql = "SELECT `id`, `model_company` FROM `vehicle` WHERE `category` = '$vehicleCatId' AND `driverAllocated` = -1 AND `id` NOT IN (SELECT `vehicle_id` FROM `vehicle_request` WHERE (`status` = 0 OR `status` = 1))";
$selectVehicle = mysqli_query($con, $selectVehicleSql);
echo '<option disabled selected >-SELECT-</option>';
if(mysqli_num_rows($selectVehicle) > 0){
    while($row = mysqli_fetch_array($selectVehicle)){
        $vehicleId = $row['id'];
        $vehicleName = $row['model_company'];
        echo '
        
                    <option value="'.$vehicleId.'">'.$vehicleName.'</option>

        ';
    }
}


?>