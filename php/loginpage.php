<?php
    //Start the session.
    session_start();

    require ("..\database\connect.php");
    // include("login.php");

    //test code does not work
    // function function_alert($message) {
    //     echo "<script>alert('$message');</script>";
    // }
    
    //code of login.php
    $role=$id_fk=$fname=$mname=$lname='';
    // function doc_name() {
        
                               


    // $_SESSION["username"]=$_SESSION["password"]=$_SESSION["role"]=$role;
    if(isset($_POST['login']))
    {
            $email= $_POST['email'];
            $password= $_POST['password'];

            $sql = "SELECT * From login_information WHERE email='$email' AND password='$password'";
            $result = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,  MYSQLI_ASSOC);
            $count= mysqli_num_rows($result);
        
        
            //old code
            //"SELECT login_information.role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password'";
            // $query = "SELECT role FROM `login_information` WHERE login_information.email= '$email' AND login_information.password='$password';";
            // // $row = $query->fetch(PDO::FETCH_OBJ);
            // if($result->fetch('$role')=='0') {
            //     header('Location: admin_test.php');
            // } else {
            // header("Location: searchpatient.php");
        if($count==1){
            $email=$row['email'];
            $password=$row['password'];
            $role=$row['role'];
            if($role==1)
            {
                $id_fk=$row['did_fk'];
            }
            elseif($role==2)
            {
                $id_fk=$row['mid_fk'];
            }
            if($role==3)
            {
                $id_fk=$row['fid_fk'];
            }


            if(isset($_SESSION["username"] )) { //check if there is session of the user 
                //fetch role
                //timeout after 12hrs 12*60*60
                if((time()-$_SESSION["login_timestamp"]>43200) && $_SESSION['username']==$email)
                {
                    session_regenerate_id();
                    $_SESSION["login_timestamp"]=time();

                    // $_SESSION['chk']=(time()-$_SESSION["login_timestamp"]);
                    if($_SESSION["role"]==0){
                        header('Location:dashboard_admin.php');
                    }
                    elseif($_SESSION["role"]==1){
                        // $email1=$_SESSION['id_fk'];
                        // $id1=$_SESSION['username'];
                        // $sql2 = "SELECT * From doctor_info WHERE did='$id1' AND email='$email1'";
                        // $result2 = mysqli_query($con,$sql2);
                        // $row2=mysqli_fetch_array($result2,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                        //     $fname=$row2['fname'];
                        //     $mname=$row2['mname'];
                        //     $lname=$row2['lname'];
                        //     $_SESSION["fname"]=$fname;
                        //     $_SESSION["mname"]=$mname;
                        //     $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }   

                        header("Location:dashboard_doctor.php");
                    }
                    elseif($_SESSION["role"]==2){
                        // $email1=$_SESSION['id_fk'];
                        // $id1=$_SESSION['username'];
                        // $sql2 = "SELECT * From medicalstaff_info WHERE mid='$id1' AND email='$email1'";
                        // $result2 = mysqli_query($con,$sql2);
                        // $row2=mysqli_fetch_array($result2,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                        //     $fname=$row2['fname'];
                        //     $mname=$row2['mname'];
                        //     $lname=$row2['lname'];
                        //     $_SESSION["fname"]=$fname;
                        //     $_SESSION["mname"]=$mname;
                        //     $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                        header("Location:dashboard_medical.php");
                    }
                    elseif($_SESSION["role"]==3){
                        // $email1=$_SESSION['id_fk'];
                        // $id1=$_SESSION['username'];
                        // $sql2 = "SELECT * From frontdesk_info WHERE fid='$id1' AND email='$email1'";
                        // $result2 = mysqli_query($con,$sql2);
                        // $row2=mysqli_fetch_array($result2,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                        //     $fname=$row2['fname'];
                        //     $mname=$row2['mname'];
                        //     $lname=$row2['lname'];
                        //     $_SESSION["fname"]=$fname;
                        //     $_SESSION["mname"]=$mname;
                        //     $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                        header("Location:dashboard_frontdesk.php");
                    }
                
                }
                else
                {
                    $_SESSION["username"]=$email;
                    $_SESSION["password"]=$password;
                    $_SESSION["login_timestamp"]=time();
                    $_SESSION["role"]=$role;
                    $_SESSION["id_fk"]=$id_fk;
                    if($_SESSION["role"]==0){
                        header("Location:dashboard_admin.php");
                    }
                    elseif($_SESSION["role"]==1){
                        $email1=$_SESSION['username'];
                        $id1=$_SESSION['id_fk'];
                        $sql1 = "SELECT * From doctor_info WHERE did='$id_fk' AND email='$email'";
                        $result1 = mysqli_query($con,$sql1);
                        $row1=mysqli_fetch_array($result1,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                            $fname=$row1['fname'];
                            $mname=$row1['mname'];
                            $lname=$row1['lname'];
                            $_SESSION["fname"]=$fname;
                            $_SESSION["mname"]=$mname;
                            $_SESSION["lname"]=$lname;
                            $id1=$_SESSION['id_fk'];
                            //alternative code
                                // $email1=$_SESSION['username'];
                                // $sql2 = "SELECT * From doctor_info WHERE did='$id1' AND email='$email1'";
                                // $result2 = mysqli_query($con,$sql2);
                                // if($result2)
                                // {
                                // 	while($row=mysqli_fetch_assoc($result2))
                                //     {
                                // 		$fname=$row['fname'];
                                //     }
                                // }
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }   

                        header("Location:dashboard_doctor.php");
                    }
                    elseif($_SESSION["role"]==2){
                        $email2=$_SESSION['username'];
                        $id2=$_SESSION['id_fk'];
                        $sql2 = "SELECT * From medicalstaff_info WHERE mid='$id_fk' AND email='$email'";
                        $result2 = mysqli_query($con,$sql2);
                        $row2=mysqli_fetch_array($result2,  MYSQLI_ASSOC);
                        // $count3= mysqli_num_rows($result3);
                        // if($count3==1){
                            $fname=$row2['fname'];
                            $mname=$row2['mname'];
                            $lname=$row2['lname'];
                            $_SESSION["fname"]=$fname;
                            $_SESSION["mname"]=$mname;
                            $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                        header("Location:dashboard_medical.php");
                    }
                    elseif($_SESSION["role"]==3){
                        $email3=$_SESSION['username'];
                        $id3=$_SESSION['id_fk'];
                        $sql3 = "SELECT * From frontdesk_info WHERE fid='$id_fk' AND email='$email'";
                        $result3 = mysqli_query($con,$sql3);
                        $row3=mysqli_fetch_array($result3,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                            $fname=$row3['fname'];
                            $mname=$row3['mname'];
                            $lname=$row3['lname'];
                            $_SESSION["fname"]=$fname;
                            $_SESSION["mname"]=$mname;
                            $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                        header("Location:dashboard_frontdesk.php");
                    }		
                }
            }    
            else
            {// check username and pass correct
                
                $_SESSION["username"]=$email;
                $_SESSION["password"]=$password;
                $_SESSION["login_timestamp"]=time();
                $_SESSION["role"]=$role;
                $_SESSION["id_fk"]=$id_fk;
                // $_SESSION['chk']=(time()-$_SESSION["login_timestamp"]);
                //the following code does not work
                // function_alert('Welcome ".$_SESSION["username"]."');
                //     sleep(5);
                echo "<script>alert('Welcome ".$_SESSION["username"],$_SESSION["password"],$_SESSION["login_timestamp"]
                    ,$_SESSION["role"]."')</script>";

                // echo "<script>alert('Welcome ".$_SESSION["username"]."')</script>";
                if($_SESSION["role"]==0){
                    header("Location:dashboard_admin.php");
                }
                elseif($_SESSION["role"]==1){
                    $email4=$_SESSION['username'];
                    $id4=$_SESSION['id_fk'];
                    $sql4 = "SELECT * From doctor_info WHERE did='$id4' AND email='$email4'";
                    $result4 = mysqli_query($con,$sql4);
                    $row4=mysqli_fetch_array($result4,  MYSQLI_ASSOC);
                    // $count2= mysqli_num_rows($result2);
                    // if($count2==1){
                        $fname=$row4['fname'];
                        $mname=$row4['mname'];
                        $lname=$row4['lname'];
                        $_SESSION["fname"]=$fname;
                        $_SESSION["mname"]=$mname;
                        $_SESSION["lname"]=$lname;
                    // }
                    // else
                    // {
                    //     echo '<script>
                    //     window.location.href="loginpage.php";
                    //     alert("Invalid.Multiple users with same email.")
                    //     </script>';
                    // } 

                    header("Location:dashboard_doctor.php");
                }
                elseif($_SESSION["role"]==2){
                    $email5=$_SESSION['username'];
                    $id5=$_SESSION['id_fk'];
                    $sql5 = "SELECT * From medicalstaff_info WHERE mid='$id5' AND email='$email5'";
                        $result5 = mysqli_query($con,$sql5);
                        $row5=mysqli_fetch_array($result5,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                            $fname=$row5['fname'];
                            $mname=$row5['mname'];
                            $lname=$row5['lname'];
                            $_SESSION["fname"]=$fname;
                            $_SESSION["mname"]=$mname;
                            $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                    header("Location:dashboard_medical.php");
                }
                elseif($_SESSION["role"]==3){
                    $email6=$_SESSION['username'];
                    $id6=$_SESSION['id_fk'];
                    $sql6 = "SELECT * From frontdesk_info WHERE fid='$id6' AND email='$email6'";
                        $result6 = mysqli_query($con,$sql6);
                        $row6=mysqli_fetch_array($result6,  MYSQLI_ASSOC);
                        // $count2= mysqli_num_rows($result2);
                        // if($count2==1){
                            $fname=$row6['fname'];
                            $mname=$row6['mname'];
                            $lname=$row6['lname'];
                            $_SESSION["fname"]=$fname;
                            $_SESSION["mname"]=$mname;
                            $_SESSION["lname"]=$lname;
                        // }
                        // else
                        // {
                        //     echo '<script>
                        //     window.location.href="loginpage.php";
                        //     alert("Invalid.Multiple users with same email.")
                        //     </script>';
                        // }

                    header("Location:dashboard_frontdesk.php");
                }		
                
            }
        }
        else
        {
            echo '<script>
                window.location.href="loginpage.php";
                alert("Login failed. Invalid username or password")
            </script>';
        } 
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
    <form name="form" action="loginpage.php" method="POST" onsubmit="return isvalid()">
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