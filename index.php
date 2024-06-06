<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<style>

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
    background:linear-gradient(to right,#022739,#077f9b);
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Poppins', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
    padding-top: 80px;
    overflow: hidden;
}

h1 {
	font-weight: bold;
	margin: 0;
}
form h1{
    color: transparent;
    background:linear-gradient(to right,#022739,#077f9b) ;
    -webkit-background-clip: text;
    background-clip: text;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
    background:linear-gradient(to right,#022739,#077f9b);
    border: none;
    cursor: pointer;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: 0.15s ease-in-out
}
button:hover{
    background:#FFD111;
}


button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}



form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}
.forgot form{
	background-color: transparent;
}
input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
    background:linear-gradient(to right,#022739,#077f9b);
    background:linear-gradient(to right,#022739,#077f9b);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
.logo{
    width: 100px;
    height: 100px;
}
.logo img{
    width: 100%;
    height:100%;
}
.forgot{
	display: none;
}
#vc,#pwdch{
	display: none;
}
.codes{

width: 300px;
}
.codes input{
	width:20%;
	display: inline-block;
}
.codes input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
}

</style>
</head>
<body>
   
<div class="container" id="container">
	<div class="form-container sign-up-container">
        <form action="#" id="create" onsubmit="return validateForm()">
            <h1>Create Account</h1>
            <span id="e">or use your email for registration</span>
            <br><br>
            <input type="text" placeholder="Name" id="nom" />
            <input type="email" placeholder="Email" id="email" />
            <input type="text" placeholder="Phone Number" id="numb" />
            <input type="password" placeholder="Password" id="pwd" />
            <input type="password" placeholder="Password" id="cpwd" />
            <button type="submit">Sign Up</button>
        </form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" id="sign">
			<h1>Sign in</h1>
			<span id="ere">or use your account</span>
            <br>
<br>

			<input type="email" placeholder="Email" id="emaill" />
			<input type="password" placeholder="Password" id="pwdl" />
			<a href="#" id="verifier">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button  id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<div class="first">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
			<div class="forgot">
				<form action="" id="vr" >
					<h1 style="color: #FFFFFF;">Forgot Password!</h1>
					<p style="color: #FFFFFF;" id="erv">please write your email </p>
					<input type="email" placeholder="Email" id="emailv" required />
					<button class="ghost" id="Verify">Verify</button>
					<a href="#" id="return" style="color: #fff; text-decoration: none;">Return</a>
				</form>
				<form action="" id="vc">
					<h1 style="color: #FFFFFF;">Forgot Password!</h1>
					<p style="color: #FFFFFF;" id="ervv">please write your email </p>
					<div class="codes">
					<input type="number" class="nbr" max="9"  id="c1" required />
					<input type="number" class="nbr" max="9"  id="c2" required />
					<input type="number" class="nbr" max="9"  id="c3" required />
					<input type="number" class="nbr" max="9"  id="c4" required />
				</div>
					<button class="ghost" id="send">Verify</button>
					<a href="#" id="resend" style="color: #fff; text-decoration: none;">Resend Code</a>
					<br><br>
					<a href="index.php" id="return" style="color: #fff; text-decoration: none;">Return</a>
				</form>
				<form action="" id="pwdch">
					<h1 style="color: #FFFFFF;">Forgot Password!</h1>
					<p style="color: #FFFFFF;" id="erpwd">please change your password</p>
					<input type="password" placeholder="New password"  id="pwch" required />
					<input type="password" placeholder="Confirm new password"  id="pwchc" required />			
					<button class="ghost" id="send">Change password</button>
					<a href="index.php" id="return" style="color: #fff; text-decoration: none;">Return</a>
				</form>
			</div>
	
			</div>
		</div>
	</div>
</div>
<div class="logo"> <a href="index.php"><img src="images/logo.png" alt="#" ></a> </div>
<script>
    const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
var c = document.getElementById("create");
var vr=document.getElementById("vr");
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");   
});
function validateForm() {
        var err=document.getElementById("e");
        var name = document.getElementById("nom");
        var email = document.getElementById("email");
        var phoneNumber = document.getElementById("numb");
        var password = document.getElementById("pwd");
        var cpassword = document.getElementById("cpwd");
      name.style.border="";
      email.style.border="";
      phoneNumber.style.border="";
      password.style.border="";
      cpassword.style.border="";
        err.style.color="black";
        err.innerHTML="or use your email for registration";
        if (name.value.trim() == "") {
            err.style.color="red";
            err.innerHTML="Please enter your Name .";
            name.style.border="1px solid red";
            return false;
        }
        if (email.value.trim() == "" || email.value.indexOf("@")==-1) {
            err.style.color="red";
            err.innerHTML="Please enter your Email  correctly.";
            email.style.border="1px solid red";
            
            return false;
        }
        if(phoneNumber.value.length<8){
            err.style.color="red";
            err.innerHTML="Please enter your phone number correctly.";
            phoneNumber.style.border="1px solid red";
            
            return false; 
        }
       if(password.value.length<10 || !hasNumber(password.value)){
        err.style.color="red";
            err.innerHTML="Please enter a password. It should contain numbers and be at least 10 characters long";
            password.style.border="1px solid red";
            
            return false; 
       }
       if(password.value!=cpassword.value){
        err.style.color="red";
            err.innerHTML="Please confirm your password correctly . ";
            cpassword.style.border="1px solid red";
            
            return false; 
       }
        return true;
    }
    function hasNumber(str) {
  return /\d/.test(str);
}

