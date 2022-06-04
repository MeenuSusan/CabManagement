<?php

session_start();

if (isset($_SESSION["session_id"]) != session_id()) {
    header("Location:../index.php");
    die();
} else {
    include 'dbcon.php';
    $s_id = $_SESSION['session_id'];
    $uname = $_SESSION['userName'];
    $email = $_SESSION['userEmail'];
    $photo = $_SESSION['proPic'];
    $currentUserId = $_SESSION['userId'];

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
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
        <link rel="stylesheet" href="../css/style.css">
        <title>Hello, world!</title>
        <style>
            .mycab {
                top: 5vw;
                width: 28vw;
                padding: 3vw 4vw;
                position: absolute;
                left: 20vw;
            }

            .brand {
                width: 100%;
                height: 3vw;
                background-color: #ddf542;
                text-align: center;
                font-weight: bold;
                padding: 0.5vw;
            }

            .cardet {
                padding: 1vw 0.5vw 1vw 0.5vw;
            }
        </style>
    </head>

    <body>

        <?php
        include "../assets/templates/driversidebar.php";

        ?>
        <div class="mycab">
            <?php
            //select vehicle details
            $selectVehicleSql = "SELECT `id`, `model_company`,`reg_no`,`category`,`fuel`,`vehicle_img`,`seating_capacity` FROM `vehicle` WHERE `driverAllocated` = $currentUserId";
            $selectVehicle = mysqli_query($con, $selectVehicleSql);
            if (mysqli_num_rows($selectVehicle) > 0) {
                while ($row = mysqli_fetch_array($selectVehicle)) {
                    $vehicleId = $row['id'];
                    $vehicleName = $row['model_company'];
                    $vehicleRegNo = $row['reg_no'];
                    $vehicleCategoryId = $row['category'];
                    //select vehicle category
                    $selectVehicleCategorySql = "SELECT `id`, `category` FROM `vehiclerate` WHERE `id` = $vehicleCategoryId";
                    $selectVehicleCategory = mysqli_query($con, $selectVehicleCategorySql);
                    if (mysqli_num_rows($selectVehicleCategory) > 0) {
                        while ($row2 = mysqli_fetch_array($selectVehicleCategory)) {
                            $vehicleCategory = $row2['category'];
                        }
                    }
                    $vehicleFuel = $row['fuel'];
                    $vehicleImg = $row['vehicle_img'];
                    $vehicleSeatingCapacity = $row['seating_capacity'];
                    echo '
                
                <div class="card" style="width: 22rem;">
                <img class="card-img-top" src="../assets/images/vehiclewagon.jpg" alt="Card image cap">
                <div class="card-body p-0 m-0">
                    <div class="brand">
                        ' . $vehicleName . '
                    </div>
                    <div class="cardet">
                        <table>
                        <tr>
                          <th>
                              Reg. No.:
                          </th>
                          <td>
                          ' . $vehicleRegNo . '
                          </td>
                      </tr>
              
                      <tr>
                          <th>
                              Category :
                          </th>
                          <td>
                          ' . $vehicleCategory . '
                          </td>
                      </tr>
                      <tr>
                          <th>
                              Fuel :
                          </th>
                          <td>
                          ' . $vehicleFuel . '
                          </td>
                      </tr>
                      <tr>
                          <th>
                              Seating Capacity :
                          </th>
                          <td>
                          ' . $vehicleSeatingCapacity . '
                          </td>
                      </tr>
                        </table>
                      
                    </div>
                  
              
                </div>
              </div>
                ';
                }
            } else {
                echo '
                <div class="card" style="width: 22rem;">
                <p class="text-center">No vehicle allocated</p>
                <a href="./requestNewCab.php" class="btn btn-primary btn-block">Add Vehicle</a>
                </div>
                ';
            }
            ?>

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