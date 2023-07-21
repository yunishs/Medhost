<?php

    include '..\database\connect.php';
    
    $id=$_GET['updateid'];
    $sql="SELECT * from doctor_reg WHERE did=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $fname=$row['fname'];
    $mname=$row['mname'];
    $lname=$row['lname'];
    $nmc_id=$row['nmc_id'];
    $specialization=$row['specialization'];
    $gender=$row['gender'];
    $age=$row['age'];
    $contact=$row['contact'];
    $email=$row['email'];
    $password=$row['password'];

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
        {
            $mname=test_input($_POST['mname']);
            if (!preg_match("/^[a-zA-Z]*$/",$mname)) {
                $mnameErr = "Only letters allowed in middle name";
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
    
        if (empty($_POST["nmc_id"])) 
        {
            $nmc_idErr = "nmc id is required";
        } 
        else {
            $nmc_id=test_input($_POST['nmc_id']);
            if (!preg_match("/([0-9]+(-[0-9]+)+)/",$nmc_id)) {
                $nmc_idErr = "Only numbers and '-' allowed in nmc id";
            }    
        }//for nmc_id"/^[1-9][0-9]*$/"
        
        {
            $specialization=test_input($_POST['specialization']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$specialization)) {
                $specializationErr = "Only letters and whitespace allowed in specialization";
            }    
        }  

        if (empty($_POST["gender"])) 
        {
            $genderErr = "Gender is required";
        } 
        else
        {
            $gender=test_input($_POST['gender']);   
        }  

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
        if (empty($_POST["contact"])) 
        {
            $contactErr = "Contact is required";
        } 
        else {
            $contact=test_input($_POST['contact']);
            if (!preg_match("/^[0-9]{10,}$/",$contact)) {
                $contactErr = "Only numbers allowed in contact";
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
        
        
        if(empty($fnameErr) && empty($mnameErr) &&empty($lnameErr) &&empty($nmc_idErr) &&empty($specializationErr) 
            &&empty($genderErr) &&empty($ageErr) &&empty($contactErr) && empty($emailErr) && empty($passwordErr) )
        {
            $sql="UPDATE doctor_reg SET did=$id,fname='$fname',mname='$mname',lname='$lname',nmc_id='$nmc_id',specialization='$specialization',gender='$gender',age='$age',contact='$contact',email='$email',password='$password' WHERE did=$id";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data updated successfully");
                header('Location: doctorview_admin.php');
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
            if(!empty($nmc_idErr)){
                function_alert($nmc_idErr);
            }
            if(!empty($specializationErr)){
                function_alert($specializationErr);
            }
            if(!empty($genderErr)){
                function_alert($genderErr);
            }
            if(!empty($ageErr)){
                function_alert($ageErr);
            }
            if(!empty($contactErr)){
                function_alert($contactErr);
            }
            if(!empty($emailErr)){
                function_alert($emailErr);
            }
            if(!empty($passwordErr)){
                function_alert($passwordErr);
            }            
        }
    }
    ?>
    
<!-- data push hudaina condn na milesamma tara error dekauna milena -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor_reg</title>
    <link rel="stylesheet" href="..\public\doc_registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="..\images\MedHost.png">
</head>
<body>
    <form method="post">
        <div class="input-box">
            <h1 class="h1">Doctors Information</h1>
            <!-- <form action="/action_page.css"></form> -->
            <div class="row">
                <div class="col-25">
                    <label class="fname">First name:</label>
                        <input type="stext" id="fname" name="fname" value=<?php echo $fname; ?>>
                    <label class="mname">Middle name:</label>
                        <input type="stext" id="mname" name="mname" value=<?php echo $mname; ?>>
                    <label class="lname">Last name:</label>
                        <input type="stext" id="lname" name="lname" value=<?php echo $lname; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="nmc_id">NMC ID: </label>
                        <input type="inti" id="nmc_id" name="nmc_id" value=<?php echo $nmc_id; ?>>
                    <label class="specialization">Specialization: </label>
                        <input type="stext" id="specialization" name="specialization" value=<?php echo $specialization; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="gender">Gender:</label>
                    <select name="gender" id="gender" type="sty">
                        <option>---</option>
                        <option VALUE="Male" <?php if($gender=="Male") echo 'selected="selected"'; ?>>Male</option>
                        <option VALUE="Female" <?php if($gender=="Female") echo 'selected="selected"'; ?>>Female</option>
                        <option VALUE="Others" <?php if($gender=="Others") echo 'selected="selected"'; ?>>Others</option>
                    </select> 
                    <label class="age">Age:</label>
                        <input type="integer" id="age" name="age" value=<?php echo $age; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="contact">Contact: </label>
                    <input type="ini" id="contact" name="contact" value=<?php echo $contact; ?>>
                    <label class="email">Email: </label>
                    <input type="text" id="email" name="email" value=<?php echo $email; ?>>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Password: </label>
                    <input type="stext" id="password" name="password" value=<?php echo $password; ?>>
                </div>
            </div>
            <div class="row">
                <button type="enter" class="enter-btn" name="enter">ENTER</button>
            </div>
        </div>
    </form>
    
    <!-- <script>
     //     Window.addEventaListener("scroll",function(){
    // //     var header= document.querySelector("header");
    // //     header.classList.toggle("sticky",window.scrollY>0);
    // //     })
    // // </script> 
            -->
            </script>
    
</body>
</html>


