<?php
session_start();
include('dbcon.php');
?>

<!-- change password php-->
<?php
    if(isset($_POST['change_password'])){
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_SESSION['userEmail'];
        $sql = "SELECT * FROM `register` WHERE `email`='$email'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $userData = mysqli_fetch_assoc($result);
            $password = $userData['password'];
            if($password == md5($current_password)){
                if($new_password == $confirm_password){
                    $new_password = md5($new_password);
                    $sql = "UPDATE `register` SET `password`='$new_password' WHERE `email`='$email'";
                    $result = mysqli_query($con, $sql);
                    if($result){
                        $_SESSION['profileUpdateMsg'] = 'Password Changed Successfully';
                        $_SESSION['profileUpdateMsgHeading'] = 'Success';
                        header("location: userChangePassword.php");
                        
                    }
                    else{
                        $_SESSION['profileUpdateMsg'] = 'Password Change Failed';
                        $_SESSION['profileUpdateMsgHeading'] = 'Error';
                        header("location: userChangePassword.php");
                        
                    }
                }
                else{
                    $_SESSION['profileUpdateMsg'] = 'Password Mismatch';
                    $_SESSION['profileUpdateMsgHeading'] = 'Error';
                    header("location: userChangePassword.php");
                    
                }
            }
            else{
                $_SESSION['profileUpdateMsg'] = 'Current Password Mismatch';
                $_SESSION['profileUpdateMsgHeading'] = 'Error';
                header("location: userChangePassword.php");
                
            }
        }
        else{
            $_SESSION['profileUpdateMsg'] = 'User not found';
            $_SESSION['profileUpdateMsgHeading'] = 'Error';
            header("location: userChangePassword.php");
            
        }
    }