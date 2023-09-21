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
        if(!empty($dateandtimeErr)){
            function_alert($datenadtimeErr);
        } 
        if(!empty($condition_of_patientErr)){
            function_alert($condition_of_patientErr);
        }
        if(!empty($remarksErr)){
            function_alert($remarksErr);
        }       
    }
}
?>


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
                $condition_of_patient=$row['condition_of_patient'];
                $remarks=$row['remarks'];
                
            }
        }
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognosis page</title>
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
    <section class="container">
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
            <h3>Prognosis:</h3>
            <form action="#" class="form">
            <!-- <form action="" method="post"></form> -->
            <div class="column">
            <div class="input-box">
                <label>Date:</label>
                <input type="datetime-local" id="dateandtime" name="dateandtime" value=<?php echo $dateandtime; ?>>
            </div>
            <div class="input-box">
                <label>Condition Of Patient:</label>
                <input type="text" id="condition_of_patient" placeholder="Enter the patient's condition" name="condition_of_patient" value=<?php echo $condition_of_patient; ?>>
            </div>
        </div>
        <div class="input-box">
          <label>Remarks:</label>
          <input type="remarks" class="remarks" id="remarks" name="remarks" placeholder="Enter the remarks fro patient" value=<?php echo $remarks; ?>>
        </div>
        <button type="enter" class="enter-btn" name="enter">ENTER</button>
      </form>
    </section>
    <script>
    window.onscroll = function() {myFunction()};
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;function myFunction() 
    {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    </script>
</body>
</html>