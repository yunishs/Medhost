<?php

    include '..\database\connect.php';
    $name='';

    $id=$_GET['updateid'];
    $sql="SELECT * from medication WHERE med_id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $mename=$row['name'];
    $purpose=$row['purpose'];
    $dosage=$row['dosage'];
    $frequency=$row['frequency'];
    $date=$row['date'];
    $pid_fk=$row['pid_fk'];

    $sql1="SELECT * from patient_info as p JOIN medication as d on d.pid_fk=p.pid WHERE p.pid=$pid_fk";
    $result1=mysqli_query($con,$sql1);
    $row=mysqli_fetch_assoc($result1);
    $fname=$row['fname'];
	$mname=$row['mname'];
	$lname=$row['lname'];
    if($mname=="")
    {
        $name=$fname." ".$lname;
    }
    else
    {
        $name=$fname." ".$mname." ".$lname;
    }

    if(isset($_POST['enter']))
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if (empty($_POST["dosage"])) 
        {
            $dosageErr = "Dosage is required";
        } 
        else {
            $dosage=test_input($_POST['dosage']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$dosage)) {
                $dosageErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in dosage";
            }    
        }
        if (empty($_POST["frequency"])) 
        {
            $frequencyErr = "frequency is required";
        } 
        else {
            $frequency=test_input($_POST['frequency']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$frequency)) {
                $frequencyErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in frequency";
            }    
        }

        if (empty($_POST["purpose"])) 
        {
            $purposeErr = "purpose is required";
        } 
        else {
            $purpose=test_input($_POST['purpose']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$purpose)) {
                $purposeErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in test conducted";
            }    
        }

        if (empty($_POST["name"])) 
        {
            $menameErr = "name is required";
        } 
        else {
            $mename=test_input($_POST['name']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$mename)) {
                $menameErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in name";
            }    
        }

        if (empty($_POST['date'])) 
        {
            $dateErr = "Date is required";
        } 
        else
        {
            $date=test_input($_POST['date']);   
        } 

        // (!preg_match("/^[a-zA-Z]*$/",$mname))
        // (!preg_match("/^[0-9]{10,}$/",$contact))
        // (!preg_match("/^[0-9]{1,2}$/",$age))

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
        
        
        if(empty($menameErr) && empty($dosageErr) && empty($purposeErr) && empty($frequencyErr) && empty($dateErr))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");

            $sql="UPDATE medication SET med_id=$id,name='$mename',purpose='$purpose',dosage='$dosage',frequency='$frequency',date='$date' WHERE med_id=$id";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data inserted successfully");
                header('Location: view_medication_medical.php');
            }
            else
            {
                // function_alert("Data couldn't be inserted successfully");
                die(mysqli_error($con));
                
            }
        }
        else
        {
            if (!empty($dosageErr)){
                function_alert($dosageErr);
            }
            if(!empty($purposeErr)){
                function_alert($purposeErr);
            }
            if (!empty($frequencyErr)){
                function_alert($frequencyErr);
            }
            if (!empty($menameErr)){
                function_alert($menameErr);
            }
            if(!empty($dateErr)){
                function_alert($dateErr);
            }  
        }
    }
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible"content="IE=edge">
	    <meta name="viewport"	content="width=device-width, initial-scale=1.0">
	    <title>Update Medication</title>
	    <link rel="stylesheet"  href="..\public\update_diag_prog.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
    </head>
    <body>
        <table>
            <tr>
                <th>Patient ID</th>
                <td><?= $pid_fk?></td>
                <th>Patient Name</th>
                <td><?= $name?></td>
            </tr>
        </table>
        <section class="container">
            <form class="form" method="POST">
                <div class="input-box">
                    <label>Date</label><br>
                    <input type="datetime-local" id="date" name="date" value="<?php echo $date; ?>">
                </div>
                <div class="input-box">
                    <label>Name</label><br>
                    <textarea type="text" class="name" id="name" name="name" placeholder="Enter the name patient currently has.." ><?php echo $mename;?></textarea>
                </div>
                <div class="input-box">
                    <label>Purpose</label><br>
                    <textarea type="text" class="purpose" id="purpose" name="purpose" placeholder="Enter the tests conducted.." ><?php echo $purpose;?></textarea>
                </div>
                <div class="input-box">
                    <label>Dosage</label><br>
                    <textarea type="text" class="dosage" id="dosage" name="dosage" placeholder="Enter the dosage patient currently has.." ><?php echo $dosage;?></textarea>
                </div>
                <div class="input-box">
                    <label>Frequency</label><br>
                    <textarea type="text" class="frequency" id="frequency" name="frequency" placeholder="Enter the frequency patient currently has.." ><?php echo $frequency;?></textarea>
                </div>
                <button type="enter" class="enter-btn" name="enter">ENTER</button>
            </form>
        </section>
    </body>
</html>