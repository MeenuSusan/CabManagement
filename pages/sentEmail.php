<?php

function sendMail($to, $subject, $message) {
    include('dbcon.php');
    $to_email = $to;
    $subject = $subject;
    $body = $message;
    $headers = "From: meenuphilip1998@gmail.com";

    //check if email already exisit in tbl_user
    $sql = "SELECT * FROM register WHERE email = '$to_email'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if($count>0){
        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['emailSendStatus']  = "Email successfully sent to $to_email";
        } else {
            $_SESSION['emailSendStatus'] = "Email sending failed...";
        }
    }
    else{
        $_SESSION['emailSendStatus'] = "This email not exist in our database";
    }
    
}
