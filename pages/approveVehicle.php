<?php
session_start();
include('dbcon.php');
include 'sendEmail.php';
if(isset($_POST['approve'])){
    //$t=$_POST['vehicle_id'];
    //$s_id=$_SESSION['session_id'];
    $t=$_POST['delete_id'];
        $approve="UPDATE `register` SET `status`=1 WHERE `id`='$t'";
        $approveResult=mysqli_query($con,$approve);
        
        $emailQuery = "SELECT email FROM register WHERE id='$t' ";
        $emailQueryRes=mysqli_query($con,$emailQuery);
        $r=mysqli_fetch_array($emailQueryRes);
        $email = $r['email'];
         
        if($approveResult){
           sendMail($email, "Vehicle Approved", "Congratulations, your vehicle has been approved. Now you can login into your account");
            $_SESSION['loginMessage']="User Approved";
            header("Location:./viewVehicleRequest.php");
           die();
        }
        else{
            echo "<script>alert('hh')</script>";
            echo mysqli_errno($con);
            //$_SESSION['loginMessage']="User Approved Failed";
            //header("Location:./adminDashboard.php");
            // die();
        }
}
   