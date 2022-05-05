<?php
include('dbcon.php');
session_start();
if(isset($_POST['rejectbtn'])){
    //$t=$_POST['vehicle_id'];
    //$s_id=$_SESSION['session_id'];
    $t=$_POST['delete_ids'];
    echo "<script>alert('$s_id')</script>";
        $reject="UPDATE `register` SET `status`=0 WHERE `id`='$t'";
        $approveResult=mysqli_query($con,$reject);
         
        if($approveResult){
           
            $_SESSION['loginMessage']="User Rejected";
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
   