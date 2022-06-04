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
    <script>
       function vehicleValidate() {
  if (
    document.getElementById("owner_name").value.length == 0 ||
    document.getElementById("own_mail").value.length == 0 ||
    document.getElementById("own_mob").value.length == 0 ||
    document.getElementById("password").value.length == 0 ||
    document.getElementById("cpassword").value.length == 0 ||
    document.getElementById("veh_company").value.length == 0 ||
    document.getElementById("reg_no").value.length == 0 ||
    document.getElementById("chaise_no").value.length == 0 ||
    document.getElementById("fuel").value.length == 0 ||
    document.getElementById("seat").value.length == 0 ||
    document.getElementById("regVal").value.length == 0 ||
    document.getElementById("taxVal").value.length == 0||
    document.getElementById("polVal").value.length == 0||
    document.getElementById("insVal").value.length == 0||
    document.getElementById("insScheme").value.length == 0

  ) {
    swal("Oops!", "Complete Registration", "error");
    return false;
  }
} 

let span = document.getElementsByTagName("span");

function userName() {
  var userName = document.getElementById("owner_name").value;
  var userName_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (userName_regex.test(userName)) {
    document.getElementById("owner_name").style.border = "1px solid green";
    document.getElementById("owner_name_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("owner_name").style.border = "1px solid red";
    document.getElementById("owner_name_error").innerHTML = "Invalid user name";
    return false;
  }
}

function email_id() {
  var email = document.getElementById("own_mail").value;
  var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (email_regex.test(email)) {
    document.getElementById("own_mail").style.border = "1px solid green";
    document.getElementById("own_mail_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("own_mail").style.border = "1px solid red";
    document.getElementById("own_mail_error").innerHTML = "Invalid Email_id";
    return false;
  }
}

function mobileNumber() {
  var mobile = document.getElementById("own_mob").value;
  var mobile_regex = /^[0-9]{10}$/;
  if (mobile_regex.test(mobile)) {
    document.getElementById("own_mob").style.border = "1px solid green";
    document.getElementById("").innerHTML = "";
    return true;
  } else {
    document.getElementById("own_mob").style.border = "1px solid red";
    document.getElementById("own_mob_error").innerHTML = "Invalid Mobile Number";
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

function VehicleRegisterationNumber() {
  var vehicle_registration_number = document.getElementById(
    "vehicle_registration_number"
  ).value;
  var vehicle_registration_number_regex = /^[a-zA-Z0-9]{6,16}$/;
  if (vehicle_registration_number_regex.test(vehicle_registration_number)) {
    document.getElementById("vehicle_registration_number").style.border =
      "1px solid green";
    document.getElementById("vehicle_registration_number_error").innerHTML = "";
    return true;
  } else {
    document.getElementById("vehicle_registration_number").style.border =
      "1px solid red";
    document.getElementById("vehicle_registration_number_error").innerHTML =
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
    <title>Vehicle Register</title>
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

    <form action="authentication.php"class="orderform" method="POST"enctype="multipart/form-data" onsubmit="return vehicleValidate()">
            <h1 class="text-center">Vehicle Profile</h1>

            <!-- Progress bar -->
            <div class="progressbar">
                <div class="progress" id="progress"></div>
                <div class="progress-step progress-step-active"></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
                <div class="progress-step" ></div>
            </div>

            <!-- Pickup form -->
            <div class="form-step form-step-active">

                <div class="input-field">
                    <label for="pickupaddress"><b>Username</b></label>
                    <input type="text"
                     name="uname" 
                     id="owner_name" 
                     placeholder="username"
                       onkeyup="return userName();" />
                       <span id="owner_name_error"> </span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Email_Id</b></label>
                    <input type="email"
                     name="email" 
                     id="own_mail" 
                     placeholder="Email ID" 
                      onkeyup="return email_id();" />
                    <span id="own_mail_error"></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Mobile Number</b></label>
                    <input type="tel"
                     name="mobileno" 
                     id="own_mob" 
                     placeholder="Mobile Number" 
                      onkeyup="return mobileNumber();" />
                      <span id="own_mob_error"></span>
                </div>
                
             
                <div class="">
                    <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
                </div>
            </div>

            <!-- Delivery form -->
            <div class="form-step">
            <div class="input-group">
            <label for="pickupaddress"><b>Registration Number</b></label>
            <input type="text"
             name="reg_no" 
             id="vehicle_registration_number" 
             placeholder="KL37E1310"
               onkeyup="return VehicleRegisterationNumber();" />
            <span id="vehicle_registration_number_error"></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Company-Model</b></label>
            <input type="text"
             name="company" 
             id="veh_company" 
             placeholder="ABC Model" 
              onkeyup="return VehicleCompany();" />
            <span id="veh_company_error"></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Engine Number</b></label>
            <input type="text"
             name="engine" 
             id="engine_number" 
             placeholder="45LOJ265K236" 
              onkeyup="return engineNumber();" />
            <span id="engine_number_error"></span>
        </div>
        <span></span>

        <div class="input-group">
            <label for="pickupaddress"><b>chaise Number</b></label>
            <input type="text"
             name="chaise" 
             id="chaise_number" 
             placeholder="J45L365H78" 
              onkeyup="return chaiseNumber();" />
              <span id="chaise_number_error"></span>
        </div>
       
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>



                 <!-- Delivery form -->
                 <div class="form-step">
                 <div class="input-group">
            <label for="packagesize"><b>Fuel</b></label>
            <select name="fuels" id="fuel" style="width:100%;" >
                <option value=" " disabled selected>Select Fuel</option>
                <option value="petrol">petrol</option>
                <option value="disel">disel</option>
                <option value="electric">electric</option>
                <option value="Lpg">Lpg</option>

            </select><span></span>
</div>
        <span></span>

                        <div class="input-group">
                <label for="packagesize"><b>Seating Capacity</b></label>
                <select name="seatcap" id="seat" style="width:100%;" >
                    <option value=" " disabled selected>Select</option>
                    <option value="3+1">3+1</option>
                    <option value="4+1">4+1</option>
                    <option value="5+1">5+1</option>
                    <option value="6+1">6+1</option>
                    <option value="7+1">7+1</option>

                </select><span></span>
                </div>
                


                <span></span>
      

                <div class="input-group">
                    <label for="pickuplocation"><b>Upload Vehicle Image</b></label>
                    <input type="file"
                     name="vehi_img" 
                     id="drili" 
                     max="" 
                     accept="image/*"
                     placeholder="Upload img"
                     onkeydown="return false" /><span></span>
                </div>
                
                <span></span>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>



            <div class="form-step">
            <div class="input-group">
            <label for="pickupaddress"><b>Registration Validity</b></label>
            <input type="date"
             name="reg_val" 
             id="regVal" 
             min="2024-04-12"
             placeholder="2024-04-12"
               onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Tax Validity</b></label>
            <input type="date"
             name="tax_val" 
             id="taxVal" 
             min="2023-04-06"
             placeholder="Email ID" 
              onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Pollution Validity</b></label>
            <input type="date"
             name="po_val" 
             id="polVal"
             min="2022-12-06" 
             placeholder="Mobile Number" 
              onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
       
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <a href="#" class="btn btn-next">Next</a>
                </div>
            </div>


            <div class="form-step">
            <div class="input-group">
                <label for="packagesize"><b>Insurence Scheme</b></label>
                <select name="ins_scheme" id="insScheme" style="width:100%;" >
                    <option value=" " disabled selected>Select</option>
                    <option value="Bumber to Bumber">Bumber to Bumber</option>
                    <option value="Full Cover">Full Cover</option>
                    <option value="Third Party">Third Party</option>

                </select><span></span>
                </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Insurence Validity</b></label>
            <input type="date"
             name="ins_val" 
             id="insVal" 
             placeholder="Email ID" 
             min="2022-04-06"
              onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>RC Document</b></label>
            <input type="file"
             name="rc_doc"
             id="dri_mob" 
             placeholder="Mobile Number" 
              onkeyup="myFunction1()" />
            <span></span>
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
                    id="password" 
                    placeholder="password"
                      onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Confirm Password</b></label>
                    <input type="password"
                     name="con_password" 
                     id="cpassword" placeholder="Confirm Password" 
                     onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="btns-group">
                    <a href="#" class="btn btn-prev">Previous</a>
                    <input type="submit" class="" id="pro" name="reg_vehicle"  value="Submit">

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