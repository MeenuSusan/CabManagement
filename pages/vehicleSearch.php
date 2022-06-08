
                                <?php
include 'dbcon.php';
                                $search = $_POST['search'];
                                //select vehicle details
                                $selectVehicleSql = "SELECT `id`, `model_company`,`reg_no`,`category`,`fuel`,`vehicle_img`,`seating_capacity` FROM `vehicle` where model_company like '$search%'";
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
                    <div class="vehcard searchRes">
                
                <div class="card" style="width: 22rem;">
                <img class="card-img-top" src="../assets/uploads/' . $vehicleImg . '" alt="Card image cap">
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
              </div>
                ';
                                    }
                                } else {
                                    echo '
                <div class="card" style="width: 22rem;">
                <p class="text-center">No result found</p>
                </div>
                ';
                                }
                                ?>

                            