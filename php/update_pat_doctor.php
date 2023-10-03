<?php
    session_start();
    $_SESSION['ward_up']='';
    $_Session['ward_name']='';
    $_Session['room_name']='';
    include '..\database\connect.php';

    $id=$_GET['updateid'];
    $ward_name='';
    // header("update_pat_frontdesk.php","update_pat_frontdesk.php",FALSE);

    $sql="SELECT * from patient_info WHERE pid=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);

    $fname=$row['fname'];
    $mname=$row['mname'];
    $lname=$row['lname'];
    $contact=$row['contact'];
    $age=$row['age'];
    $gender=$row['gender'];
    $nationality=$row['nationality'];
    $bloodgroup=$row['bloodgroup'];
    $address=$row['address'];
    $email=$row['email'];
    $rel_name=$row['rel_name'];
    $rel_relation=$row['rel_relation'];
    $rel_contact=$row['rel_contact'];
    $rel_email=$row['rel_email'];
    $doctor_assigned=$row['doctor_assigned'];
    $date_of_admission=$row['date_of_admission'];
    $pat_type=$row['pat_type'];
    if(($row['discharge_date'])=="0000-00-00 00:00:00")
    {
        $discharge_date=null;
    }
    else
    {
        $discharge_date=$row['discharge_date'];
    }
    
    if(empty($row['date_of_admission']))
    {
        $date_of_admission=null;
    }
    else
    {
        $date_of_admission=$row['date_of_admission'];
    }

    if(empty($row['next_date_of_visit']))
    {
        $next_date_of_visit=null;
    }
    else
    {
        $next_date_of_visit=$row['next_date_of_visit'];
    }

    if(empty($row['date_of_visit']))
    {
        $date_of_visit=null;
    }
    else
    {
        $date_of_visit=$row['date_of_visit'];
    }
    // $date_of_admission=$row['date_of_admission'];
    
    $pat_description=$row["pat_description"];
    $roomid_fk=$row['roomid_fk'];
    if($pat_type=='inpatient')
    {
        $ward_name='';
        $room_name='';
        $sqli="SELECT * FROM room as r JOIN ward as w on r.ward_id_fk=w.ward_id WHERE r.room_id=$roomid_fk";
        $resulti=mysqli_query($con,$sqli);
        $rowi=mysqli_fetch_assoc($resulti);
        $ward_name=$rowi['ward_name'];
        $room_name=$rowi['room_name'];
        $_SESSION['roomid_fk']=$roomid_fk;
        

    }
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

        if (empty($_POST["genderx"])) 
        {
            $genderErr = "Gender is required";
        } 
        else
        {
            $gender=test_input($_POST['genderx']);   
        } 

        {
            $nationality=test_input($_POST['nationality']);
            if (!preg_match("/^[a-zA-Z]*$/",$nationality)) {
                $nationalityErr = "Only letters and whitespace allowed in nationality";
            }    
        } 

        {
            $address=test_input($_POST['address']);  
        }
        
        // if (empty($_POST["gender1"])) 
        // {
        //     $gender1Err = "Patient Type is required";
        // } 
        // else
        // {
        //     $gender1=test_input($_POST['gender1']);   
        // } 

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
            $rel_name=test_input($_POST['rel_name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$rel_name)) {
                $rel_nameErr = "Only letters and whitespace allowed in name";
            }    
        } 

        {
            $rel_relation=test_input($_POST['rel_relation']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$rel_relation)) {
                $rel_relationErr = "Only letters and whitespace allowed in relation";
            }    
        } 

        {
            $rel_contact=test_input($_POST['rel_contact']);  
        } 

        {
            $rel_email=test_input($_POST['rel_email']);
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

        if($pat_type=='inpatient'){

            if(empty($_POST['discharge_date']))
            {
                $discharge_date=NULL;
            }
             else
            {
                $discharge_date=test_input($_POST['discharge_date']);
            }

            if (empty($_POST['date_of_admission']))
            {
                $date_of_admissionErr = "Date of admission is required";
            } 
            else if( $discharge_date!=null && ($_POST['date_of_admission'] > $_POST['discharge_date']))
            {
                $date_of_admissionErr="Invalid date";
            }
            else
            {
                $date_of_admission=test_input($_POST['date_of_admission']);   
            }

        }
        else{
if(empty($_POST['next_date_of_visit']))
            {
                $next_date_of_visit=NULL;
            }
             else
            {
                $next_date_of_visit=test_input($_POST['next_date_of_visit']);
            }

            if (empty($_POST['date_of_visit']))
            {
                $date_of_visitErr = "Date of visit is required";
            } 
            else if($next_date_of_visit!=null && ($_POST['next_date_of_visit'] < $_POST['date_of_visit']))
            {
                $date_of_visitErr="Invalid date";
            }
            else
            {
                $date_of_visit=test_input($_POST['date_of_visit']);   
            }
            
        }

        if (empty($_POST["doctor_assigned"])) 
        {
            $doctor_assigned = "Doctor assigned is required";
        } 
        else
        {
            $doctor_assigned=test_input($_POST['doctor_assigned']);   
        }


        if($pat_type=="inpatient")
        {
            $roomid_fk=test_input($_POST['room_idfk']);   
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
            &&empty($genderErr) &&empty($nationalityErr) &&empty($bloodgroupErr) && empty($addressErr) && empty($emailErr)  && empty($rel_nameErr) && empty($rel_relationErr) && empty($rel_contactErr) && empty($rel_emailErr) && empty($pat_descriptionErr) && empty($date_of_admissionErr) && empty($discharge_dateErr) && empty($doctor_assignedErr) && empty($gender1) && empty($date_of_visitErr) && empty($next_date_of_visitErr))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");

            if(!empty($roomid_fk)){
                $rid=$_SESSION['roomid_fk'];
                $sqlx="UPDATE room SET alloc_stat='0' WHERE room_id=$rid";
                $resultx=mysqli_query($con,$sqlx);
if(isset($discharge_date))
                {
                $sql="UPDATE patient_info SET pid='$id',fname='$fname',mname='$mname',lname='$lname',contact='$contact',age='$age',gender='$gender',nationality='$nationality',bloodgroup='$bloodgroup',address='$address',email='$email',rel_name='$rel_name',rel_relation='$rel_relation',rel_contact='$rel_contact',rel_email='$rel_email',doctor_assigned='$doctor_assigned',pat_description='$pat_description',date_of_admission='$date_of_admission',discharge_date='$discharge_date',pat_type='$pat_type',roomid_fk='$roomid_fk' WHERE pid=$id";
$result=mysqli_query($con,$sql);
                    $sql1="UPDATE room SET alloc_stat='0' WHERE room_id='$roomid_fk'";
                    $result1=mysqli_query($con,$sql1);
                }
                else
                {
                    $sql="UPDATE patient_info SET pid='$id',fname='$fname',mname='$mname',lname='$lname',contact='$contact',age='$age',gender='$gender',nationality='$nationality',bloodgroup='$bloodgroup',address='$address',email='$email',rel_name='$rel_name',rel_relation='$rel_relation',rel_contact='$rel_contact',rel_email='$rel_email',doctor_assigned='$doctor_assigned',pat_description='$pat_description',date_of_admission='$date_of_admission',pat_type='$pat_type',roomid_fk='$roomid_fk' WHERE pid=$id";
                $result=mysqli_query($con,$sql);
                $sql1="UPDATE room SET alloc_stat='1' WHERE room_id='$roomid_fk'";
                $result1=mysqli_query($con,$sql1);
}
                $_SESSION['roomid_fk']=$roomid_fk;
                if($result){
                    
                // function_alert("Data inserted successfully");
                    header('Location: pat_view_doctor.php');
                }
                else
                {
                    // function_alert("Data couldn't be inserted successfully");
                    die(mysqli_error($con));
                }
            }
            else
            {
if(isset($next_date_of_visit))
                {
                $sql2="UPDATE patient_info SET pid='$id',fname='$fname',mname='$mname',lname='$lname',contact='$contact',age='$age',gender='$gender',nationality='$nationality',bloodgroup='$bloodgroup',address='$address',email='$email',rel_name='$rel_name',rel_relation='$rel_relation',rel_contact='$rel_contact',rel_email='$rel_email',doctor_assigned='$doctor_assigned',pat_description='$pat_description',date_of_visit='$date_of_visit',next_date_of_visit='$next_date_of_visit',pat_type='$pat_type',roomid_fk=NULL WHERE pid=$id";
                $result2=mysqli_query($con,$sql2);
}
                else
                {
                    $sql2="UPDATE patient_info SET pid='$id',fname='$fname',mname='$mname',lname='$lname',contact='$contact',age='$age',gender='$gender',nationality='$nationality',bloodgroup='$bloodgroup',address='$address',email='$email',rel_name='$rel_name',rel_relation='$rel_relation',rel_contact='$rel_contact',rel_email='$rel_email',doctor_assigned='$doctor_assigned',pat_description='$pat_description',date_of_visit='$date_of_visit',pat_type='$pat_type',roomid_fk=NULL WHERE pid=$id";
                    $result2=mysqli_query($con,$sql2);
                }
                if($result2){
                
                    // function_alert("Data inserted successfully");
                        header('Location: pat_view_doctor.php');
                }
                else
                {
                        // function_alert("Data couldn't be inserted successfully");
                    die(mysqli_error($con));
                }
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
            if(!empty($rel_nameErr)){
                function_alert($rel_nameErr);
            } 
            if(!empty($rel_emailErr)){
                function_alert($rel_emailErr);
            } 
            if(!empty($rel_relationErr)){
                function_alert($rel_relationErr);
            } 
            if(!empty($rel_contactErr)){
                function_alert($rel_contactErr);
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
            if(!empty($date_of_visitErr)){
                function_alert($date_of_visitErr);
            } 
            if(!empty($next_date_of_visitErr)){
                function_alert($next_date_of_visitErr);
            } 
            // if(!empty($gender1Err)){
            //     function_alert($gender1Err);
            // } 
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
    <title>Update Patient</title>
  </head>
  <body>
  <header>
        <div class="logosec">
                <a href="dashboard_doctor.php">
                    <img src="..\images\MedHost.png"
                    class="icn menuicn"
                    id="menuicn">
                </a>
                <a href="dashboard_doctor.php" style="text-decoration:none;">
                    <div class="logo">MED-Host</div>
                </a>
                <div class="logout">
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span></a>
                </div>
        </div>
    </header>
    <br>
    <section class="container">
      <h1>Patient Update Form</h1>
      <form id="multi" method="POST"></form> 
      <form class="form" id="all" method="POST">
      <div class="column" >
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
                    <select name="genderx" id="gender" type="sty">
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
                <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Email Address</label>
                <input type="text" id="email" name="email" value=<?php echo $email; ?>>
            </div>
        </div>
        <h3>In case of emergency</h3>
        <div class="column">
            <div class="input-box">
                <label>Name</label>
                <input type="text" id="rel_name" name="rel_name" value=<?php echo $rel_name; ?>>
            </div>
            <div class="input-box">
                <label>Relation</label>
                <input type="text" id="rel_relation" placeholder="Optional" name="rel_relation" value=<?php echo $rel_relation; ?>>
            </div>
        </div>
        <div class="column">
            <div class="input-box">
                <label>Contact</label>
                <input type="integer" id="rel_contact" name="rel_contact" value=<?php echo $rel_contact; ?>>
            </div>
            <div class="input-box">
                <label>Email</label>
                <input type="text" id="rel_email" placeholder="Optional" name="rel_email" value=<?php echo $rel_email; ?>>
            </div>
        </div>
        <div class="gender-box">
          <h3>Patient Type</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender1" <?php if (isset($pat_type) && $pat_type=="inpatient"){ echo "checked";}?>/>
              <label for="check-male">In-Patient</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender1" <?php if (isset($pat_type) && $pat_type=="outpatient"){ echo "checked";}?>/>
              <label for="check-female">Out-Patient</label>
            </div>
          </div>
        </div>
        <div class="input-box">
            <label>Doctor Assigned</label>
                <div class="input-option">
                    <select id="doctor_assigned" name="doctor_assigned" type="sty">
                        <?php
                            $sql1="SELECT * FROM doctor_info";
                            $result1=mysqli_query($con,$sql1);
                            while($get=mysqli_fetch_array($result1)){
                        ?>
                        <option value="<?php echo $get['fname']?>" <?php if($doctor_assigned==$get['fname']) echo 'selected="selected"'; ?>><?php echo $get['fname'] ?></option>                        
                        <?php } ?>
                    </select>
                </div>
        </div>
        <?php if (isset($pat_type) && $pat_type=="inpatient"){?>
                    <div class="column">
                    <div class="input-box"date_of_visit>
                        <label>Date of Admission</label>
                        <input type="datetime-local" id="date_of_admission" name="date_of_admission" value="<?php echo $date_of_admission ?>">
                    </div>
                    <div class="input-box">
                        <label>Date of Discharge</label>
                        <input type="datetime-local" id="discharge_date" placeholder="Optional" name="discharge_date" value="<?php echo $discharge_date ?>">
                    </div>
                </div>
                <div class="column">
                        <div class="input-box">
                            <label>Ward</label>
                            <div class="input-option">
                            <select id="ward" name="ward" class="ward" type="sty">
                            <!-- <option value="0">Select Ward<option> -->
                            <?php
                             $sql2="SELECT * FROM ward";
                            $result2=mysqli_query($con,$sql2);
                            while($get1=mysqli_fetch_array($result2)){ $ward_id=$get1['ward_id'];?>
                                <option value="<?php echo $get1['ward_id'] ?>" <?php if($ward_name==$get1['ward_name']){ echo 'selected="selected"';}?>><?php echo $get1['ward_name'] ?></option>
                        <?php } ?>
                    </select>
                        </div>
                        </div>
                        <div class="input-box">
                            <label>Room</label>
                            <div class="input-option">
                                <select id="room" name="room_idfk" class="room">
                                    <option value="<?php echo $roomid_fk ?>"><?php echo $room_name ?></option>
                                </select>
                            </div>
                        </div>
                </div>
                <?php } ?>
                <?php if (isset($pat_type) && $pat_type=="outpatient")
                { ?>  
                    <div class="column">
                    <div class="input-box">
                        <label>Date of Appointment</label>
                        <input type="datetime-local" id="date_of_visit" name="date_of_visit" value="<?php echo $date_of_visit ?>">
                    </div>
                    <div class="input-box">
                        <label>Date of Visit</label>
                        <input type="datetime-local" id="next_date_of_visit" placeholder="Optional" name="next_date_of_visit" value="<?php echo $next_date_of_visit ?>">
                    </div>
                </div>
                <?php } ?>
        </div>
        <div class="input-box">
          <label>Patient description during admission</label><br>
          <textarea type="text" class="pat_description" id="pat_description" name="pat_description" placeholder="Enter the patient's initial condition"><?php echo $pat_description; ?></textarea>
        </div>
        
        <button type="submit" class="enter-btn" name="enter">ENTER</button>
    </form>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function()
    {
        $(".ward").change(function()
        {
            var ward_id=$(this).val();
            var post_id = 'id='+ward_id;
            $.ajax
            ({
                type: "POST",
                url: "a-load.php",
                data: post_id,
                cache:false,
                success: function(rooms)
                {
                    $(".room").html(rooms);
                } 
            });
        });
    });
</script>
    <script>
        Window.addEventaListener("scroll",function(){
        var header= document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
  </body>
</html>