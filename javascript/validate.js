function validate()
{
    if(document.getElementById('username').value.length==0 ||
    document.getElementById('email').value.length==0 ||
    document.getElementById('number').value.length==0||
    document.getElementById('password').value.length==0 ||
     document.getElementById('cpassword').value.length==0)
    {
        swal("Oops!", "Complete Registration", "error");  
        return false;
    }
}

let span=document.getElementsByTagName('span'); 


function userName(){
    var userName = document.getElementById("username").value;
    var userName_regex = /^[a-zA-Z0-9]{6,16}$/;
    if(userName_regex.test(userName)){

        document.getElementById("username").style.border = "1px solid green";
        document.getElementById("username_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("username").style.border = "1px solid red";
        document.getElementById("username_error").innerHTML = "Invalid user name";
        return false;
    }
}


function email_id(){
    var email = document.getElementById("user_email").value;
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(email_regex.test(email)){
        document.getElementById("user_email").style.border = "1px solid green";
        document.getElementById("user_email_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("user_email").style.border = "1px solid red";
        document.getElementById("user_email_error").innerHTML = "Invalid Email_id";
        return false;
    }
}


function mobileNumber(){
    var mobile = document.getElementById("mobile").value;
    var mobile_regex = /^[0-9]{10}$/;
    if(mobile_regex.test(mobile)){
        document.getElementById("mobile").style.border = "1px solid green";
        document.getElementById("mobile_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("mobile").style.border = "1px solid red";
        document.getElementById("mobile_error").innerHTML = "Invalid Mobile Number";
        return false;
    }
}

function passWord(){
    var password = document.getElementById("pwd").value;
    var password_regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    if(password_regex.test(password)){
        document.getElementById("pwd").style.border = "1px solid green";
        document.getElementById("pwd_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("pwd").style.border = "1px solid red";
        document.getElementById("pwd_error").innerHTML = "Invalid Password";
        return false;
    }
}

function confirmPWD(){
    var password = document.getElementById("pwd").value;
    var confirmPassword = document.getElementById("cpwd").value;
    if(password == confirmPassword){
        document.getElementById("cpwd").style.border = "1px solid green";
        document.getElementById("cpwd").innerHTML = "";
        return true;
    }else{
        document.getElementById("cpwd").style.border = "1px solid red";
        document.getElementById("cpwd_error").innerHTML = "Password not matched";
        return false;
    }
}
function logMail(){

    var email = document.getElementById("logmail").value;
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(email_regex.test(email)){
        document.getElementById("logmail").style.border = "1px solid green";
        document.getElementById("logmail_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("logmail").style.border = "1px solid red";
        document.getElementById("logmail_error").innerHTML = "Invalid";
        return false;
    }
}


function logPwd(){
    var email = document.getElementById("logpwd").value;
    var email_regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if(email_regex.test(email)){
        document.getElementById("logpwd").style.border = "1px solid green";
        document.getElementById("logpwd_error").innerHTML = "";
        return true;
    }else{
        document.getElementById("logpwd").style.border = "1px solid red";
        document.getElementById("logpwd_error").innerHTML = "Invalid";
        return false;
    }
}
function validateBooking(){
    if(document.getElementById('picup').value.length==0 ||
    document.getElementById('dest').value.length==0 ||
    document.getElementById('time').value.length==0||
    document.getElementById('date').value.length==0)
    {
        swal("Oops!", "Complete Registration", "error");  
        return false;
    }
}
function bookedSuccessfully(){
    swal("Success!", "Booked Successfully", "success");
}

