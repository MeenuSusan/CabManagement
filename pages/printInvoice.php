<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->shrink_tables_to_fit = 1;
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
include 'dbcon.php';
$booking_id = $_POST['downloadInvoice'];
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
if (mysqli_num_rows($result3) > 0) {
    $driver_name = $row3['username'];
} else {
    $driver_name = 'Not Assigned';
}


//vehiicle category
$query4 = "SELECT * FROM vehiclerate WHERE id = '$vehicle_category'";
$result4 = mysqli_query($con, $query4);
$row4 = mysqli_fetch_array($result4);
$vehicle_category_name = $row4['category'];

if ($row['bookingStatus'] == 1) {
    echo '


 
      <div class="modal-body">
        <table>
        <tr>
            <th>Booking ID</th>
            <td>' . $booking_id . '</td>
        </tr>
        <tr>
            <th>Pickup Location</th>
            <td>' . $pickup_location . '</td>
        </tr>
        <tr>
            <th>Destination Location</th>
            <td>' . $destination_location . '</td>
        </tr>
        <tr>
            <th>Date</th>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <th>Time</th>
            <td>' . $time . '</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>Rs ' . $amount . '</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>' . $status . '</td>
        </tr>
        <tr>
            <th>Action</th>
            <td>' . $action . '</td>
        </tr>
        <tr>
            <th>Vehicle Name</th>
            <td>' . $vehicle_name . '</td>
        </tr>
        <tr>
            <th>Vehicle Category</th>
            <td>' . $vehicle_category_name . '</td>
        </tr>
        <tr>
            <th>Vehicle Register Number</th>
            <td>' . $register_number . '</td>
        </tr>
        <tr>
            <th>Vehicle Seating Capacity</th>
            <td>' . $seating_capacity . '</td>
        </tr>
        <tr>
            <th>Driver Name</th>
            <td>' . $driver_name . '</td>
        </tr>
        <tr>
            <th>Distance</th>
            <td>' . $distance . ' Km</td>
        </tr>
        <tr>
            <th>Payment Status</th>
            <td>' . $payment_status . '</td>
        </tr>
        <tr>
            <th>Completed Time</th>
            <td>' . $completedTIme . '</td>
        </tr>
        </table>
      </div>
      


';
} else {
    echo '

    
        <div class="modal-body">
          <table>
          <tr>
              <th>Booking ID</th>
              <td>' . $booking_id . '</td>
          </tr>
          <tr>
              <th>Pickup Location</th>
              <td>' . $pickup_location . '</td>
          </tr>
          <tr>
              <th>Destination Location</th>
              <td>' . $destination_location . '</td>
          </tr>
          <tr>
              <th>Date</th>
              <td>' . $date . '</td>
          </tr>
          <tr>
              <th>Time</th>
              <td>' . $time . '</td>
          </tr>
          <tr>
              <th>Amount</th>
              <td>Rs ' . $amount . '</td>
          </tr>
          <tr>
              <th>Status</th>
              <td>' . $status . '</td>
          </tr>
          <tr>
              <th>Action</th>
              <td>' . $action . '</td>
          </tr>
          <tr>
              <th>Vehicle Category</th>
              <td>' . $vehicle_category_name . '</td>
          </tr>
         
          <tr>
              <th>Distance</th>
              <td>' . $distance . ' Km</td>
          </tr>
          <tr>
              <th>Payment Status</th>
              <td>' . $payment_status . '</td>
          </tr>
    
          </table>
        </div>
       



    ';
}

$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
$mpdf->Output('invoice.pdf', 'D');
?>