<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
    header("Location:../index.php");
    die();
} else {
    include 'dbcon.php';
    $uname = $_SESSION['userName'];
    $email = $_SESSION['userEmail'];
    $photo = $_SESSION['proPic'];
    $currentUserId = $_SESSION['userId'];
    $t = $_GET['vehicle_id'];
    $res = mysqli_query($con, "SELECT * from `register` where email='$email' AND username='$uname'");
    while ($r = mysqli_fetch_array($res)) {
        $ademail = $r['email'];
        $adname = $r['username'];
    }
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
        <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Hello, world!</title>
    </head>

    <body>

        <?php
        include "../assets/templates/adminsidebar.php";

        ?>
        <div class="form-container_BOOK" id="myForm">

            <?php
            $vehi = mysqli_query($con, "SELECT a.username,a.email,a.mobile,a.id,a.profile_pic,a.status,c.u_id,c.reg_no,c.model_company,c.fuel,c.seating_capacity,c.engine_no,c.chaise_no,c.reg_validity,c.insurence_scheme,c.insurence_validity,c.tax,c.pollution,c.vehicle_img,c.rc_doc
from vehicle c INNER JOIN register a WHERE  c.u_id =a.id AND c.u_id ='$t'");
           
            while ($row = mysqli_fetch_array($vehi)) {
                $vehicleImg=$row['vehicle_img']; ?>
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th scope="col">User Name</th>
                            <td><?php echo $row["username"]; ?></td>
                            <th scope="col">Email</th>
                            <td><?php echo $row["email"]; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Mobile Number</th>
                            <td><?php echo $row["mobile"]; ?></td>
                            <th scope="col">Register Number</th>
                            <td><?php echo $row["reg_no"]; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Model & Company</th>
                            <td><?php echo $row["model_company"]; ?></td>
                            <th scope="col">Fuel</th>
                            <td><?php echo $row["fuel"]; ?></td>
                        </tr>

                        <tr> 
                            <th scope="col">Pollution Validity</th>
                            <td><?php echo $row["pollution"]; ?></td>
                            <th scope="col">Seating Capacity</th>
                            <td><?php echo $row["seating_capacity"]; ?></td>
                            
                        </tr>

                        <tr>
                            <th scope="col">Engine Number</th>
                            <td><?php echo $row["engine_no"]; ?></td>
                            <th scope="col">Chaise Number</th>
                            <td><?php echo $row["chaise_no"]; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Regitration Validity</th>
                            <td><?php echo $row["reg_validity"]; ?></td>
                            <th scope="col">Insurence Schem</th>
                            <td><?php echo $row["insurence_scheme"]; ?></td>
                        </tr>

                        <tr>
                            <th scope="col">Insurence Validity</th>
                            <td><?php echo $row["insurence_validity"]; ?></td>
                            <th scope="col">Tax</th>
                            <td><?php echo $row["tax"]; ?></td>
                        </tr>

                        <tr>
                           
                            <th scope="col">Image</th>
                            <td width="200"><?php echo '<img class="card-img-top" src="../assets/uploads/' . $vehicleImg . '" alt="vehicle-img">' ?></td>
                            <th rolspan="2" scope="col">Status</th>
                            <td>
                                <?php

                                if ($row['status'] == 1) { ?>
                                    <button class="btn1 btn-success btn-block btn-sm " disabled>Approved</button><?php
                                                                                            } elseif ($row['status'] == 0) { ?>
                                    <button class="btn1 btn-danger btn-block btn-sm" disabled>Rejected</button><?php
                                                                                            } elseif ($row['status'] == 2) { ?>
                                    <button class="btn1 btn-warning btn-block btn-sm" disabled>Pending</button><?php
                                                                                            } else {
                                                                                                echo "Not Approved";
                                                                                            }
                                                                                                ?>
                            </td>
                        </tr>



                        <td><button class="btn btn-primary btn-block acbtn">Accept</button></td>
                        <td></td>

                        <td><button class="btn btn-danger btn-block rejbtn">Reject</button></td>
                        <td><a href="./approvedVehicles.php"><button class="btn btn-dark btn-block ">Close</button></a></td>
                        </tr>
                    </thead>
                    <?php

                    ?>

        </div>
        </div>
        <!-- accept POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="acmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./approveVehicle.php" method="POST">

                        <div class="modal-body">

                            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" id="delete_id">

                            <h4> Do you want to Approve</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="clso" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                            <input type="submit" value="Yes !! Accept it. " name="approve" class="btn btn-primary"> </input>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- reject POP UP FORM (Bootstrap MODAL) -->
        <div class="modal fade" id="remodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="./rejectVehicle.php" method="POST">

                        <div class="modal-body">
                            <h4> Do you want to reject this Data ?</h4>
                            <input type="hidden" name="delete_ids" value="<?php echo $row['id']; ?>" id="delete_ids">
                        <?php
                    }
                        ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="cls1" data-dismiss="modal"> NO </button>
                            <input type="submit" name="rejectbtn" class="btn btn-primary" value=" Yes !! reject it">
                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>

        </section>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script>
            $(document).ready(function() {

                $('.acbtn').on('click', function() {

                    $('#acmodal').modal('show');

                });
            });

            $(document).ready(function() {

                $('.rejbtn').on('click', function() {

                    $('#remodal').modal('show');

                });
            });
        </script>
        <script src="/css/bootstrap/js/bootstrap.min.js"></script>


    </body>

    </html>
<?php

}
?>