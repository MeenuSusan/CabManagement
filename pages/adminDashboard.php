<?php
include 'dbcon.php';
session_start();
$uname=$_SESSION['userName'];
$email=$_SESSION['userEmail'];
$photo=$_SESSION['proPic'];
$currentUserId = $_SESSION['userId'];
$res=mysqli_query($con,"SELECT * from `register` where email='$email' AND username='$uname'");
while($r=mysqli_fetch_array($res)){
  $ademail=$r['email'];
  $adname=$r['username'];

}
if(isset($_SESSION["session_id"]) != session_id()){
  header("Location:../index.php");
  die();
}
else{
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "../../images/about_us.svg"type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Hello, world!</title>
    <style>

      .col{
width: 16vw;
height: 10vw;
border-radius: 10px;
      }
      .row{
        
        grid-gap: 3vw;
      }
      .dash-container{
        top: 7vw;
        left: 24vw;
        position: absolute;
      }
      .vehicle{
        background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
        
      }
      .user{
        background-image: linear-gradient(to right, #ff9966, #ff5e62);
      }
      .users{
        background-image: radial-gradient( circle farthest-corner at 22.4% 21.7%, rgba(4,189,228,1) 0%, rgba(2,83,185,1) 100.2% );
      }
      .driver{
        background-image: linear-gradient(to right, rgb(242, 112, 156), rgb(255, 148, 114));
      }
      .iconsf{
        padding: 2vw 1vw 1vw 1vw;
        font-size: 3vw;
        color: white;
      }
      p{
        color: white;
        font-weight: bold;
      }
      .no{
        left: 9vw;
        top: 2vw;
        position: absolute;
        font-size: 3.5vw;
        color: white;
        font-weight: bolder;
      }
      .chart-container{
        top: 7vw;
        left: 24vw;
        position: absolute;
      }
    </style>
  </head>
  <body>
    
  <?php
        include "../assets/templates/adminsidebar.php";
        
  ?>
  <div class="dash-container">
    <div class="row">
      <div class="col users">
      <span><i class="fa fa-plus iconsf"></span></i>
      <p>Total Users</p>
      <div class="no">
        <?php
          $res=mysqli_query($con,"SELECT * from `register`");
          $count=mysqli_num_rows($res);
          echo $count;
        ?>
      </div>
      </div>
      <div class="user col ">
      <span><i class="fa fa-life-ring iconsf"></span></i>
      <p>Total Drivers</p>
      <div class="no">
        <?php
          $res=mysqli_query($con,"SELECT * from `driver`");
          $count=mysqli_num_rows($res);
          echo $count;
        ?>
      </div>
      </div>
      <div class="vehicle col">
      <span><i class="fa fa-cab iconsf"></span></i>
      <p>Total Vehicle</p>
      <div class="no">
        <?php
          $res=mysqli_query($con,"SELECT * from `vehicle`");
          $count=mysqli_num_rows($res);
          echo $count;
        ?>
      </div>
      </div>
      <div class="driver col">
      <span><i class="fa fa-money iconsf"></span></i>
      <p>Company Profit</p>
      <div class="no">
        <?php
         
          $res=mysqli_query($con,"SELECT company from `payment`");
          $count=0;
          while($r=mysqli_fetch_array($res)){
            $count=$count+$r['company'];
          }
          echo $count;
        ?>
      </div>
      </div>
    </div>
    <!-- table view all drivers -->
    <div class="row">
          
         

    </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}
?>