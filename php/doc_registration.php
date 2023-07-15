<?php

    include '..\database\connect.php';
    //initializing variables
    $fname=$mname=$lname=$nmc_id=$specialization=$gender=$age=$contact=$email=$password="";
    $fnameErr=$mnameErr=$lnameErr=$nmc_idErr=$specializationErr=$genderErr=$ageErr=$contactErr=$emailErr=$passwordErr=null;
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
            if (!preg_match("/^[a-zA-Z]$/",$fname)) {
                $fnameErr = "Only letters allowed";
            }    
        }
        //preg_match finds match in a-Z
        if (empty($_POST["mname"])) 
        {
            $mnameErr = "Middle Name is required";
        } 
        else {
            $mname=test_input($_POST['mname']);
            if (!preg_match("/^[a-zA-Z]$/",$fname)) {
                $mnameErr = "Only letters allowed";
            }    
        }

        if (empty($_POST["lname"])) 
        {
            $lnameErr = "Last Name is required";
        } 
        else {
            $lname=test_input($_POST['lname']);
            if (!preg_match("/^[a-zA-Z]$/",$lname)) {
                $lnameErr = "Only letters allowed";
            }    
        }
    
        if (empty($_POST["nmc_id"])) 
        {
            $nmc_idErr = "nmc id is required";
        } 
        else {
            $nmc_id=test_input($_POST['nmc_id']);
            if (!preg_match("/([0-9]+(-[0-9]+)+)/",$nmc_id)) {
                $nmc_idErr = "Only numbers and '-' allowed";
            }    
        }//for nmc_id"/^[1-9][0-9]*$/"
        
        {
            $specialization=test_input($_POST['specialization']);
            if (!preg_match("/^[a-zA-Z-' ]$/",$specialization)) {
                $specializationErr = "Only letters and whitespace allowed";
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
                $ageErr = "Only numbers and not starting with zero allowed";
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
                $contactErr = "Only numbers allowed";
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
        
        // $fname=$_POST['fname'];
        // $mname=$_POST['mname'];
        // $lname=$_POST['lname'];
        // $nmc_id=$_POST['nmc_id'];
        // $specialization=$_POST['specialization'];
        // $gender=$_POST['gender'];
        // $age=$_POST['age'];
        // $contact=$_POST['contact'];
        // $email=$_POST['email'];
        // $password=$_POST['password'];

        
        
        if(empty($fnameErr) && empty($mnameErr) &&empty($lnameErr) &&empty($nmc_idErr) &&empty($specializationErr) 
            &&empty($genderErr) &&empty($ageErr) &&empty($contactErr) && empty($emailErr) && empty($passwordErr) )
        {

            
            $sql="insert into doctor_reg(fname,mname,lname,nmc_id,specialization,gender,age,contact,email,password) values ('$fname','$mname','$lname','$nmc_id','$specialization','$gender','$age','$contact','$email','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
                echo "Data inserted successfully";
            }
            else
            {
                die(mysqli_error($con));
            }
        }
        else
        {
            // $script = <<< JS
            // $(function() {
                //var data = <?php echo json_encode("42", JSON_HEX_TAG);
                echo"<script>  const fnameErr = <?php echo json_encode($fnameErr); ?>;
                    const mnameErr = <?php echo json_encode($mnameErr); ?>;
                    const lnameErr = <?php echo json_encode($lnameErr); ?>;
                    const nmc_idErr = <?php echo json_encode($nmc_idErr); ?>;
                    const specializationErr = <?php echo json_encode($specializationErr); ?>;
                    const genderErr = <?php echo json_encode($genderErr); ?>;
                    const ageErr = <?php echo json_encode($ageErr); ?>;
                    const contactErr = <?php echo json_encode($contactErr); ?>;
                    const emailErr = <?php echo json_encode($emailErr); ?>;
                    const passwordErr = <?php echo json_encode($passwordErr); ?>;
                    alert(fnameErr + mnameErr +lnameErr + nmc_idErr + specializationErr + genderErr + ageErr + contactErr + emailErr + passwordErr);
                    alert(hi); </script>";
            // });

            // JS;
        }
    }
// data push hudaina condn na milesamma tara error dekauna milena
?>

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
    <!-- <header>
        <div class="logo">MED-Host</div>
    </header> -->
    <form method="post">
        <div class="input-box">
            <h1 class="h1">Doctors Information</h1>
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
                    <label class="nmc_id">NMC ID: </label>
                        <input type="inti" id="nmc_id" name="nmc_id" >
                    <label class="specialization">Specialization: </label>
                        <input type="stext" id="specialization" name="specialization">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" type="sty">
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
                    <label for="contact">Contact: </label>
                    <input type="ini" id="contact" name="contact">
                    <label class="email">Email: </label>
                    <input type="text" id="email" name="email" >
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-25">
                    <label for="specialization">Specialization: </label>
                    <input type="text" id="specialization" name="specialization" >
                </div>
            </div> -->
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
    
    //  <!-- <script>
    // //     Window.addEventaListener("scroll",function(){
    // //     var header= document.querySelector("header");
    // //     header.classList.toggle("sticky",window.scrollY>0);
    // //     })
    // // </script> -->
    // <script><?= $script ?></script>
</body>
</html>


