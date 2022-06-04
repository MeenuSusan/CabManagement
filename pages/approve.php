<?php
session_start();
include('dbcon.php');

    $s_id=$_SESSION['session_id'];
    $s=$_GET['driver_id'];

        $approve="UPDATE `register` SET `status`=1 WHERE `id`='$s'";
        $approveResult=mysqli_query($con,$approve);

        if($approveResult){
            //echo "<script>alert('jh')</script>";
            $_SESSION['loginMessage']="User Approved";
            header("Location:./viewDriverRequest.php");
           die();
        }
        else{
            echo "<script>alert('hh')</script>";
            echo mysqli_errno($con);
            //$_SESSION['loginMessage']="User Approved Failed";
            //header("Location:./adminDashboard.php");
            // die();
        }
        ?>
    