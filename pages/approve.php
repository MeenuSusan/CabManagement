<?php
session_start();
include('dbcon.php');
include 'sendEmail.php';

    $s_id=$_SESSION['session_id'];
    $s=$_GET['driver_id'];

        $approve="UPDATE `register` SET `status`=1 WHERE `id`='$s'";
        $approveResult=mysqli_query($con,$approve);
        
        $emailQuery = "SELECT email FROM register WHERE id='$s' ";
        $emailQueryRes=mysqli_query($con,$emailQuery);
        $r=mysqli_fetch_array($emailQueryRes);
        $email = $r['email'];

        if($approveResult){
            //echo "<script>alert('jh')</script>";
            $_SESSION['loginMessage']="User Approved";
            sendMail($email, "Accound verified", "Congratulations, your account has been verified. Now you can login into your account");
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
    