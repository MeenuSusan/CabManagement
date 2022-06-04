<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "icon" href = "../../images/about_us.svg"type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/progress.css">
    <title>Driver Register</title>
    <script>
       function driverValidate() {
  if (
    document.getElementById("dri_name").value.length == 0 ||
    document.getElementById("dri_mail").value.length == 0 ||
    document.getElementById("dri_mob").value.length == 0 ||
    document.getElementById("dri_address").value.length == 0 ||
    document.getElementById("dob").value.length == 0 ||
    document.getElementById("gender").value.length == 0 ||
    document.getElementById("lis_no").value.length == 0 ||
    document.getElementById("lvd").value.length == 0 ||
    document.getElementById("drili").value.length == 0 ||
    document.getElementById("dri_pwd").value.length == 0 ||
    document.getElementById("dri_cpwd").value.length == 0 
    

  ) {
    swal("Oops!", "Complete Registration", "error");
    return false;
  }
} 

let span = document.getElementsByTagName("span");

function dri_name() {
  var userName = document.getElementById("dri_name").value;
  var userName_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (userName_regex.test(userName)) {
    document.getElementById("dri_name").style.border = "1px solid green";
    document.getElementById("dri_name_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("dri_name").style.border = "1px solid red";
    document.getElementById("dri_name_error").innerHTML = "Invalid user name";
    return false;
  }
}

function email_id() {
  var email = document.getElementById("dri_mail").value;
  var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (email_regex.test(email)) {
    document.getElementById("dri_mail").style.border = "1px solid green";
    document.getElementById("dri_mail_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("dri_mail").style.border = "1px solid red";
    document.getElementById("dri_mail_error").innerHTML = "Invalid Email_id";
    return false;
  }
}

function mobileNumber() {
  var mobile = document.getElementById("dri_mob").value;
  var mobile_regex = /^[0-9]{10}$/;
  if (mobile_regex.test(mobile)) {
    document.getElementById("dri_mob").style.border = "1px solid green";
    document.getElementById("dri_mob_erroe").innerHTML = "";
    return true;
  } else {
    document.getElementById("dri_mob").style.border = "1px solid red";
    document.getElementById("dri_mob_error").innerHTML = "Invalid Mobile Number";
    return false;
  }
}

function address() {
  var address = document.getElementById("dri_address").value;
  var address_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (address_regex.test(address)) {
    document.getElementById("dri_address").style.border = "1px solid green";
    document.getElementById("dri_address_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("dri_address").style.border = "1px solid red";
    document.getElementById("dri_address_error").innerHTML = "Invalid Address";
    return false;
  }
}


function passWord() {
  var password = document.getElementById("pwd").value;
  var password_regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
  if (password_regex.test(password)) {
    document.getElementById("pwd").style.border = "1px solid green";
    document.getElementById("pwd_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("pwd").style.border = "1px solid red";
    document.getElementById("pwd_error").innerHTML = "Invalid Password";
    return false;
  }
}

function driverLicenseNumber() {
  var vehicle_registration_number = document.getElementById(
    "lis_no"
  ).value;
  var vehicle_registration_number_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (vehicle_registration_number_regex.test(vehicle_registration_number)) {
    document.getElementById("lis_no").style.border =
      "1px solid green";
    document.getElementById("lis_no_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("lis_no").style.border =
      "1px solid red";
    document.getElementById("lis_no_error").innerHTML =
      "Invalid Vehicle Registration Number";
    return false;
  }
}

function VehicleCompany() {
  var vehicle_company = document.getElementById("veh_company").value;
  var vehicle_company_regex = /^[a-z\d\-_\s]+$/i;
  if (vehicle_company_regex.test(vehicle_company)) {
    document.getElementById("veh_company").style.border = "1px solid green";
    document.getElementById("veh_company_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("veh_company").style.border = "1px solid red";
    document.getElementById("veh_company_error").innerHTML = "Invalid Vehicle Company";
    return false;
  }
}


function chaiseNumber() {
  var chaise_number = document.getElementById("chaise_number").value;
  var chaise_number_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (chaise_number_regex.test(chaise_number)) {
    document.getElementById("chaise_number").style.border = "1px solid green";
    document.getElementById("chaise_number_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("chaise_number").style.border = "1px solid red";
    document.getElementById("chaise_number_error").innerHTML =
      "Invalid Chaise Number";
    return false;
  }
}


function engineNumber() {
  var engine_number = document.getElementById("engine_number").value;
  var engine_number_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (engine_number_regex.test(engine_number)) {
    document.getElementById("engine_number").style.border = "1px solid green";
    document.getElementById("engine_number_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("engine_number").style.border = "1px solid red";
    document.getElementById("engine_number_error").innerHTML =
      "Invalid Engine Number";
    return false;
  }
}




    </script> 
    <style>
        span{
  color:red;
}
.errMsg{
  display: none;
  color: red;
  font-size: 12px;
}
    </style>
</head>
<body>



  
<?php
        include "../assets/templates/header.php";
      ?>

  
       <div class="log_con">
        <div class="img_con">
          <img src="../assets/images/undraw_maker_launch_re_rq81.svg">
      </div>
    
    
      <div id="orderrequest">
    
      <header id="header">
        <i class="" id="nav-toggler"></i>

    </header>



    
        <form action="authentication.php"class="orderform" method="POST" onsubmit="return driverValidate();">
            <h1 class="text-center">Driver Profile</h1>

            <!-- Progress bar -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active"></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
            </div>

            <!-- Pickup form -->
            <div class="form-step form-step-active">

                <div class="input-group">
                    <label for="pickupaddress"><b>Username</b></label>
                    <input type="text"
                     name="uname" 
                     id="dri_name" 
                     placeholder="username"
                       onkeyup="return dri_name();" />
                    <span id="dri_name_error"></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Email_Id</b></label>
                    <input type="email"
                     name="email" 
                     id="dri_mail" 
                     placeholder="Email ID" 
                      onkeyup="return email_id();" />
                    <span id="dri_mail_error"></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Mobile Number</b></label>
                    <input type="tel"
                     name="mobileno" 
                     id="dri_mob" 
                     placeholder="Mobile Number" 
                      onkeyup="return mobileNumber()" />
                    <span></span>
                </div>
                <span></span>
             
                <div class="">
                    <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                </div>
            </div>

            <!-- Delivery form -->
            <div class="form-step">
            <div class="input-group">
                    <label for="pickupaddress"><b>Address</b></label>
                    <input type="text" 
                    name="dri_address"
                     id="dri_address" placeholder="Enter your residence address"  onkeyup="return address();" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickuplocation"><b>Date Of Birth</b></label>
                    <input type="date"
                     name="dob"
                      id="dob" 
                      max="2005-04-06" placeholder="Enter your DOB"
                       onkeydown="return false" /><span></span>
                </div>
                <div class="input-group">


                    <fieldset>
                        <legend><label for="packagesize"><b>Gender</b></label></legend><span></span>
                        <label class="cont">Male
                            <input type="radio" 
                            name="gender" 
                            id="gender" 
                            value="Male"
                              onclick="myFunction6()">
                            <span class="check"></span>
                        </label>
                        <label class="cont">Female
                            <input type="radio"
                             name="gender"
                              id="genger" 
                              value="Female" 
                               onclick="myFunction6()">
                            <span class="check"></span>
                        </label>
                        <label class="cont">Other
                            <input type="radio" 
                            name="gender"
                             id="gender" 
                             value="Other" 
                              onclick="myFunction6()">
                            <span class="check"></span>
                        </label>
                    </fieldset>


                </div>
                <span></span>

                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>



                 <!-- Delivery form -->
                 <div class="form-step">
            <div class="input-group">
                    <label for="pickupaddress"><b>License Number</b></label>
                    <input type="text"
                     name="li_no" 
                     id="lis_no" 
                     placeholder="Enter your residence address" 
                      onkeyup="return driverLicenseNumber();" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickuplocation"><b>License validity</b></label>
                    <input type="date"
                     name="lvd" 
                     id="lvd" 
                     max="" 
                     min="2022-04-06"
                     placeholder="License Validity" 
                      onkeydown="return false" /><span></span>
                </div>
                
                <span></span>
                <div class="input-group">
                    <label for="pickuplocation"><b>Upload License Document</b></label>
                    <input type="file"
                     name="drili" 
                     id="drili" 
                     max="" 
                     placeholder="Upload License"
                     onkeydown="return false" /><span></span>
                </div>
                
                <span></span>


                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>

            <!-- Package form -->
            <div class="form-step">

            <div class="input-group">
                    <label for="pickupaddress"><b>Password</b></label>
                    <input type="password" 
                    name="password" 
                    id="dri_pwd" 
                    placeholder="password"
                      onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Confirm Password</b></label>
                    <input type="password"
                     name="con_password" 
                     id="dri_cpwd" placeholder="Confirm Password" 
                      onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <input type="submit" class="" id="pro" name="reg_driver"  value="Submit">

                </div>
            </div>

        </form>
    </div>

    <!--SCRIPT BEGINS-->
    <script>
        //navbar collapse
        const nav_links = document.querySelectorAll(".nav__item-link");
        const sub_links = document.querySelectorAll(".sub_link");

        function collapse_nav(head, toggler, sidenav) {
            const header = document.getElementById(head);
            const nav_toggler = document.getElementById(toggler);
            const nav = document.getElementById(sidenav);

            nav_toggler.addEventListener("click", function() {
                this.classList.toggle("fa-times");
                nav.classList.toggle("collapse");
                header.classList.toggle("collapse-header");
            });
        }
        collapse_nav("header", "nav-toggler", "nav");
        nav_links.forEach((link) => {
            link.addEventListener("click", function() {
                nav_links.forEach((l) => {
                    if (l.classList.contains("active")) {
                        l.classList.remove("active");
                    }
                });

                this.classList.toggle("active");
                const sub_menu = this.nextElementSibling;
                if (sub_menu) {
                    sub_menu.classList.toggle("d-none");
                }
            });
        });

        sub_links.forEach((link) => {
            link.addEventListener("click", () => {
                sub_links.forEach((l) => l.classList.remove("active-sub-link"));
                link.classList.toggle("active-sub-link");
            });
        });

        //progress bar
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");
        let formStepsNum = 0;
        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });
        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                    formStep.classList.remove("form-step-active");
            });
            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });
            const progressActive = document.querySelectorAll(".progress-step-active");
            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }
    </script>    
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  <!-- Sweet Alert -->
</body>
</html>