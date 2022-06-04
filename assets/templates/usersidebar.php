

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
                <?php echo' <img src="../assets/uploads/' . $photo . '" alt="" id="upload"accept="image/x-png,image/jpeg"/> '?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="../pages/userProfile.php">Profile</a>
                  <a class="dropdown-item" href="../pages/userChangePassword.php">Change Password</a>
                  <a class="dropdown-item" href="../pages/signout.php">Signout</a>
                </div>
              </div>
         
       </div>
      </header>
      
      <section>
        <nav>
            <div class="profile">
            <?php echo' <img src="../assets/uploads/' . $photo . '" alt="" id="upload"accept="image/x-png,image/jpeg"/> '?>
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
                <a class="dropdown-item" href="../pages/userDashboard.php">Book My Trip</a>
                
                </div>
              </div></li>
  
              <li><a href="../pages/userProfile.php"><button class="btn_1"><span><i class="fa fa-user-circle"></span></i>My Profile</button></a></li>
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
                 <span><i class="fa fa-cab"></span></i>My Booking
                </button>
                <div class="dropdown-menu dmside" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="../pages/bookingHistory.php">Booking History</a>
                </div>
              </div></li>
  
              
              <li><button class="btn_1"><span><i class="fa fa-book"></span></i>Feedback</button></li>
  
              
  
            </ul>
        </nav>
        <article>
         <!--content-->
        </article>
      </section>
        
       