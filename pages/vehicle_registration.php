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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/progress.css">
    <title>Driver Register</title>
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

    <form action="authentication.php"class="orderform" method="POST"enctype="multipart/form-data" onsubmit="required()">
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

                <div class="input-group">
                    <label for="pickupaddress"><b>Username</b></label>
                    <input type="text"
                     name="uname" 
                     id="dri_name" 
                     placeholder="username"
                      required onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Email_Id</b></label>
                    <input type="email"
                     name="email" 
                     id="dri_mail" 
                     placeholder="Email ID" 
                     required onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Mobile Number</b></label>
                    <input type="tel"
                     name="mobileno" 
                     id="dri_mob" 
                     placeholder="Mobile Number" 
                     required onkeyup="myFunction1()" />
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
            <label for="pickupaddress"><b>Registration Number</b></label>
            <input type="text"
             name="reg_no" 
             id="dri_name" 
             placeholder="username"
              required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Company-Model</b></label>
            <input type="text"
             name="company" 
             id="dri_mail" 
             placeholder="Email ID" 
             required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Engine Number</b></label>
            <input type="text"
             name="engine" 
             id="dri_mob" 
             placeholder="Mobile Number" 
             required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>

        <div class="input-group">
            <label for="pickupaddress"><b>chaise Number</b></label>
            <input type="text"
             name="chaise" 
             id="dri_mob" 
             placeholder="Mobile Number" 
             required onkeyup="myFunction1()" />
            <span></span>
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
            <select name="fuels" id="bgrp" style="width:100%;" required>
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
                <select name="seatcap" id="bgrp" style="width:100%;" required>
                    <option value=" " disabled selected>Select</option>
                    <option value="3+1">3+1</option>
                    <option value="4+1">4+1</option>
                    <option value="4+1">4+1</option>
                    <option value="6+1">6+1</option>
                    <option value="7+1">7+1</option>

                </select><span></span>
                </div>
                


                <span></span>
         <div class="input-group">
                <label for="pickupaddress"><b>Color</b></label>
                <input type="color"
                name="color" 
                class="color"
                id="dri_mail" 
                value="black" 
                required onkeyup="myFunction1()" />
                <span></span>
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
                    required onkeydown="return false" /><span></span>
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
             id="dri_name" 
             min="2022-04-06"
             placeholder="username"
              required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Tax Validity</b></label>
            <input type="date"
             name="tax_val" 
             id="dri_mail" 
             min="2022-04-06"
             placeholder="Email ID" 
             required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>Pollution Validity</b></label>
            <input type="date"
             name="po_val" 
             id="dri_mob"
             min="2022-04-06" 
             placeholder="Mobile Number" 
             required onkeyup="myFunction1()" />
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
                <select name="ins_scheme" id="bgrp" style="width:100%;" required>
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
             id="dri_mail" 
             placeholder="Email ID" 
             min="2022-04-06"
             required onkeyup="myFunction1()" />
            <span></span>
        </div>
        <span></span>
        <div class="input-group">
            <label for="pickupaddress"><b>RC Document</b></label>
            <input type="file"
             name="rc_doc"
             id="dri_mob" 
             placeholder="Mobile Number" 
             required onkeyup="myFunction1()" />
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
                    id="dri_pwd" 
                    placeholder="password"
                     required onkeyup="myFunction1()" />
                    <span></span>
                </div>
                <span></span>
                <div class="input-group">
                    <label for="pickupaddress"><b>Confirm Password</b></label>
                    <input type="password"
                     name="con_password" 
                     id="dri_cpwd" placeholder="Confirm Password" 
                     required onkeyup="myFunction1()" />
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
    
</body>
</html>