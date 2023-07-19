<?php
    //Start the session.
    session_start();

    $error_message='';
    $emailErr=$passwordErr=null;
    $email=$password="";

    if($_POST){
        include('..\database\connection.php');

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if (empty($_POST["email"])) 
        {
            $emailErr = "Email is required";
        } 
        else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["password"])) 
        {
            $passwordErr = "Password is required";
        } 
        else {
            $password=test_input($_POST['password']);
            if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$password)) {
                $passwordErr = "Password must have 8 characters with one uppercase, one lowercase, one digit and one special character";
            }    
        }
        // $email= $_POST['email'];
        // $password= $_POST['password'];
        function function_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        
        
        if(empty($emailErr) && empty($passwordErr) )
        {
        
            $query = 'Select * From admin_login WHERE admin_login.email="'. $email .'" AND admin_login.password="'. $password .'" LIMIT 1';
            $stmt = $conn->prepare($query);
            $stmt->execute();

            if($stmt->rowCount()>0){
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $user= $stmt->fetchALL()[0];   
                if(isset($_SESSION["username"])) {

                }    
                else{// check username and pass correct
                    $_SESSION["username"]=$email;
                    $_SESSION["password"]=$password;
                }
                
                //"SELECT login_information.role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password'";

                // $query = "SELECT role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password';";
                // // $row = $query->fetch(PDO::FETCH_OBJ);
                // if($result->fetch('$role')=='0') {
                //     header('Location: admin_test.php');
                // } else {
                    header('Location: dashboard.php');
                // }
            }
            else $error_message= 'Incorrect E-mail/Password';
        }
        else
        {
            if(!empty($emailErr)){
                function_alert($emailErr);
            }
            if(!empty($passwordErr)){
                function_alert($passwordErr);
            } 
        }
    }



?>





<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Loginpage</title> 
    <link rel="stylesheet" href="..\public\adminlogin.css">
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
    
    <form action="adminlogin.php" method="POST">
    <div class="container">
        <h2>Login</h2>
        <form>
            <div class="clearfix">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="clearfix">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" value="Login">
        </form>
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