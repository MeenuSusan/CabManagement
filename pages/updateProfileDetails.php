<?php
session_start();
include 'dbcon.php';
$s_id=$_SESSION['session_id'];
$uname=$_SESSION['userName'];
$email=$_SESSION['userEmail'];
$photo=$_SESSION['proPic'];
$currentUserId = $_SESSION['userId'];
if(isset($_POST['proUpdate'])){
            $name = $_POST['uname'];
            $emails= $_POST['email'];
            $mobile = $_POST['mobile'];
            $propic=$_FILES['uploadfile']['name'];
            if(!empty($propic)){
            
            move_uploaded_file($_FILES['uploadfile']['tmp_name'],"../assets/uploads/".$_FILES['uploadfile']['name']);
            $insertImg="INSERT INTO register(profile_pic) values('$propic')where id=$currentUserId";
            $result=mysqli_query($con,$insertImg);
            
            // upddate profile
            $sql6 = "UPDATE register SET username='$name', email='$emails', mobile='$mobile',profile_pic='$propic' WHERE id='$currentUserId'";
            $result1 = mysqli_query($con, $sql6);
            if($result1){
              echo "<script>alert('Profile Updated Successfully');</script>";
              header("location:profileUpdate.php");
            }
            else{
              echo "<script>alert('Profile Not Updated');</script>";
              header("location:profileUpdate.php");
            }
          }else if(empty($propic)){
            $sql6 = "UPDATE register SET username='$name', email='$emails', mobile='$mobile' WHERE id='$currentUserId'";
            $result1 = mysqli_query($con, $sql6);
            if($result1){
              echo '<script> swal("Success!", "Booked Successfully", "success");</script>';
              header("location:profileUpdate.php");
            }
            else{
              echo "<script>alert('Profile Not Updated');</script>";
              header("location:profileUpdate.php");
            }
          }
        }
