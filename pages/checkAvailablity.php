<?php
include 'dbcon.php';
include 'getDistance.php';


$from = $_POST['from'];
$to = $_POST['to'];
$people = $_POST['people'];
$category = $_POST['category'];
$distance = getDistance($from, $to, "K");
//check seating capacity
$sql = "SELECT seating_capacity FROM `vehicle` WHERE seating_capacity>='$people' and category='$category'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
  if($distance > 100){
    echo '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Opps!!!</strong> We currently support rides only upto 100 Kms.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ';
    }
    else{
    echo 'success';
    }
}else{
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sorry!!!</strong> We don\'t have any cabs to accommodate '.$people.' peoples in the selected cab category.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  ';
}


    
