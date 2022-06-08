

    <header>
       <div class="head_container">
        <div class="logo">
          <a href="../../../index.html"><img src="../assets/images/logo.jpg" alt="logo"></a>
        </div>
        
        <div class="menu">
          <!--<ul>-->
          <!--  <i class="fa fa-bell"></i>-->
          <!--  <i class="fa fa-envelope"></i>-->
           
          <!--</ul>-->
        </div>
          <div class="dropdowns btn-group dropleft">
                <button class="btn_img btn-default" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
              if($photo == ""){
                echo '<img src="../assets/images/dp.svg" alt="profile">';
              }else{
               echo' <img src="../assets/uploads/' . $photo . '" alt="" id="upload"accept="image/x-png,image/jpeg"/> ';}?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="../pages/driverProfile.php">Profile</a>
                  <a class="dropdown-item" href="../pages/adminChangePassword.php">Change Password</a>
                  <a class="dropdown-item" href="../pages/signout.php">Signout</a>
                </div>
              </div>
         
       </div>
      </header>
      
      <section>
        <nav>
            <div class="profile">
              <?php
              if($photo == ""){
                echo '<img src="../assets/images/dp.svg" alt="profile">';
              }else{
              ?>
            <?php echo' <img src="../assets/uploads/' . $photo . '" alt="" id="upload"accept="image/x-png,image/jpeg"/>';}?>
                <h4><?php echo $uname ?></h4>
                <h6><?php echo $email ?></h6>
                <p>
                    <i class="fa fa-circle"></i>Online</p>
                    
            </div>
            <ul>
           
            <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-home"></span></i>Dashboard
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="./driverDashboard.php"> View All Request</a>
                  
                </div>
              </div></li>

              <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-car"></span></i>My Car
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="./viewMyCab.php">My Cab</a>
                  <a class="dropdown-item" href="./requestNewCab.php">Request New Cab</a>
                  <a class="dropdown-item" href="./viewCabRequest.php">View Cab Request</a>
                  
                </div>
              </div></li>

        
  
              <li><a href="./driverProfile.php"><button class="btn_1"><span><i class="fa fa-user-circle" ></span></i>My Profile</button></li></a>
              <!-- <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span><i class="fa fa-envelope"></span></i>Email
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Inbox</a>
                  <a class="dropdown-item" href="#">Compose Mail</a>
                  <a class="dropdown-item" href="#">Sentbox</a>
                </div>
              </div></li> -->
  
              <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-cab"></span></i>Booking
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">View all Ride History</a>
                  <a class="dropdown-item" href="./acceptedRides.php">View Accepted Rides</a>
                </div>
              </div></li>
  
              <!-- <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-calendar"></span></i>Leave
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Apply Leave</a>
                  <a class="dropdown-item" href="#">View Leave Status</a>
                </div>
              </div></li> -->
  
              <!--<li><button class="btn_1"><span><i class="fa fa-book"></span></i>Feedback</button></li>-->
  
              <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-money"></span></i> Payments
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="./driverPaymentHistory.php">Payment History</a>
                  <!-- <a class="dropdown-item" href="#">Bonus</a> -->
                </div>
              </div></li>
  
            </ul>
        </nav>
        <article>
         <!--content-->
        </article>
      </section>
        
       