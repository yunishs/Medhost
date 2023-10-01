<?php

    include '..\database\connect.php';
    //initializing variables
    $fname=$mname=$lname=$reg_id=$gender=$age=$contact=$email=$password=$role="";
    $fnameErr=$mnameErr=$lnameErr=$reg_idErr=$genderErr=$ageErr=$contactErr=$emailErr=$passwordErr=null;
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
        {
            $mname=test_input($_POST['mname']);
            if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
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
                $lnameErr = "Only letters allowed in last name";
            }    
        }
    
        if (empty($_POST["reg_id"])) 
        {
            $reg_idErr = "reg_id is required";
        } 
        else {
            $reg_id=test_input($_POST['reg_id']);
            if (!preg_match("/([0-9]+(-[0-9]+)+)/",$reg_id)) {
                $reg_idErr = "Only numbers and '-' allowed in reg id";
            }    
        }//for reg_id"/^[1-9][0-9]*$/"
        
        if (empty($_POST['gender'])) 
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
            if (!preg_match("/^[0-9]{8,}$/",$contact)) {
                $contactErr = "Only numbers allowed in contact and the contact must be atleast 8 digits";
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
        
        
        if(empty($fnameErr) && empty($mnameErr) &&empty($lnameErr) &&empty($reg_idErr)
            &&empty($genderErr) &&empty($ageErr) &&empty($contactErr) && empty($emailErr) && empty($passwordErr) )
        {
            $sql="INSERT into medicalstaff_info(fname,mname,lname,reg_id,gender,age,contact,email,password) values ('$fname','$mname','$lname','$reg_id','$gender','$age','$contact','$email','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
                function_alert("Data inserted successfully");
                header('Location: medicalstaff_view.php');
            }
            else
            {
                function_alert("Data couldn't be inserted successfully");
                die(mysqli_error($con));
                
            }
            $sql2="SELECT MAX(mid) FROM medicalstaff_info";
            $result2=mysqli_query($con,$sql2);
            $mid_fk=mysqli_fetch_array($result2);
            
            $sql1="insert into login_information(email,password,role,mid_fk) values ('$email','$password','2','$mid_fk[0]')";
            $result1=mysqli_query($con,$sql1);
            
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
            if(!empty($reg_idErr)){
                function_alert($reg_idErr);
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
<h1>Registration Form</h1>
     <form id="multi" method="POST"></form>
      <form class="form" id="all" method="POST">  
      <div class="input-box">
      <div class="column" >
          <div class="input">
            <label>First-name</label>
            <input type="text" id="fname" name="fname" size="10px" value=<?php echo $fname; ?>>
          </div>
          <div class="input">
            <label>Middle-Name</label>
            <input type="text" id="mname" name="mname" size="10px" value=<?php echo $mname; ?>>
          </div>
          <div class="input">
            <label>Last-Name</label>
            <input type="text" id="lname" name="lname" size="10px" value=<?php echo $lname; ?>>
          </div>
        </div>
        <div class="column">
          <div class="input">
            <label>Contact</label>
            <input type="integer" id="contact" name="contact" value=<?php echo $contact; ?>>
          </div>
          <div class="input">
            <label>Age</label>
            <input type="number" id="age" name="age" value=<?php echo $age; ?>>
          </div>
        </div>
        <div class="column">
          <div class="input">
                    <label>Registration ID: </label>
                    <input type="integer" id="reg_id" name="reg_id" value=<?php echo $reg_id; ?> >
                </div>
                <div class="input"> 
                <label>Gender</label>
                <div class="input-option">
                    <select name="gender" id="gender" type="sty">
                        <option>---</option>
                        <option VALUE="Male" <?php if($gender=="Male") echo 'selected="selected"'; ?>>Male</option>
                        <option VALUE="Female" <?php if($gender=="Female") echo 'selected="selected"'; ?>>Female</option>
                        <option VALUE="Others" <?php if($gender=="Others") echo 'selected="selected"'; ?>>Others</option>
                    </select>
</div>
        </div>
</div>                  
        <div class="column">
            <div class="input">
                <label>Email Address</label>
                <input type="text" id="email" name="email" value=<?php echo $email; ?>>
</div>
                <div class="input">
                <label>Password</label>
                <input type="text" id="password" name="password" value=<?php echo $password; ?>>
            </div>
        </div>
       <div class="column">
        <button type="submit" class="enter-btn" name="enter">ENTER</button>
    </div>
    </form>
</div>
</body>
</html>


