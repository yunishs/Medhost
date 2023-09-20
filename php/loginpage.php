<?php
    //Start the session.
    session_start();
        
    include ("..\database\connect.php");
    include("login.php");
?>


<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_page</title> 
    <link rel="stylesheet" href="..\public\loginpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="../images\MedHost.png">
    
</head>
<body>
    <header>
        
        <div class="logosec">
			<img src="..\images\MedHost.png"
				class="icn menuicn"
				id="menuicn">
                <div class="logo">MED-Host</div>
            
		</div>
    </header>
    
    <form name="form" action="login.php" method="POST" onsubmit="return isvalid()">
         <div class="form-box">
            <h2>LOGIN</h2>
            <div class="input-box">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="E-mail Id">
            </div>
            <div class="input-box">
                <i class="fa-sharp fa-solid fa-key"></i>
            <input type="password" placeholder="Password" id="password" name="password">
            <span class="eye" onclick="myFunction()">
            <i  id="hide1" class="fa fa-eye"></i>
            </span>
            </div>
            <button class="login-btn" id="login" name="login">LOGIN</button>
            <!-- <div>
                <h3 onclick="document.location='adminlogin.php'">For Admin Login</h3>
            </div> -->
            
        </div>
    </form>
    <script>
        function isvalid()
        {
            var email = document.form.email.value;
            var password = document.form.password.value;

            if(email.length=="" && password.length=="")
            {
                alert("Username and password field is empty!");
                return false
            }
            else
            {
                if(email.length=="")
                {
                    alert("Username field is empty!");
                    return false
                }
                if(password.length=="")
                {
                    alert("Password field is empty!");
                    return false
                }
            }
        }
    </script>
    
    <!-- <script>
        Window.addEventaListener("scroll",function(){
        var header= document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY>0);
        })
        function myFunction(){
            var x = document.getElementById("myInput");
            var y = document.getElementById("hide1");
            
            if(x.type === 'password'){
                x.type ="text";
                y.style.display = "block";
                
            }
            else{
                x.type ="password";
                y.style.display = "none";
            }
        }
    </script> -->
</body>
</html>