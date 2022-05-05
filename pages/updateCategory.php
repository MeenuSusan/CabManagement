<?php
include 'dbcon.php';
//update table vehiclerate
extract($_POST);
echo $sql = "UPDATE `vehiclerate` SET `category`='$categoryName',`price`='$categoryAmount' WHERE `id`='$rateId'";
$result = mysqli_query($con, $sql);
if($result){
    echo "updated";
}

?>