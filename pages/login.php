<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="../javascript/validate.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
  </link>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="icon" href="../../images/about_us.svg" type="image/x-icon">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/login.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <?php
  include "../assets/templates/header.php";

  ?>
  <?php
      include "dbcon.php";
      session_start();
      if (isset($_SESSION['loginMessage'])) {
        echo '
        <center><div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>' . $_SESSION['loginMessage'] . '</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div></center>
        ';
        unset($_SESSION['loginMessage']);
      }
      ?>

  <div class="main-container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="./authentication.php" method="POST" class="sign-in-form" onsubmit="return loginvalidate()">
          <h2 class="title">Sign in</h2>

          <div class="input-field">
            <i class="fas fa-envelope"></i>

            <input type="text" placeholder="Email_Id" name="log_email" onkeyup=" return email_id();" id="user_email" />
          </div>
          <span id="user_email_error"> </span>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" onkeyup="return passWord();" name="log_pwd" id="pwd" />
          </div>
          <span id="pwd_error"> </span>
          <input type="submit" value="Login" class="btn solid" name="log_sub" id="logsub" />
        </form>
        <form action="./authentication.php" method="POST" class="sign-up-form" onsubmit="return validate()" ;>
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="uname" onkeyup=" return userName();" id="username" />

          </div>
          <span id="username_error"> </span>
          <div class="input-field">
            <i class="fas fas fa-mobile"></i>
            <input type="tel" placeholder="Mobile" name="mobileno" onkeyup=" return mobileNumber();" id="mobile" />

          </div>
          <span id="mobile_error"> </span>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" onkeyup="return email_id();" id="user_email" />
          </div>
          <span id="user_email_error"> </span>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" onkeyup="return passWord();" name="password" id="pwd" />
          </div>
          <span id="pwd_error"> </span>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" onkeyup="return confirmPWD();" placeholder="Confirm Password" name="con_password" id="cpwd" />
          </div>
          <span id="cpwd_error"> </span>

          <input type="submit" class="btn" value="Sign up" name="reg_btn" id="regbtn" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="../assets/images/undraw_maker_launch_re_rq81.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="../assets/images/undraw_order_ride_re_372k (1).svg" class="image" alt="" />
      </div>
    </div>
  </div>
  <?php
  // include "./assets/templates/footer.php";
  ?>
  <script>
    $('#pwd').tooltip({
      'trigger': 'focus',
      'title': 'Password tooltip'
    });
  </script>
  <script src="../javascript/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> <!-- Sweet Alert -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>