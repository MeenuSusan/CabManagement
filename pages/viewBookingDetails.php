<?php
include 'dbcon.php';
$booking_id = $_POST['booking_id'];
//selecting the booking details
$query = "SELECT * FROM booking WHERE id = '$booking_id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$booking_id = $row['id'];
$pickup_location = $row['pickup'];
$destination_location = $row['destination'];
$date = $row['date'];
$time = $row['booking_time'];
$amount = $row['amount'];
$status = ($row['bookingStatus'] == 1) ? 'Accepted' : 'Pending';
$action = ($row['action'] == 0) ? 'Ride not completed' : (($row['action'] == 1) ? 'Ride completed' : 'Ride cancelled');
$vehicle_id = $row['vehicleAllocated'];
$distance = $row['distance'];
$payment_status = ($row['payment_status']) ? 'Paid' : 'Not Paid';
$vehicle_category = $row['vehicleCategory'];
$completedTIme = ($row['completed_time'] == null) ? 'Ride Not Completed' : $row['completed_time'];

//select the vehicle details
$query2 = "SELECT * FROM vehicle WHERE id = '$vehicle_id'";
$result2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_array($result2);
$vehicle_id = $row2['id'];
$vehicle_name = $row2['model_company'];
$register_number = $row2['reg_no'];
$seating_capacity = $row2['seating_capacity'];
$driver_id = $row2['driverAllocated'];
//select the driver details
$query3 = "SELECT * FROM register WHERE id = '$driver_id'";
$result3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_array($result3);
$driver_name = $row3['username'];

//vehiicle category
$query4 = "SELECT * FROM vehiclerate WHERE id = '$vehicle_category'";
$result4 = mysqli_query($con, $query4);
$row4 = mysqli_fetch_array($result4);
$vehicle_category_name = $row4['category'];

if($row['bookingStatus'] == 1){
    echo '

<div class="modal" id="viewMoreModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Booking Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table>
        <tr>
            <th>Booking ID</th>
            <td>'.$booking_id.'</td>
        </tr>
        <tr>
            <th>Pickup Location</th>
            <td>'.$pickup_location.'</td>
        </tr>
        <tr>
            <th>Destination Location</th>
            <td>'.$destination_location.'</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>'.$date.'</td>
        </tr>
        <tr>
            <th>Time</th>
            <td>'.$time.'</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>Rs '.$amount.'</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>'.$status.'</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>'.$action.'</td>
        </tr>
        <tr>
            <th>Vehicle Name</th>
            <td>'.$vehicle_name.'</td>
        </tr>
        <tr>
            <th>Vehicle Category</th>
            <td>'.$vehicle_category_name.'</td>
        </tr>
        <tr>
            <th>Vehicle Register Number</th>
            <td>'.$register_number.'</td>
        </tr>
        <tr>
            <th>Vehicle Seating Capacity</th>
            <td>'.$seating_capacity.'</td>
        </tr>
        <tr>
            <th>Driver Name</th>
            <td>'.$driver_name.'</td>
        </tr>
        <tr>
            <th>Distance</th>
            <td>'.$distance.' Km</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>'.$payment_status.'</td>
        </tr>
        <tr>
            <th>Completed Time</th>
            <td>'.$completedTIme.'</td>
        </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

';
}else{
    echo '

    <div class="modal" id="viewMoreModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Booking Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table>
          <tr>
              <th>Booking ID</th>
              <td>'.$booking_id.'</td>
          </tr>
          <tr>
              <th>Pickup Location</th>
              <td>'.$pickup_location.'</td>
          </tr>
          <tr>
              <th>Destination Location</th>
              <td>'.$destination_location.'</td>
          </tr>
          <tr>
              <th>Date</th>
              <td>'.$date.'</td>
          </tr>
          <tr>
              <th>Time</th>
              <td>'.$time.'</td>
          </tr>
          <tr>
              <th>Amount</th>
              <td>Rs '.$amount.'</td>
          </tr>
          <tr>
              <th>Status</th>
              <td>'.$status.'</td>
          </tr>
          <tr>
              <th>Action</th>
              <td>'.$action.'</td>
          </tr>
          <tr>
              <th>Vehicle Category</th>
              <td>'.$vehicle_category_name.'</td>
          </tr>
         
          <tr>
              <th>Distance</th>
              <td>'.$distance.' Km</td>
          </tr>
          <tr>
              <th>Payment Status</th>
              <td>'.$payment_status.'</td>
          </tr>
    
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


    ';
}




?>





