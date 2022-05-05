
    <header>
       <div class="head_container">
        <div class="logo">
          <a href="../../index.php"><img src="../assets/images/logo.jpg" alt="logo"></a>
        </div>
        <div class="input-group rounded searchbar">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
              <i class="fa fa-search"></i>
            </span>
          </div>
        <div class="menu">
          <ul>
            <i class="fa fa-bell"></i>
            <i class="fa fa-envelope"></i>
           
          </ul>
        </div>
          <div class="dropdowns btn-group dropleft">
                <button class="btn_img btn-default" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="../assets/images/dp.svg" alt="user">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="">Profile</a>
                  <a class="dropdown-item" href="../pages/adminChangePassword.php">Change Password</a>
                  <a class="dropdown-item" href="../pages/signout.php">Signout</a>
                </div>
              </div>
         
       </div>
      </header>
      
      <section>
        <nav>
            <div class="profile">
                <img src="../assets/images/dp.svg" alt="user">
                <h4><?php echo $uname ?></h4>
                <h6><?php echo $email ?></h6>
                <p>
                    <i class="fa fa-circle"></i>Online</p>
                    
            </div>
          <ul>
           
            <li><button class="btn_1"><span><i class="fa fa-home"></span></i>Dashboard</button></li>


            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i class="fa fa-envelope"></span></i>Email
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Inbox</a>
                <a class="dropdown-item" href="#">Compose Mail</a>
                <a class="dropdown-item" href="#">Sentbox</a>
              </div>
            </div></li>

            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-user"></span></i>Manage Drivers
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="../pages/viewDriverRequest.php">View all Requests</a>
              </div>
            </div></li>

            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-users"></span></i>Manage Passengers
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">View all Customers</a>
                <a class="dropdown-item" href="#">Add new Customer</a>
              </div>
            </div></li>

            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-cab"></span></i>Manage Vehicles
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="../pages/viewVehicleRequest.php">View all Request</a>
              <a class="dropdown-item" href="../pages/approvedVehicles.php">View Approved Request</a>
              <a class="dropdown-item" href="../pages/rejectedVehicles.php">View Rejected Request</a>

              </div>
            </div></li>

            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-car"></span></i>Manage Bookings
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">View all Bookings</a>
              </div>
            </div></li>


            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-location-arrow"></span></i>Vehicle Category
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="../pages/viewAllCategory.php">View all Category</a>
               
              </div>
            </div></li>

            <li><div class="dropdown">
              <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span><i class="fa fa-money"></span></i>Manage Payments
              </button>
              <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="../pages/companyPayment.php">Company Payments</a>
                <a class="dropdown-item" href="../pages/driverPayment.php">Driver Payments</a>
                <a class="dropdown-item" href="../pages/vehiclePayment.php">Vehicle Payments</a>
              </div>
            </div></li>

          </ul>
        </nav>
        
        <article>
         <!--content-->
        </article>
      </section>
      
      