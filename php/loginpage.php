<?php
    //Start the session.
    session_start();

    $error_message='';

    if($_POST){
        include('..\database\connection.php');

        $email= $_POST['email'];
        $password= $_POST['password'];
        
        $query = 'Select * From login_information WHERE login_information.email="'. $email .'" AND login_information.password="'. $password .'" LIMIT 1';
        $stmt = $conn->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $user= $stmt->fetchALL()[0];        
            $_SESSION['user']=$user;
            //"SELECT login_information.role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password'";

            // $query = "SELECT role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password';";
            // // $row = $query->fetch(PDO::FETCH_OBJ);
            // if($result->fetch('$role')=='0') {
            //     header('Location: admin_test.php');
            // } else {
                header('Location: homepage.php');
            // }
        }
        else $error_message= 'Incorrect E-mail/Password';
    }
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
    
    <form action="loginpage.php" method="POST">
         <div class="form-box">
            <h2>LOGIN</h2>
            <div class="input-box">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="E-mail Id" />
            </div>
            <div class="input-box">
                <i class="fa-sharp fa-solid fa-key"></i>
            <input type="password" placeholder="Password" id="password" name="password" />
            <span class="eye" onclick="myFunction()">
            <i  id="hide1" class="fa fa-eye"></i>
            </span>
            </div>
            <button class="login-btn">LOGIN</button>
            <div>
                <h5><?= $error_message ?></h5>
            </div>  
            <div>
                <h3 onclick="document.location='adminlogin.php'">For Admin Login</h3>
            </div>
        </div>
    </form>
    
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