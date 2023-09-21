<?php

    include '..\database\connect.php';
    //initializing variables
    $condition_of_pat=$remarks=$date="";
    $condition_of_patErr=$remarksErr=$dateErr=null;

    $sql="SELECT * from patient_info where fname='Ram' AND contact='9844656849' LIMIT 1";
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


            $sql="insert into pat_diagnosis(condition_of_pat,remarks,date,pid_fk) values ('$condition_of_pat','$remarks','$date','$pid')";
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