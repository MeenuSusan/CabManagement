<?php
include 'dbcon.php';
session_start();
$uname=$_SESSION['userName'];
$email=$_SESSION['userEmail'];

$res=mysqli_query($con,"SELECT * from `register` where email='$email' AND username='$uname'");
while($r=mysqli_fetch_array($res)){
  $ademail=$r['email'];
  $adname=$r['username'];
  $id=$r['id'];

}
if(isset($_SESSION["session_id"]) != session_id()){
  header("Location:home.php");
  die();
}
else{
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="../javascript/validate.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "../../images/about_us.svg"type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    
    <title>Hello, world!</title>
  </head>
  <body>
    
  <?php
        include "../assets/templates/usersidebar.php";
        
  ?>
<?php
  if(isset ($_POST['btnBook'])){
    $addressFrom = $_POST['fromAddr'];
    $addressTo   = $_POST['toAddr'];
    $distance = getDistance($addressFrom, $addressTo, "K");
    $src=$_POST['src'];
    $dst=$_POST['dst'];
    $tym=$_POST['tym'];
    $dd=$_POST['dd'];

    ?>
    
<div class="main-booking-container">

        <div class="form-container_booking">
          <form action="./userDashboard.php" method="POST" onsubmit="return bookedSuccessfully();">
            <h3>CONFIRM YOUR RIDE</h3>
           
            <table>
          <tr>
            <th>Pick Up :</th>
            <td><?php echo $src;?></td>
          </tr>
          <tr>
            <th>Destination Address :</th>
            <td><?php echo  $dst;?></td>
          </tr>
          <tr>
            <th>Date :</th>
            <td><?php echo $dd; ?></td>
          </tr>
          <tr>
            <th>Time:</th>
            <td><?php echo $tym;?></td>
          </tr>

          <?php
         $query_run = mysqli_query($con,"SELECT `fair_id`, `pickup`, `destination`, `amt` FROM 
         `fair_management`WHERE `pickup`='$src' and `destination`='$dst'");
         if(mysqli_num_rows($query_run)>0)
         {
          while($row = mysqli_fetch_array($query_run)){

            $amnt = $row['amt'];
          }
           ?>
          <tr>
            <th>Amount</th>
            <td><?php echo $amnt;?></td>
          </tr>

         
          
          <?php 
           $_SESSION['amnt']=$amnt;
           $_SESSION['src']=$src;
             $_SESSION['dst']=$dst;
             $_SESSION['dd']=$dd;
             $_SESSION['tym']=$tym;
        }
        ?>
          <tr>
          <td><a href="./userDashboard.php"><input type="submit" name="btnCancel"class="btn btn-danger"value="Cancel" ></a></td>
          <td><input type="submit" name="btn" class="btn btn-success"value="Confirm"> </td>
          </tr>
        </table>
       
        <?php
  }
  ?>
            
          </form><?php
           $amnt=$_SESSION['amnt'];
           $src=$_SESSION['src'];
           $dst= $_SESSION['dst'];
           $dd=  $_SESSION['dd'];
           $tym= $_SESSION['tym'];
          //echo '<script>alert("ghbh")</script>' ;
          if(isset($_POST['btn'])) {
             //echo '<script>alert("goobh")</script>' ;
            $bookingDB="INSERT INTO `booking`(`b_id`, `pickup`, `destination`, `time`, `date`, `amount`, `bookingStatus`)
            VALUES ('$id','$src','$dst','$tym','$dd','$amnt',0)";
            $bookingDBResult = mysqli_query($con, $bookingDB);
            if($bookingDBResult)
            {
                echo'<script>return bookedSuccessfully();</script>';
            }
            else
            {
                echo mysqli_errno($con);
               echo "<script>alert('Booking Failed')</script>";
            }
       

     }?>
         
        </div>
 

    </div>
    <?php
  }
  ?>

 <!-- Button trigger modal -->




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
function getDistance($addressFrom, $addressTo, $unit = '')
{
    // Google API key
    $apiKey = 'AIzaSyAYtW3jwQWhwsFBoRxzelC81nDBRvZpi_w';

    // Change address format
    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
    $formattedAddrTo     = str_replace(' ', '+', $addressTo);

    // Geocoding API request with start address
    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
    $outputFrom = json_decode($geocodeFrom);
    if (!empty($outputFrom->error_message)) {
        return $outputFrom->error_message;
    }

    // Geocoding API request with end address
    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
    $outputTo = json_decode($geocodeTo);
    if (!empty($outputTo->error_message)) {
        return $outputTo->error_message;
    }

    // Get latitude and longitude from the geodata
    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;

    // Calculate distance between latitude and longitude
    $theta    = $longitudeFrom - $longitudeTo;
    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
    $dist    = acos($dist);
    $dist    = rad2deg($dist);
    $miles    = $dist * 60 * 1.1515;

    // Convert unit and return distance
    $unit = strtoupper($unit);
    if ($unit == "K") {
        return round($miles * 1.609344, 2);
    } elseif ($unit == "M") {
        return round($miles * 1609.344, 2) . ' meters';
    } else {
        return round($miles, 2) . ' miles';
    }
}
?>