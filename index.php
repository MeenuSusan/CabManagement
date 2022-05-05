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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>index</title>
  </head>
  <body>

  <header">
       <div class="head_container">
        <div class="logo">
          <a href="../pages/index.php"><img src="./assets/images/logo.jpg" alt="logo"></a>
        </div>
        <div class="page_links">
          <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../../../about_us.html">About</a></li>
            <li><a href="../../../contact_us.html">Contact</a></li>
            <li><a href="./pages/rider_option.php">Signup</a></li>
            <li><a href="./pages/login.php">Login</a></li>
          </ul>
        </div> 
      </header>
  
 
          <div class="hero">
            <div class="herocon">
              <h4>Book Your Ride Now with more exciting Offers</h4>
              <p>With every safety feature and every standard in our Community Guidelines, 
                we're committed to helping to create a safe environment for our users.
                Get where you’re going easily and reliably with the tap of a button. Choose the ride option that best suits your needs.</p>
                 <a href="./pages/login.php"><button type="button" class="btn btn-secondary btn-lg btn-block">Book Your Ride Now</button>  </a>
            </div>
          </div>


          <div class="fair_calculater">
            <div class="fair_img">
              <img src="./assets/images/undraw_calculator_re_jy39.svg" alt="fair_calculater">
            </div>
            <div class="faircalc">
              <div class="faircalccon">
                <h3>Fair Calculator</h3>
                <p> With every safety feature and every standard in our Community Guidelines, we're committed to helping to create a safe environment for our users.</p>
                <input class="form-control" type="text" placeholder="Pick up Location">
                <input class="form-control" type="text" placeholder="Destination">
                <button type="button" class="btn btn-secondary btn-lg btn-block w-75">Calculate Fair</button>
              </div>
            </div>
          </div>


          <div class="about">
            <div class="about_txt">
              <h3>About</h3>
              <p>We reimagine the way the world moves for the better.Movement is what we power. It’s our lifeblood. It runs through our veins.
                 It’s what gets us out of bed each morning. It pushes us to constantly reimagine how we can move better. 
                 For you. For all the places you want to go. For all the things you want to get. For all the ways you want to earn.
                 Across the entire world. In real time. At the incredible speed of now.
            </p></div>
            <div class="about_img">
              <img src="./assets/images/undraw_order_a_car_-3-tww.svg" alt="about_img">
            </div>
          </div>


          <div class="services"></div>


          <div class="app_download">
            <div class="app_img">
              <img src="./assets/images/undraw_mobile_app_re_catg (1).svg" alt="app_download">
            </div>
            <div class="app_img">
              <h3>Download App Now</h3>
              <b><p class="app_scon">Download our mobile app to make 
                your taxi experience better than ever before!</p></b>
                <p class="app_con">Our brand new taxi app is now available for Android and iOS! With its help, you can fully customize your next taxi order. This includes selecting a driver as well as picking a 
                  type of car or any additional services that we offer.</p>
                  <button type="button" class="btn btn-secondary btn-lg btn-block mt-5">Download Now</button>
            </div>
          </div>
          <div class="contact">
            
            <div class="contact_input">
              <form>
                <h3>Contact Us</h3>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Mobile Number</label>
                  <input type="tel" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Your Message</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-secondary btn-lg btn-block">Submit</button>
              </form>
            </div>
            <div class="contact_img">
              <img src="./assets/images/undraw_contact_us_re_4qqt.svg" alt="">
            </div>
          </div>
      
          <?php
        include "./assets/templates/footer.php";
      ?>
 

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>