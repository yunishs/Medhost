<?php


    include '..\database\connect.php';
    //initializing variables
    $id=$_GET['updateid'];
    $sql="SELECT * from pat_prognosis WHERE prog_id=$id";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $condition_of_pat=$row['condition_of_pat'];
    $remarks=$row['remarks'];
    $date=$row['date'];
    $pid_fk=$row['pid_fk'];

    $sql1="SELECT * from patient_info as p JOIN pat_prognosis as d on d.pid_fk=p.pid WHERE p.pid=$pid_fk";
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
            if (!preg_match("/^[a-zA-Z-' ]*$/",$condition_of_pat)) {
                $condition_of_patErr = "Only letters and whitespace allowed in condition_of_pat";
            }    
        }

        if (empty($_POST["remarks"])) 
        {
            $remarksErr = "remarks is required";
        } 
        else {
            $remarks=test_input($_POST['remarks']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$remarks)) {
                $remarksErr = "Only letters and whitespace allowed in remarks";
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
        
        
        if(empty($condition_of_patErr) && empty($remarksErr) && empty($dateErr))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");


            $sql="UPDATE pat_prognosis SET prog_id=$id,condition_of_pat='$condition_of_pat',remarks='$remarks',date='$date' WHERE prog_id=$id";
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
                <label>Condition of Patient</label><br>
                <textarea type="text" class="condition_of_pat" id="condition_of_pat" name="condition_of_pat" placeholder="Enter the medical condition of patient.." ><?php echo $condition_of_pat; ?></textarea>
            </div>
            <div class="input-box">
                <label>Remarks</label><br>
                <textarea type="text" class="remarks" id="remarks" name="remarks" placeholder="Enter the remarks.." ><?php echo $remarks; ?></textarea>
            </div>
            <button type="enter" class="enter-btn" name="enter">ENTER</button>
        </form>
    </section>
    


</body>