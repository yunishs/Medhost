<?php

    include '..\database\connect.php';
    //initializing variables
    $fname=$mname=$lname=$age=$gender=$nationality=$bloodgroup=$address=$contact=$email=$pat_description=$date_of_admission=$discharge_date=$doctor_assigned="";
    $fnameErr=$mnameErr=$lnameErr=$ageErr=$genderErr=$nationalityErr=$bloodgroupErr=$addressErr=$contactErr=$emailErr=$pat_descriptionErr=$date_of_admissionErr=$discharge_dateErr=$doctor_assignedErr=null;
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
                $lnameErr = "Only letters are allowed in last name";
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

        if (empty($_POST["gender"])) 
        {
            $genderErr = "Gender is required";
        } 
        else
        {
            $gender=test_input($_POST['gender']);   
        } 

        {
            $nationality=test_input($_POST['nationality']);
            if (!preg_match("/^[a-zA-Z]*$/",$nationality)) {
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
            $email = test_input($_POST['email']);
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

        if (empty($_POST['date_of_admission'])) 
        {
            $date_of_admissionErr = "Date of admission is required";
        } 
        else
        {
            $date_of_admission=test_input($_POST['date_of_admission']);   
        } 

        if (empty($_POST["doctor_assigned"])) 
        {
            $doctor_assigned = "Doctor assigned is required";
        } 
        else
        {
            $doctor_assigned=test_input($_POST['doctor_assigned']);
            if (!preg_match("/^[a-zA-Z]*$/",$doctor_assigned)) {
                $doctor_assignedErr = "Only letters allowed in Doctor assigned name";
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
            &&empty($genderErr) &&empty($nationalityErr) &&empty($bloodgroupErr) && empty($addressErr) && empty($emailErr) && empty($pat_descriptionErr) && empty($date_of_admissionErr) && empty($discharge_dateErr) && empty($doctor_assignedErr))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");


            $sql="INSERT into patient_info(fname,mname,lname,contact,age,gender,nationality,bloodgroup,address,email,pat_description,date_of_admission,discharge_date,doctor_assigned) values ('$fname','$mname','$lname',$contact,$age,'$gender','$nationality','$bloodgroup','$address','$email','$pat_description','$date_of_admission','$discharge_date','$doctor_assigned')";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data inserted successfully");
                header('Location: pat_view_frontdesk.php');
            }
            else
            {
                // function_alert("Data couldn't be inserted successfully");
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
            if(!empty($date_of_admissionErr)){
                function_alert($date_of_admissionErr);
            }  
            if(!empty($discharge_dateErr)){
                function_alert($discharge_dateErr);
            }  
            if(!empty($doctor_assignedErr)){
                function_alert($doctor_assignedErr);
            }  
        }
    }
    ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="..\public\pat_registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
    <title>Patient Registration</title>
  </head>
  <body>
  <header>
        <div class="logosec">
                <a href="dashboard_frontdesk.php">
                    <img src="..\images\MedHost.png"
                    class="icn menuicn"
                    id="menuicn">
                </a>
                <a href="dashboard_frontdesk.php" style="text-decoration:none;">
                    <div class="logo">MedHost</div>
                </a>
                <div class="logout">
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span></a>
                </div>
        </div>
    </header>
    <br>
    <section class="container">
      <h1>Registration Form</h1>
      <form class="form" method="POST">
      <div class="column">
          <div class="input-box">
            <label>First-name</label>
            <input type="text" id="fname" name="fname" size="10px" value=<?php echo $fname; ?>>
          </div>
          <div class="input-box">
            <label>Middle-Name</label>
            <input type="text" id="mname" name="mname" size="10px" value=<?php echo $mname; ?>>
          </div>
          <div class="input-box">
            <label>Last-Name</label>
            <input type="text" id="lname" name="lname" size="10px" value=<?php echo $lname; ?>>
          </div>
        </div>
        <div class="column">
          <div class="input-box">
            <label>Contact</label>
            <input type="integer" id="contact" name="contact" value=<?php echo $contact; ?>>
          </div>
          <div class="input-box">
            <label>Age</label>
            <input type="number" id="age" name="age" value=<?php echo $age; ?>>
          </div>
        </div>
        <div class="column">
            <div class="input-box">
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
            <div class="input-box">
                <label>Nationality</label>
                <!-- <input type="text" placeholder="Enter birth date" required /> -->
                <input type="stext" id="nationality" name="nationality" value=<?php echo $nationality; ?>>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Blood Group</label>
                <div class="input-option">
                    <select name="bloodgroup" id="bloodgroup" type="sty">
                        <option>---</option>
                        <option value="A+" <?php if($bloodgroup=="A+") echo 'selected="selected"'; ?>>A+</option>
                        <option value="A-" <?php if($bloodgroup=="A-") echo 'selected="selected"'; ?>>A-</option>
                        <option value="O+" <?php if($bloodgroup=="O+") echo 'selected="selected"'; ?>>O+</option>
                        <option value="O-" <?php if($bloodgroup=="O-") echo 'selected="selected"'; ?>>O-</option>
                        <option value="B+" <?php if($bloodgroup=="B+") echo 'selected="selected"'; ?>>B+</option>
                        <option value="B-" <?php if($bloodgroup=="B-") echo 'selected="selected"'; ?>>B-</option>
                        <option value="AB+" <?php if($bloodgroup=="AB+") echo 'selected="selected"'; ?>>AB+</option>
                        <option value="AB-" <?php if($bloodgroup=="AB-") echo 'selected="selected"'; ?>>AB-</option>
                    </select>
                </div>
            </div>
            <div class="input-box">
                <label>Address</label>
                <input type="text" id="address" name="address" value=<?php echo $address; ?>>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Email Address</label>
                <input type="text" id="email" name="email" value=<?php echo $email; ?>>
            </div>
            <div class="input-box">
                <label>Doctor Assigned</label>
                <input type="text" id="doctor_assigned" name="doctor_assigned" value=<?php echo $doctor_assigned; ?>>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Date of Admission</label>
                <input type="datetime-local" id="date_of_admission" name="date_of_admission" value=<?php echo $date_of_admission; ?>>
            </div>
            <div class="input-box">
                <label>Date of Discharge</label>
                <input type="datetime-local" id="discharge_date" placeholder="Optional" name="discharge_date" value=<?php echo $discharge_date; ?>>
            </div>
        </div>
        <div class="input-box">
          <label>Patient description during admission</label><br>
          <textarea type="text" class="pat_description" id="pat_description" name="pat_description" placeholder="Enter the patient's initial condition" value="<?php echo $pat_description; ?>"></textarea>
        </div>
        <!-- hi -->
                <script type="text/javascript">
                    function ShowHideDiv() {
                        var chkYes = document.getElementById("chkYes");
                        var dvPassport1 = document.getElementById("dvPassport1");
                        var dvPassport2= document.getElementById("dvPassport2");
                        var dvPassport = document.getElementById("dvPassport");
                        dvPassport1.style.display = chkYes.checked ? "block" : "none";
                        dvPassport2.style.display = chkYes.checked ? "block" : "none";
                        dvPassport.style.display = chkYes.checked ? "block" : "none";

                        var chkNo = document.getElementById("chkNo");
                        var dvPassport3 = document.getElementById("dvPassport3");
                        var dvPassport4 = document.getElementById("dvPassport4");
                        dvPassport3.style.display = chkNo.checked ? "block" : "none";
                        dvPassport4.style.display = chkNo.checked ? "block" : "none";
                }
                function ShowHideDiv1() {
                        var chkNo = document.getElementById("chkNo");
                        var dvPassport3 = document.getElementById("dvPassport3");
                        var dvPassport4 = document.getElementById("dvPassport4");
                        dvPassport3.style.display = chkNo.checked ? "block" : "none";
                        dvPassport4.style.display = chkNo.checked ? "block" : "none";

                        var chkYes = document.getElementById("chkYes");
                        var dvPassport1 = document.getElementById("dvPassport1");
                        var dvPassport2= document.getElementById("dvPassport2");
                        var dvPassport = document.getElementById("dvPassport");
                        dvPassport1.style.display = chkYes.checked ? "block" : "none";
                        dvPassport2.style.display = chkYes.checked ? "block" : "none";
                        dvPassport.style.display = chkYes.checked ? "block" : "none";
                }
                 </script>

                <label for="chkYes">
                    <input type="radio" id="chkYes" name="chkPassPort" onclick="ShowHideDiv()" />
                        Yes
                </label>
                <label for="chkNo">
                    <input type="radio" id="chkNo" name="chkPassPort" onclick="ShowHideDiv1()" />
                        No
                </label>
                <h3>In case of emergency</h3>
        <div id="dvPassport1" class="column"style="display: none">
            <div class="input-box">
                <label>Name</label>
                <input type="text" id="rel_name" name="rel_name" value=<?php echo $rel_name; ?>>
            </div>
            <div id="dvPassport2"  class="input-box" style="display: none">
                <label>Relation</label>
                <input type="text" id="rel_relation" placeholder="Optional" name="rel_relation" value=<?php echo $rel_relation; ?>>
            </div>
        </div>
        <div id="dvPassport3" class="column" style="display: none">
            <div class="input-box">
                <label>Contact</label>
                <input type="integer" id="rel_contact" name="rel_contact" value=<?php echo $rel_contact; ?>>
            </div>
            <div id="dvPassport4" class="input-box" style="display: none">
                <label>Email</label>
                <input type="text" id="rel_email" placeholder="Optional" name="rel_email" value=<?php echo $rel_email; ?>>
            </div>
        </div>
                <div id="dvPassport" style="display: none">
                    Passport Number:
                    <input type="text" id="txtPassportNumber" />
                </div>
                <!-- hi -->
        <button type="enter" class="enter-btn" name="enter">ENTER</button>
      </form>
    </section>
    <script>
        Window.addEventaListener("scroll",function(){
        var header= document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
  </body>
</html>
        