var login=document.getElementById("sign");
c.addEventListener("submit", function(event) {
    event.preventDefault();

    if (validateForm()) {
        var nom = document.getElementById("nom").value;
        var email = document.getElementById("email").value;
        var numb = document.getElementById("numb").value;
        var pwd = document.getElementById("pwd").value;
        var cpwd = document.getElementById("cpwd").value;
        var formData = new FormData();
        formData.append("nom", nom);
        formData.append("email", email);
        formData.append("numb", numb);
        formData.append("pwd", pwd);
        formData.append("cpwd", cpwd);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "signup.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var err = document.getElementById("e");
                err.innerHTML = xhr.responseText;
                err.style.color = "red";
                if (xhr.responseText.trim() !== "Cet email est déjà utilisé.") {
					err.style.color = "green";
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                }
            }
        };
        xhr.send(formData);
    }
});
login.addEventListener("submit",function(event){

        var email = document.getElementById("emaill").value;
        var pwd = document.getElementById("pwdl").value;
        var formData = new FormData();
        formData.append("email", email);
        formData.append("pwd", pwd);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "login.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var err = document.getElementById("ere");
                err.innerHTML = xhr.responseText;
                err.style.color = "red";
                if (xhr.responseText.trim() !== "Incorrect identifiers") {
					err.style.color = "green";
					if(xhr.responseText.trim()==="Hello Adminstrator")
					setTimeout(function() {
                        window.location.href="dashboard.php";
                    }, 2000);
					else{
                    setTimeout(function() {
                        window.location.href="homepage.php";
                    }, 2000);}
                }
            }
        };
        xhr.send(formData);
});
var ver=document.getElementById("verifier");
var first=document.querySelector(".first");
var forg=document.querySelector(".forgot");
var rt=document.getElementById("return");
var vr=document.getElementById("vr");
var vc=document.getElementById("vc");
var pwdch=document.getElementById("pwdch");
var rd=document.getElementById("resend");
ver.addEventListener("click",function () {
first.style.display="none";
forg.style.display="inline-block";
});
rt.addEventListener("click",()=>{
	window.location.reload();
});
ch="";
vr.addEventListener("submit",(event)=>{
	var email = document.getElementById("emailv").value;
	ch+=email;
	var formData = new FormData();
        formData.append("email", email);
		var xhr = new XMLHttpRequest();
        xhr.open("POST", "verifier.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var err = document.getElementById("erv");

                if (xhr.responseText.trim() !== "User not found") {
				nbtel=xhr.responseText;
					x=Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
const myHeaders = new Headers();
myHeaders.append("Authorization", "App 2754a57ec3e4a4f025241a59ce3d0391-6b1e445a-0600-442a-8d1a-a4e987407db6");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

const raw = JSON.stringify({
    "messages": [
        {
            "destinations": [{"to":"216"+nbtel}],
            "from": "ServiceSMS",
            "text": "Votre code de verification est : "+x
        }
    ]
});

const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
};

fetch("https://8g31rr.api.infobip.com/sms/2/text/advanced", requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));
		vr.style.display="none";
		vc.style.display="block";
                }
				else{
					err.innerHTML = xhr.responseText;
                err.style.color = "red";

				}
            }
        };
        xhr.send(formData);

});
document.querySelectorAll('.nbr').forEach(function(input) {
    input.addEventListener('input', function(event) {
            var nextInput = input.nextElementSibling;
        input.disabled=true;    
            if (nextInput && nextInput.tagName.toLowerCase() === 'input') {
                nextInput.focus(); 
            }
       
    });

	
});
// code :MPSUBC9NW5Q3DP3C2K7PPJ6R
rd.addEventListener("click",()=>{
	x=Math.floor(Math.random() * (9999 - 1000 + 1)) + 1000;
const myHeaders = new Headers();
myHeaders.append("Authorization", "App 2754a57ec3e4a4f025241a59ce3d0391-6b1e445a-0600-442a-8d1a-a4e987407db6");
myHeaders.append("Content-Type", "application/json");
myHeaders.append("Accept", "application/json");

const raw = JSON.stringify({
    "messages": [
        {
            "destinations": [{"to":"216"+nbtel}],
            "from": "ServiceSMS",
            "text": "Votre code de verification est : "+x
        }
    ]
});

const requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: raw,
    redirect: "follow"
};

fetch("https://8g31rr.api.infobip.com/sms/2/text/advanced", requestOptions)
    .then((response) => response.text())
    .then((result) => console.log(result))
    .catch((error) => console.error(error));

});

vc.addEventListener("submit",()=>{
			var c1=document.getElementById("c1").value;
	var c2=document.getElementById("c2").value;
	var c3=document.getElementById("c3").value;
	var c4=document.getElementById("c4").value;
	var erv=document.getElementById("ervv");

var y=c1*1000+c2*100+c3*10+c4*1;

	if(x==y){
	vc.style.display="none";
	pwdch.style.display="block";
	
}
else
erv.innerHTML="code est incorrecte";

		});
pwdch.addEventListener("submit",(event)=>{
	var pass = document.getElementById("pwch");
	var cpassword = document.getElementById("pwchc");
	var err=document.getElementById("erpwd");
	if(pass.value.length<10 || !hasNumber(pass.value)){
        err.style.color="red";
            err.innerHTML="Please enter a password. It should contain numbers and be at least 10 characters long";
            pass.style.border="1px solid red";
 
       }
      else if(pass.value!=cpassword.value){
        err.style.color="red";
            err.innerHTML="Please confirm your password correctly . ";
            cpassword.style.border="1px solid red";
       }
 else{
	var formData = new FormData();
        formData.append("pwd", pass.value);
		formData.append("email", ch);
		var xhr = new XMLHttpRequest();
        xhr.open("POST", "changepwd.php", true);
		xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			
                err.innerHTML = xhr.responseText;
				err.style.color = "green";
				setTimeout(function() {
                        window.location.reload();
                    }, 2000);}

 }
xhr.send(formData);
}});

</script>
</body>
</html>