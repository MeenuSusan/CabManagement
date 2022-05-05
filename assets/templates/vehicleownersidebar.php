

    <header>
       <div class="head_container">
        <div class="logo">
          <a href="../../../index.html"><img src="../assets/images/logo.jpg" alt="logo"></a>
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
                  <a class="dropdown-item" href="#">Profile</a>
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
           
            <li><div class="dropdown">
                <button class="btn_1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span><i class="fa fa-home"></span></i>Dashboard
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="../pages/vehicleOwnerDashboard.php">Vehicle Status</a>
                
                </div>
              </div></li>
  
              <li><button class="btn_1"><span><i class="fa fa-user-circle"></span></i>My Profile</button></li>
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
                 <span><i class="fa fa-cab"></span></i>Earnings
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="../pages/vehicleOwnerEarnings.php">Current Rate</a>
                </div>
              </div></li>
  
              
              <li><button class="btn_1"><span><i class="fa fa-book"></span></i>Feedback</button></li>
  
              
  
            </ul>
        </nav>
        <article>
         <!--content-->
        </article>
      </section>
        
       