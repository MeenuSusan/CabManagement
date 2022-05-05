<?php
include('dbcon.php');
session_start();
if(isset($_POST['approve'])){
    //$t=$_POST['vehicle_id'];
    //$s_id=$_SESSION['session_id'];
    $t=$_POST['delete_id'];
    echo "<script>alert('$s_id')</script>";
        $approve="UPDATE `register` SET `status`=1 WHERE `id`='$t'";
        $approveResult=mysqli_query($con,$approve);
         
        if($approveResult){
           
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
   