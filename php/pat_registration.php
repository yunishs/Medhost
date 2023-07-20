<?php

    include '..\database\connect.php';
    //initializing variables
    $fname=$mname=$lname=$age=$gender=$nationality=$bloodgroup=$address=$contact=$email=$pat_description="";
    $fnameErr=$mnameErr=$lnameErr=$ageErr=$genderErr=$nationalityErr=$bloodgroupErr=$addressErr=$contactErr=$emailErr=$pat_descriptionErr=null;
// try{
    if(isset($_POST['enter']))
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if (empty($_POST["fname"])) 
        {
            $fnameErr = "First Name is required";
        } 
        else {
            $fname=test_input($_POST['fname']);
            if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
                $fnameErr = "Only letters allowed in first name";
            }    
        }
        //preg_match finds match in a-Z
        if (empty($_POST["mname"])) 
        {
            $mnameErr = "Middle Name is required";
        } 
        else {
            $mname=test_input($_POST['mname']);
            if (!preg_match("/^[a-zA-Z]*$/",$mname)) {
                $mnameErr = "Only letters allowed in first name";
            }    
        }

        if (empty($_POST["lname"])) 
        {
            $lnameErr = "Last Name is required";
        } 
        else {
            $lname=test_input($_POST['lname']);
            if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
                $lnameErr = "Only letters allowed in first name";
            }    
        }
        
        if (empty($_POST["contact"])) 
        {
            $contactErr = "Contact is required";
        } 
        else {
            $contact=test_input($_POST['contact']);
            if (!preg_match("/^[0-9]{10,}$/",$contact)) {
                $contactErr = "Only numbers allowed in contact";
            }    
        }//for nmc_id"/^[1-9][0-9]*$/"

        
        if (empty($_POST["age"])) 
        {
            $ageErr = "age is required";
        } 
        else {
            $age=test_input($_POST['age']);
            if (!preg_match("/^[0-9]{1,2}$/",$age)) {
                $ageErr = "Only numbers and not starting with zero allowed in age";
            }    
        }
        //only 0-99 age

        if (empty($_POST["bloodgroup"])) 
        {
            $bloodgroupErr = "Bloodgroup is required";
        } 
        else
        {
            $bloodgroup=test_input($_POST['bloodgroup']);   
        }  

        {
            $nationality=test_input($_POST['nationality']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nationality)) {
                $nationalityErr = "Only letters and whitespace allowed in nationality";
            }    
        } 

        {
            $address=test_input($_POST['address']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$address)) {
                $addressErr = "Only letters and whitespace allowed in address";
            }    
        } 

        //alternate for email '/^\\S+@\\S+\\.\\S+$/'
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

        {
            $pat_description=test_input($_POST['pat_description']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$pat_description)) {
                $pat_descriptionErr = "Only letters and whitespace allowed in specialization";
            }    
        }  
        //for password
        // Has minimum 8 characters in length. {8,}
        // At least one uppercase English letter.(?=.*?[A-Z])
        // At least one lowercase English letter.(?=.*?[a-z])
        // At least one digit. (?=.*?[0-9])
        // At least one special character,(?=.*?[#?!@$%^&*-])
        //https://stackoverflow.com/questions/43919606/i-could-not-seem-to-understand-a-z-this-expression
        
        function function_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        
        
        if(empty($fnameErr) && empty($mnameErr) &&empty($lnameErr) &&empty($contactErr) &&empty($ageErr) 
            &&empty($genderErr) &&empty($nationalityErr) &&empty($bloodgroupErr) && empty($addressErr) && empty($emailErr) && empty($pat_descriptionErr))
        {
            $sql="insert into patient_reg(fname,mname,lname,contact,age,gender,nationality,bloodgroup,address,email,pat_description) values ('$fname','$mname','$lname','$contact','$age','$gender','$nationality','$bloodgroup','$address','$email','$pat_description')";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data inserted successfully");
                header('Location: pat_view.php');
            }
            else
            {
                function_alert("Data couldn't be inserted successfully");
                die(mysqli_error($con));
                
            }
        }
        else
        {
            if (!empty($fnameErr)){
                function_alert($fnameErr);
            }
            if(!empty($mnameErr)){
                function_alert($mnameErr);
            }
            if(!empty($lnameErr)){
                function_alert($lnameErr);
            }
            if(!empty($contactErr)){
                function_alert($contactErr);
            }
            if(!empty($ageErr)){
                function_alert($ageErr);
            }
            if(!empty($genderErr)){
                function_alert($genderErr);
            }
            if(!empty($nationalityErr)){
                function_alert($nationalityErr);
            }
            if(!empty($bloodgroupErr)){
                function_alert($bloodgroupErr);
            }
            if(!empty($adressErr)){
                function_alert($addressErr);
            }
            if(!empty($emailErr)){
                function_alert($emailErr);
            }     
            if(!empty($pat_descriptionErr)){
                function_alert($pat_descriptionErr);
            }         
        }
    }
    ?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_page</title>
    <link rel="stylesheet" href="..\public\pat_registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="..\images\MedHost.png">
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
    <form method="post">
        <div class="input-box">
            <h3>Personal Information:</h3>
            <!-- <form action="" method="post"></form> -->
            <div class="row">
                <div class="col-25" >
                    <label class="fname">First name:</label>
                        <input type="stext" id="fname" name="fname" size="10px">
                    <label class="mname">Middle name:</label>
                        <input type="stext" id="mname" name="mname" size="10px" >
                    <label class="lname">Last name:</label>
                        <input type="stext" id="lname" name="lname" size="10px" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="mobile">Mobile no: </label>
                        <input type="integer" id="contact" name="contact">
                    <label class="age">Age:</label>
                            <input type="sty" id="age" name="age" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="gender">Gender:</label>
                    <select class="exc" name="gender" id="gender"> <!--YO WALA--->
                        <option>---</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Other</option>
                    </select>
                    <label class="nationality">Nationality:</label>
                    <input type="stext" id="nationality" name="nationality" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="bloodgroup">Blood group:</label>
                    <select name="bloodgroup" id="bloodgroup" type="sty">
                        <option>---</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="address">Address: </label>
                    <input type="txt" id="address" name="address" >
                    
                </div>
            </div>
    
            <div class="row">
                <div class="col-25">
                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email" >  
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="pat_description">Patient's Description: </label>
                </div>
                <div class="col-35">
                    <input type="text" class="pat_description" id="pat_description" name="pat_description" placeholder="Enter the patient's initial condition">
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
