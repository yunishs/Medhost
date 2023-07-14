<?php

    include '..\database\connect.php';
    if(isset($_POST['enter']))
    {
        $fname=$_POST['fname'];
        $mname=$_POST['mname'];
        $lname=$_POST['lname'];
        $reg_id=$_POST['reg_id'];
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="insert into medicalstaff_reg(fname,mname,lname,reg_id,gender,age,contact,email,password) values ('$fname','$mname','$lname','$reg_id','$gender','$age','$contact','$email','$password')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "Data inserted successfully";
        }
        else
        {
            die(mysqli_error($con));
        }
    }

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedicalStaff_reg</title>
    <link rel="stylesheet" href="..\public\doc_registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="..\images\MedHost.png">
</head>
<body>
    <!-- <header>
        <div class="logo">MED-Host</div>
    </header> -->
    <form method="post">
        <div class="input-box">
            <h1 class="h1">Medical Staff Information</h1>
            <!-- <form action="/action_page.css"></form> -->
            <div class="row">
                <div class="col-25">
                    <label class="fname">First name:</label>
                        <input type="stext" id="fname" name="fname">
                    <label class="mname">Middle name:</label>
                        <input type="stext" id="mname" name="mname">
                    <label class="lname">Last name:</label>
                        <input type="stext" id="lname" name="lname">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="reg_id">Reg ID: </label>
                        <input type="inti" id="reg_id" name="reg_id" >
                </div>
            </div>
           
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" type="gender">
                        <option>---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select> 
                    <label class="age">Age:</label>
                                    <input type="integer" id="age" name="age" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="contact">Contact: </label>
                    <input type="ini" id="contact" name="contact">
                    <label class="email">Email: </label>
                    <input type="text" id="email" name="email" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password: </label>
                    <input type="stext" id="password" name="password" >
                </div>
            </div>
            <div class="row">
                <button type="enter" class="enter-btn" name="enter">ENTER</button>
            </div>
        </div>
    </form>
    <!-- <script>
        Window.addEventaListener("scroll",function(){
        var header= document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY>0);
        })
    </script> -->
</body>
</html>


