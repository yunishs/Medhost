<?php

    session_start();
    $id=$_SESSION['pid'];
    include '..\database\connect.php';
    //initializing variables
    $condition_of_pat=$remarks=$date="";
    $condition_of_patErr=$remarksErr=$dateErr=null;

    $sql="SELECT * from patient_info where pid=$id";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			while($row=mysqli_fetch_assoc($result))
            {
                $pid=$row['pid'];
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
            }
        }
// try{
    if(isset($_POST['enter']))
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }

        if (empty($_POST["condition_of_pat"])) 
        {
            $condition_of_patErr = "condition_of_pat is required";
        } 
        else {
            $condition_of_pat=test_input($_POST['condition_of_pat']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$condition_of_pat)) {
                $condition_of_patErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in condition_of_pat";
            }    
        }

        if (empty($_POST["remarks"])) 
        {
            $remarksErr = "remarks is required";
        } 
        else {
            $remarks=test_input($_POST['remarks']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$remarks)) {
                $remarksErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in remarks";
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
        if (empty($_POST['bp'])) 
        {
            $bpErr = "Blood Pressure is required";
        } 
        else
        {
            $bp=test_input($_POST['bp']); 
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$bp)) {
                $bpErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in remarks";
            }   
        }
        if (empty($_POST['sl'])) 
        {
            $slErr = "Sugar level is required";
        } 
        else
        {
            $sl=test_input($_POST['sl']); 
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$sl)) {
                $slErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in remarks";
            }   
        }
        if (empty($_POST['hr'])) 
        {
            $hrErr = "Heart Rate is required";
        } 
        else
        {
            $hr=test_input($_POST['hr']); 
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$hr)) {
                $hrErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in remarks";
            }   
        }
        if (empty($_POST['SPO2'])) 
        {
            $SPO2Err = "SPO2 is required";
        } 
        else
        {
            $SPO2=test_input($_POST['SPO2']); 
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$SPO2)) {
                $SPO2Err = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in remarks";
            }   
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
        
        
        if(empty($condition_of_patErr) && empty($remarksErr) && empty($dateErr) && empty($bpErr) && empty($slErr) && empty($hrErr) && empty($SPO2Err))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");


            $sql="insert into pat_prognosis(condition_of_pat,remarks,date,pid_fk,bp,sl,hr,SPO2) values ('$condition_of_pat','$remarks','$date','$pid','$bp','$hr','$sl','$SPO2')";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data inserted successfully");
                header('Location: view_prognosis.php');
            }
            else
            {
                // function_alert("Data couldn't be inserted successfully");
                die(mysqli_error($con));
                
            }
        }
        else
        {
            if (!empty($condition_of_patErr)){
                function_alert($condition_of_patErr);
            }
            if(!empty($remarksErr)){
                function_alert($remarksErr);
            }
            if(!empty($dateErr)){
                function_alert($dateErr);
            }  
            if(!empty($bpErr)){
                function_alert($bpErr);
            }
            if(!empty($slErr)){
                function_alert($slErr);
            }
            if(!empty($hrErr)){
                function_alert($hrErr);
            }
            if(!empty($SPO2Err)){
                function_alert($SPO2Err);
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
	<title>Update Prognosis</title>
	<link rel="stylesheet"  href="..\public\aaaaaaaaaaa.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
    <table>
        <tr>
            <th>Patient ID</th>
            <td><?= $pid?></td>
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
            <div class="column" >
                <div class="input-box">
                <label>Blood Pressure</label>
                <input type="text" id="bp" name="bp" size="10px" value="<?php echo $bp; ?>">
                </div>
                <div class="input-box">
                <label>Sugar level</label>
                <input type="text" id="sl" name="sl" size="10px" value="<?php echo $sl; ?>">
                </div>
            </div>
            <div class="column" >
                <div class="input-box">
                <label>Heart Rate</label>
                <input type="text" id="hr" name="hr" size="10px" value="<?php echo $hr; ?>">
            </div>
            <div class="input-box">
                <label>SPO2</label>
                <input type="text" id="SPO2" name="SPO" size="10px" value="<?php echo $SPO2; ?>">
            </div>
            </div>
            <div class="input-box">
                <label>Condition of Patient</label><br>
                <textarea type="text" class="condition_of_pat" id="condition_of_pat" name="condition_of_pat" placeholder="Enter the medical condition of patient.." value="<?php echo $condition_of_pat; ?>"></textarea>
            </div>
            <div class="input-box">
                <label>Remarks</label><br>
                <textarea type="text" class="remarks" id="remarks" name="remarks" placeholder="Enter the remarks.." value="<?php echo $remarks; ?>"></textarea>
            </div>
            <button type="enter" class="enter-btn" name="enter">ENTER</button>
        </form>
    </section>
    


</body>