<?php
    session_start();
    $id=$_SESSION['pid'];

    include '..\database\connect.php';
    //initializing variables
    $symptoms=$test_conducte=$date="";
    $symptomsErr=$test_conductedErr=$dateErr=null;

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

        if (empty($_POST["symptoms"])) 
        {
            $symptomsErr = "symptoms is required";
        } 
        else {
            $symptoms=test_input($_POST['symptoms']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$symptoms)) {
                $symptomsErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in Symptoms";
            }    
        }

        if (empty($_POST["test_conducted"])) 
        {
            $test_conductedErr = "test_conducted is required";
        } 
        else {
            $test_conducted=test_input($_POST['test_conducted']);
            if (!preg_match("/^[A-Za-z0-9]*\s*,*.*'*$/",$test_conducted)) {
                $test_conductedErr = "Only letters,numbers,whitespace,comma,fullstop and apostrophe allowed in test conducted";
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
        
        
        if(empty($symptomsErr) && empty($test_conductedErr)  && empty($dateErr))
        {
            
            // $sec = date_create($date_0f_admission);
            // $newdate = date_format($sec,"Y-m-d H:i");

            // $sec1 = date_create($discharge_date);
            // $newdate1 = date_format($sec,"Y-m-d H:i");


            $sql="insert into pat_diagnosis(symptoms,test_conducted,date,pid_fk) values ('$symptoms','$test_conducted','$date','$pid')";
            $result=mysqli_query($con,$sql);
            if($result){
                // function_alert("Data inserted successfully");
                header('Location: view_diagnosis.php');
            }
            else
            {
                // function_alert("Data couldn't be inserted successfully");
                die(mysqli_error($con));
                
            }
        }
        else
        {
            if (!empty($symptomsErr)){
                function_alert($symptomsErr);
            }
            if(!empty($test_conductedErr)){
                function_alert($test_conductedErr);
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
	    <title>Update Diagnosis</title>
	    <link rel="stylesheet"  href="..\public\update_diag_prog.css">
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
                <div class="input-box">
                    <label>Symptoms</label><br>
                    <textarea type="text" class="symptoms" id="symptoms" name="symptoms" placeholder="Enter the symptoms patient currently has.." value="<?php echo $symptoms; ?>"></textarea>
                </div>
                <div class="input-box">
                    <label>Test Conducted</label><br>
                    <textarea type="text" class="test_conducted" id="test_conducted" name="test_conducted" placeholder="Enter the tests conducted.." value="<?php echo $test_conducted; ?>"></textarea>
                </div>
                <button type="enter" class="enter-btn" name="enter">ENTER</button>
            </form>
        </section>
    </body>
</html>