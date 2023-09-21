<?php

    include ("..\database\connect.php");
   
    //initializing variables
    $fname=$mname=$lname=$age=$gender=$nationality=$bloodgroup=$address=$contact=$email=$pat_description="";
    $fnameErr=$mnameErr=$lnameErr=$ageErr=$genderErr=$nationalityErr=$bloodgroupErr=$addressErr=$contactErr=$emailErr=$pat_descriptionErr=null;
// try{
    if(isset($_POST['enter']))
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          function function_alert($message) {
            echo "<script>alert('$message');</script>";
        }
        if(  empty($symptomsErr) && empty($test_conductedErr) && empty($medication))
    {
        $sql="insert into patient_info(symptoms,test_conducted_medication) values ('$symptoms','$test_conducted','$medication')";
        $result=mysqli_query($con,$sql);
        if($result){
            // function_alert("Data inserted successfully");
            header('Location: pat_view.php');
        }
        else
        {
            // function_alert("Data couldn't be inserted successfully");
            die(mysqli_error($con));
            
        }
    }
    else
    {
          {
            $symptoms=test_input($_POST['symptoms']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$symptoms)) {
                $symptomsErr = "Only letters and whitespace allowed in specialization";
            }    
        }  
        {
            $test_conducted=test_input($_POST['test_conducted']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$test_conducted)) {
                $test_conductedErr = "Only letters and whitespace allowed in specialization";
            }    
        }  
        {
            $medication=test_input($_POST['medication']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$medication)) {
                $medicationErr = "Only letters and whitespace allowed in specialization";
            }    
        }  
        if(!empty($dateandtimeErr)){
            function_alert($datenadtimeErr);
        } 
        if(!empty($symptomsErr)){
            function_alert($symptomsErr);
        }     
        if(!empty($test_conductedErr)){
            function_alert($test_conductedErr);
        }
        if(!empty($medicationErr)){
            function_alert($medicationErr);
        }       
    }
}
?>


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Update Diagnosis</title>
      <link rel="stylesheet" href="..\public\update_diag_prog.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
   </head>
<body>
    <!-- <header>
        <div class="logosec">
            <img src="..\images\MedHost.png"
            class="icn menuicn"
            id="menuicn">
            <div class="logo">MedHost</div>
        </div>
    </header> -->
    
    <?php
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
                $dateandtime=$row['dateandtime'];
                $symptoms=$row['symptoms'];
                $test_conducted=$row['test_conducted'];
                $medication=$row['medication'];
            }
        }
    ?>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_page</title>
    <link rel="stylesheet" href="..\public\update_diag_prog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="..\images\MedHost.png">
</head>
<body>
    <header>
        <div class="logosec">
            <img src="..\images\MedHost.png"
                class="icn menuicn"
                id="menuicn">
                <div class="logo">MED-Host</div>
        </div>
    </header>
    <div class="container">
    <table>
            <tr>
                <th>Patient-ID</th>
                <td class="pid"><?= $pid?></td>
                <th>Patient's Name</th>
                <td><?= $name?></td>
            </tr>
    </table>
    </div>  
    <form method="POST">
        <div class="input-box">
            <h3>Diagnosis:</h3>
            <!-- <form action="" method="post"></form> -->
            <div class="row">
                <div class="cols-25">
                <label class="dateandtime">Date:</label>
                </div>
                <div class="col-35">
                    <input type="integer" class="dateandtime" id="dateandtime" name="dateandtime" placeholder="Enter the date:" value=<?php echo $dateandtime; ?>>
                </div>
                </div>
            <div class="row">
                <div class="col-25" >
                <label class="symptoms">Symptoms: </label>
                </div> 
                <div class="col-35">
                    <input type="text" class="symptoms" id="symptoms" name="symptoms" placeholder="Enter the patient's symptoms" value=<?php echo $symptoms; ?>>
                </div>
    </div>
                <div class="row">
                <div class="col-25" >
                <label class="test_conducted">Test conducted: </label>
                </div>
                <div class="col-35">
                    <input type="text" class="test_conducted" id="test_conducted" name="test_conducted" placeholder="Enter the test's conducted" value=<?php echo $test_conducted; ?>>
                </div>
    </div>
                <div class="row">
                <div class="col-25" >
                <label class="medication">Medication: </label>
                </div>
                <div class="col-35">
                    <input type="text" class="medication" id="medication" name="medication" placeholder="Enter the patient's medications" value=<?php echo $medication; ?>>
                </div>
    </div>

</body>
</html>