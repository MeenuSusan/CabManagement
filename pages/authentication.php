<?php
session_start();
include('dbcon.php');
//if (isset($_SESSION["session_id"]) == session_id()) {
// header("Location: ../dashboard.php");
 //die(); } else {

    // Register user
    if (isset($_POST['reg_btn'])) {
       
        register(1,1);
        header("Location: ./login.php");
       
        
    }

    
    if (isset($_POST['btnConfirm'])) {
        confirmBooking();
       

     }





    //Register driver
    if (isset($_POST['reg_driver'])) { 
        if(register(2,2))
        {   
            extract($_POST);
            $driverID="SELECT * FROM `register`ORDER BY `id` DESC LIMIT 1";
            $result1=mysqli_query($con,$driverID);
            while($t=mysqli_fetch_array($result1))
            {
                $driverID=$t['id'];
            }
            $driverDB="INSERT INTO `driver`(`d_id`,`address`, `gender`, `dob`, `license_no`, `license_validity`, `licence_doc`) VALUES
             ('$driverID','$dri_address','$gender','$dob','$li_no','$lvd','$drili')";
             $driverDBResult = mysqli_query($con, $driverDB);
             header("Location: ./login.php");
        }
        
       
    }

     //Register vehicle
     if (isset($_POST['reg_vehicle'])) {
       

        if(register(3,2))
        {   
            extract($_POST);
            //echo '<script>alert("g6666gh")</script>';
            $vehicleID="SELECT * FROM `register`ORDER BY `id`";
            $result2=mysqli_query($con,$vehicleID);
           // echo '<script>alert("gh888gh")</script>';
            while($f=mysqli_fetch_array($result2))
            {
                $vehicleID=$f['id'];
               
            }
           // echo '<script>alert("g999gh")</script>';

          
            $extension = pathinfo($_FILES["vehi_img"]["name"], PATHINFO_EXTENSION);
            if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                $ImageUpload = $_FILES["vehi_img"]["name"];
                move_uploaded_file($_FILES["vehi_img"]["tmp_name"], "../assets/images/vehicle" . $_FILES["vehi_img"]["name"]);

            } 
            $ImageUpload = $_FILES["vehi_img"]["name"];
            move_uploaded_file($_FILES["vehi_img"]["tmp_name"], "../assets/images/vehicle" . $_FILES["vehi_img"]["name"]);
          

            $vehicleDB="INSERT INTO `vehicle`(`u_id`, `reg_no`, `model_company`, `fuel`, `seating_capacity`, `color`, `engine_no`, `chaise_no`, `reg_validity`, `insurence_scheme`, `insurence_validity`, `tax`, `pollution`, `vehicle_img`, `rc_doc`) 
            VALUES ('$vehicleID','$reg_no','$company','$fuels','$seatcap','$color','$engine','$chaise','$reg_val','$ins_scheme','$ins_val','$tax_val','$po_val',' $ImageUpload','$rc_doc')";
             $vehicleDBResult = mysqli_query($con, $vehicleDB);
             if($vehicleDBResult)
             {
                header("Location: ./login.php");
             }
             else
             {
                echo mysqli_errno($con);
             }
             //header("Location: ./login.php");
        }
    }

    // Login check
    if (isset($_POST['log_sub'])) {
        // Empty check
        if (!empty($_POST['log_email']) and !empty($_POST['log_pwd'])) {
            // Collecting values
            extract($_POST);
            $password = md5($log_pwd);
            //Check if mobile already exisit
            //type
            //0-admin
            //1-user
            //2-driver
            //3-vehicle owner

            //status 1-enable
            //0-disable
            $sql = "SELECT * FROM `register` WHERE `email`='$log_email' and `password`='$password'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1) {
                $userData = mysqli_fetch_assoc($result);
                $_SESSION['session_id'] = session_id();
                $_SESSION['userName'] = $userData['username'];
                $_SESSION['userEmail'] = $userData['email'];
                $_SESSION['proPic'] = $userData['profile_pic'];
                $_SESSION['userId'] = $userData['id'];
                if ($userData['type'] == 0) {
                    header("Location:./adminDashboard.php");
                    die();
                } else if ($userData['type'] == 1) {
                    header("Location: ./userDashboard.php");
                    die();
                }
                else if ($userData['type'] == 2) {
                    header("Location: ./driverDashboard.php");
                    die();
                }
                else if ($userData['type'] == 3) {
                    header("Location: ./vehicleOwnerDashboard.php");
                    die();
                }
                
            } else {
                $_SESSION['loginMessage'] = "User Login Failed";
                //header("Location: ../index.php");
                die();
            }
        } else {
            $_SESSION['loginMessage'] = "Please fill all fields";
            header("Location: ../index.php");
            die();
        }
    }
// }


function register($t,$s)
{
    include('dbcon.php');
    if (!empty($_POST['email']) and !empty($_POST['mobileno'])) {
        // Collecting values
        extract($_POST);
        //check password and confirm password

        //Check if mobile already exisit
        $checkMobile = "SELECT * FROM `register` WHERE mobile='$mobileno'";
        $checkMobileResult = mysqli_query($con, $checkMobile);
        $checkMobileCount = mysqli_num_rows($checkMobileResult);
        //No user exists
        if ($checkMobileCount == 0) {
            //CHECK IF EMAIL ALREADY EXISTS
            $checkEmail = "SELECT * FROM `register` WHERE `email`='$email'";
            $checkEmailResult = mysqli_query($con, $checkEmail);
            $checkEmailCount = mysqli_num_rows($checkEmailResult);

            //No user exists
            if ($checkEmailCount == 0) {
               
                    $password = md5($password);
                   
                    //Insert into database
                    $insertDb = "INSERT INTO `register`(`username`, `mobile`, `email`, `password`, `type`,`status`) VALUES ('$uname','$mobileno','$email','$password','$t','$s')";
                    $insertDbResult = mysqli_query($con, $insertDb);
                    if ($insertDbResult) {
                    
                        $_SESSION['loginMessage'] = "Register Success";
                        return true;
                        die();
                    } else {
                        $_SESSION['loginMessage'] = "User Register Failed";
                        return false;
                        die();
                    }
               
                
            } else {
                $_SESSION['loginMessage'] = "User Email Already exisit";
                return false;
                die();
            }
        } else {
            $_SESSION['loginMessage'] = "User Mobile Already exisit";
            return false;
            die();
        }
    } else {
        $_SESSION['loginMessage'] = "Please fill all fields";
        return false;
        die();
    }
}

function confirmBooking(){
    
    include('dbcon.php');
        extract($_POST);
        if(isset ($_POST['btnBook'])){
            echo"<script>alert('dbdsnvbdfkjbk')</script>";
            $src=$_POST['src'];
            $dst=$_POST['dst'];
            $tym=$_POST['tym'];
            $dd=$_POST['dd'];
           
        //echo '<script>alert("g6666gh")</script>';
        $bookingID="SELECT * FROM `register`ORDER BY `id`";
        $result2=mysqli_query($con,$bookingID);
      
        while($f=mysqli_fetch_array($result2))
        {
            $bookingID=$f['id'];
           
        }
       // echo '<script>alert("g999gh")</script>';
        $bookingDB="INSERT INTO `booking`(`b_id`, `pickup`, `destination`, `time`, `date`,`bookingStatus`)
         VALUES ('$bookingID','$src','$dst','$tym','$dd',2)";
         $bookingDBResult = mysqli_query($con, $bookingDB);
         if($bookingDBResult)
         {
            return true;
         }
         else
         {
            return false;
         }
         

        }
       
   }

   