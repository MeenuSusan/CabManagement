<?php
include 'dbcon.php';
session_start();
$s_id=$_SESSION['session_id'];
$uname=$_SESSION['userName'];
$email=$_SESSION['userEmail'];


$res=mysqli_query($con,"SELECT * from `register` where email='$email' AND username='$uname'");
while($r=mysqli_fetch_array($res)){
  $ademail=$r['email'];
  $adname=$r['username'];

}
if(isset($_SESSION["session_id"]) != session_id()){
  header("Location:home.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "../../images/about_us.svg"type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    
  <?php
        include "../assets/templates/adminsidebar.php";
        
  ?>
  <section>
    <div class="container-fluid tableDriver">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Driver Requests</h3>
            </div>

            <div class="card-body">
         
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Driver Name</th>
                    <th>Driver Email</th>
                    <th>Driver Phone</th>
                  
                    <th>Driver DOB</th>
        
                    <th>Driver License</th>
                    <th>Driver License Expiry</th>
                    <!-- <th>Driver License Image</th>
                    <th>Driver Image</th> -->
                    <th>Driver Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $res=mysqli_query($con,"SELECT a.username,a.email,a.mobile,a.id,b.address,b.dob,b.gender,b.license_no,b.license_validity,
                  b.licence_doc,a.profile_pic,a.status from driver b INNER JOIN register a WHERE  b.d_id =a.id");
                 
                  
                  while($r=mysqli_fetch_array($res)){
                    $driver_id=$r['id'];
                    $driver_name=$r['username'];
                    $driver_email=$r['email'];
                    $driver_phone=$r['mobile'];
                    $driver_address=$r['address'];
                    $driver_dob=$r['dob'];
                    $driver_gender=$r['gender'];
                    $driver_license=$r['license_no'];
                    $driver_license_expiry=$r['license_validity'];
                    // $driver_license_image=$r['licence_doc'];
                    // $driver_image=$r['profile_pic'];
                    $driver_status=$r['status'];
                    ?>
                    <tr>
                      <td><?php echo $driver_name; ?></td>
                      <td><?php echo $driver_email; ?></td>
                      <td><?php echo $driver_phone; ?></td>
    
                        <td><?php echo $driver_dob; ?></td>
                       
                      <td><?php echo $driver_license; ?></td>
                      <td><?php echo $driver_license_expiry; ?></td>
                      <!-- <td><img src="../../images/<?php echo $driver_license_image; ?>" alt=""></td>
                      <td><img src="../../images/<?php echo $driver_image; ?>" alt=""></td> -->
            
                        <td><?php 
                         
                          if($driver_status==1){?>
                           <button class="btn btn-success">Approved</button><?php
                          }
                          elseif($driver_status==0){?>
                            <button class="btn btn-danger">Rejected</button><?php
                          }
                          elseif($driver_status==2){?>
                            <button class="btn btn-warning">Pending</button><?php
                          }
                          else{
                            echo "Not Approved";
                          }
                          ?></td>
                       </td>
                        <td class="btn_arp">
                          <!-- <a href="viewDriverRequest.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-primary">View</a> -->
                          <span> <a href="approve.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-success" name="btn_approve"><i class="fa fa-check"></i></a></span>
                          <a href="reject.php?driver_id=<?php echo $driver_id; ?>" class="btn btn-danger"name="btn_reject"><i class="fa fa-trash"></i></a>
                        </td>
                </tr>
                <?php

}
?>
                </thead>
                <tbody>
              </table>
           

  </section>

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