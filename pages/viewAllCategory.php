<?php
include 'dbcon.php';
session_start();
$uname = $_SESSION['userName'];
$email = $_SESSION['userEmail'];
$photo = $_SESSION['proPic'];
$currentUserId = $_SESSION['userId'];
$res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
while ($r = mysqli_fetch_array($res)) {
  $ademail = $r['email'];
  $adname = $r['username'];
}
if (isset($_SESSION["session_id"]) != session_id()) {
  header("Location:home.php");
  die();
} else {
?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    </link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>All vehicle category</title>
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
                <h3 class="card-title">All  Vehicle Category</h3>
                <button class="btn btn-primary"name="addNew"data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus">Add New</i></button>
    

                <form action="#" method="$_POST">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../php/addCategory.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" name="categoryName">
          </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category Amount</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Category Amount" name="categoryDescription"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
              </div>
              </form>
              <div class="card-body">

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Category</th>
                      <th>Amount/KM</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $res = mysqli_query($con, "SELECT `id`, `category`, `price` FROM `vehiclerate`");
                

                    while ($r = mysqli_fetch_array($res)) {
                        $id = $r['id'];
                        $category = $r['category'];
                        $price = $r['price'];
                      //select driver name from register table
                      


                    //   //select booking details
                    //   $res1 = mysqli_query($con, "SELECT pickup, destination, TIMESTAMPDIFF(MINUTE,completed_time,booking_time) as total_time, date from `booking` where id='$bookingId'");
                    //   $r1 = mysqli_fetch_array($res1);
                    //   $pickup = $r1['pickup'];
                    //   $destination = $r1['destination'];
                    //   $total_time_raw = $r1['total_time'];
                    //   if ($total_time_raw < 60) {
                    //     $total_time = abs($total_time_raw) . " minutes";
                    //   } else {
                    //     $total_time = hoursandmins($total_time_raw) . ' hours';
                    //   }
                    //   $date = $r1['date'];
                    //   $paymentId = $r['id'];
                    //   $amount = $r['driver_payment'];
                    //   $bookingDetails = $pickup . " <b> - </b> " . $destination;




                    // edit amount
                    // if(isset($_POST['edit'])){
                    //   $id = $_POST['id'];
                    //   $price = $_POST['price'];
                    //     $sql1 = "UPDATE `vehiclerate` SET `price`='$price' WHERE id='$id'";
                    //     $res1 = mysqli_query($con, $sql1);
                    // }
                    ?>
                      <tr>
                        <td><?php echo   $id; ?></td>
                        <td><?php echo $category; ?></td>
                        <td><?php echo  $price; ?></td>
                        <td><button class="btn btn-primary"name="edit"data-bs-toggle="modal" data-bs-target="#exampleM"><i class="fa fa-pencil"></i></button></td>


                       


                      </tr>
                      <form action="#" method="$_POST">
                <div class="modal fade" id="exampleM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../php/addCategory.php" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $category; ?>" name="categoryName">
          </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Category Amount</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $price; ?>" name="categoryDescription"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
              </div>
              </form>
                    <?php

                    }
                    ?>
                    </thead>
                  <tbody>
                </table>


    </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        //cancel ride
        $(".setStatus").click(function() {
          var id = $(this).val();
          var btn = $(this);
          var completeBtn = $(this).siblings('.setAction');
          $(this).attr("disabled", true);
          $.ajax({
            url: "setDriverAllocationStatus.php",
            method: "POST",
            data: {
              id: id,
              status: 0
            },
            success: function(data) {
              // swal({
              //   title: "Success",
              //   text: "Status Updated",
              //   icon: "success",
              //   button: "OK",
              // });
              btn.html("Cancelled");
              completeBtn.attr("disabled", true);
            }
          });
        });

        //mark as completed
        $(".setAction").click(function() {
          var id = $(this).val();
          var btnC = $(this);
          $(this).attr("disabled", true);
          var cancelBtn = $(this).siblings('.setStatus');
          console.log(cancelBtn);
          $.ajax({
            url: "markRideCompletion.php",
            method: "POST",
            data: {
              id: id,
              action: 1
            },
            success: function(data) {
              // swal({
              //   title: "Success",
              //   text: "Status Updated",
              //   icon: "success",
              //   button: "OK",
              // });
              btnC.html("Completed");
              cancelBtn.attr("disabled", true);
            }
          });
        });
      });
    </script>
  </body>

  </html>
<?php
}
?>

<?php
function hoursandmins($time, $format = '%02d:%02d')
{
  if ($time < 1) {
    return;
  }
  $hours = floor($time / 60);
  $minutes = ($time % 60);
  return sprintf($format, $hours, $minutes);
}

?>