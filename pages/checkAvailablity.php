<?php
include 'dbcon.php';
include 'getDistance.php';
session_start();
$uname = $_SESSION['userName'];
$date = $_POST['date'];
$time = $_POST['time'];

$from = $_POST['from'];
$to = $_POST['to'];
$people = $_POST['people'];
$startTimeRaw = strtotime($time) - 60*60;
$startTime = date('H:i:s', $startTimeRaw);
$endTimeRaw = strtotime($time) + 60*60;
$endTime = date('H:i:s', $endTimeRaw);
$distance = getDistance($from, $to, "K");
if($distance <=100){

echo '
    <div class="con-availability">
          <h3>Available Cars</h3>
          <div class="avail-container">
';
//select car_id which is not in the booking table
$sql = "SELECT * FROM `vehicle` WHERE id NOT IN 
(SELECT vehicleAllocated FROM `booking` WHERE date='$date' and time(booking_time) BETWEEN '$startTime' AND '$endTime') and seating_capacity>='$people' ";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $total = 0;
    $vehicle_id = $row['id'];
    $vehicle_name = $row['model_company'];
    $vehicleCategoryId = $row['category'];
    $vehicle_image = $row['vehicle_img'];
    $vehicle_seating_capacity = $row['seating_capacity'];
    $vehicleCatRate = "SELECT category,price FROM `vehiclerate` WHERE id='$vehicleCategoryId'";
    $vehicleCatRateResult = mysqli_query($con, $vehicleCatRate);
    if (mysqli_num_rows($vehicleCatRateResult) > 0) {
      while ($vehicleCatRateRow = mysqli_fetch_array($vehicleCatRateResult)) {
        $vehicleRate = $vehicleCatRateRow['price'];
        $vehicleCategoryName = $vehicleCatRateRow['category'];
      }
    }
    $total = $distance * $vehicleRate;
    
      echo '
            <div class="avail-card my-2 bg-light">
              <div class="avail-card-body row ">
                <div class="col">
                  <img src="../assets/images/vehicle/'.$vehicle_image.'" enctype="multipart/form-data"class="rounded float-left" alt="car image">
                </div>
                <form method="POST" action="confirmBooking.php" class="col">
                <input type="hidden" name="vehicle_id" value="'.$vehicle_id.'">
                <input type="hidden" name="from" value="'.$from.'">
                <input type="hidden" name="to" value="'.$to.'">
                <input type="hidden" name="date" value="'.$date.'">
                <input type="hidden" name="time" value="'.$time.'">
                <input type="hidden" name="people" value="'.$people.'">
                <input type="hidden" name="vehicle_name" value="'.$vehicle_name.'">
                <input type="hidden" name="vehicle_category" value="'.$vehicleCategoryName.'">
                <input type="hidden" name="vehicle_seating_capacity" value="'.$vehicle_seating_capacity.'">
                <input type="hidden" name="vehicle_rate" value="'.$vehicleRate.'">
                <input type="hidden" name="distance" value="'.$distance.'">
                <input type="hidden" name="total" value="'.$total.'">
                  <h5 class="card-title">' . $vehicle_name . '</h5>
                  <p class="card-text">' . $vehicle_seating_capacity . ' Seater</p>
                  <p class="card-text">Category: ' . $vehicleCategoryName . '</p>
                  <p class="card-text">Rs. ' . $total . '</p>
                  <input type="submit" class="btn btn-secondary btn-block" value=" Book your Ride Now" name="btnBook" data-toggle="modal" >
                </form>
              </div>
            </div>
    ';
  }
}else{
  echo '
    <div class="avail-card my-2 bg-light">
      <div class="avail-card-body row ">
        <div class="col">
          <img src="../assets/images/logo.jpg" class="rounded float-left" alt="...">
        </div>
        <div class="col">
          <h5 class="card-title">No Car Available</h5>
          <p class="card-text">Please try again later</p>
        </div>
      </div>
    </div>
  ';
}


echo '
    </div>
    </div>
';
}
else{
  echo '
  distance error
';
}