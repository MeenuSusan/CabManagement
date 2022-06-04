<?php
session_start();
include 'dbcon.php';
include 'getDistance.php';
$uname = $_SESSION['userName'];
$date = $_POST['date'];
$time = $_POST['time'];
$from = $_POST['from'];
$to = $_POST['to'];
$people = $_POST['people'];
$distance = getDistance($from, $to, "K");
$category = $_POST['category'];

$vehicleCatRate = "SELECT category,price FROM `vehiclerate` WHERE id='$category'";
$vehicleCatRateResult = mysqli_query($con, $vehicleCatRate);
if (mysqli_num_rows($vehicleCatRateResult) > 0) {
    $vehicleCatRateRow = mysqli_fetch_array($vehicleCatRateResult);
    $vehicleRate = $vehicleCatRateRow['price'];
    $vehicleCategoryName = $vehicleCatRateRow['category'];
    $total = $distance * $vehicleRate;
}


echo '


<div class="modal" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="newBooking.php" class="bc-container">
                <div class="modal-body">
                    <div class="container">
                        <table>

                            <tr>
                                <th>Pickup Location :</th>
                                <td>' . $from . '</td>
                            </tr>
                            <tr>
                                <th>Destination :</th>
                                <td>' . $to . '</td>
                            </tr>
                            <tr>
                                <th>Total Distance :</th>
                                <td>' . $distance . ' Km</td>
                            </tr>
                            <tr>
                                <th>Time :</th>
                                <td>' . $time . '</td>
                            </tr>
                            <tr>
                                <th>Date :</th>
                                <td>' . $date . '</td>
                            </tr>
                            <tr>
                                <th>Vehicle Category :</th>
                                <td>' . $vehicleCategoryName . '</td>
                            </tr>
                            <tr>
                                <th>Vehicle Rate :</th>
                                <td>' . $vehicleRate . '</td>
                            </tr>
                            <tr>
                                <th>Number of people :</th>
                                <td>' . $people . '</td>
                            </tr>
                            <tr>
                                <th>Total Amount :</th>
                                <td>' . $total . '</td>
                            </tr>
                        </table>

                        <input type="hidden" name="from" value="' . $from . '">
                        <input type="hidden" name="to" value="' . $to . '">
                        <input type="hidden" name="date" value="' . $date . '">
                        <input type="hidden" name="time" value="' . $time . '">
                        <input type="hidden" name="people" value="' . $people . '">
                        <input type="hidden" name="vehicle_category" value="' . $category . '">
                        <input type="hidden" name="vehicle_rate" value="' . $vehicleRate . '">
                        <input type="hidden" name="distance" value="' . $distance . '">
                        <input type="hidden" name="total" value="' . $total . '">

                        <!-- <button type="button" name="confirm" class="btn btn1 btn-dark col-5"><a href="../examples/booking_successful.php">Confirm Now</a></button>-->


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="confirm" class="btn btn1 btn-dark col-5">Confirm Now</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
';
