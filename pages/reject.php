<?php
include('dbcon.php');
session_start();
    $s_id=$_SESSION['session_id'];
    $s=$_GET['driver_id'];
    $t=$_GET['vehicle_id'];
        $approve="UPDATE `register` SET `status`= 0 WHERE `id`='$s' or `id`='$t'";
        $approveResult=mysqli_query($con,$approve);

        if($approveResult){
            //echo "<script>alert('jh')</script>";
            $_SESSION['loginMessage']="User rejected";
            header("Location:./viewDriverRequest.php");
           // die();
        }
        else{
            echo "<script>alert('hh')</script>";
            echo mysqli_errno($con);
            //$_SESSION['loginMessage']="User Approved Failed";
            //header("Location:./adminDashboard.php");
            // die();
        }
        ?>
    