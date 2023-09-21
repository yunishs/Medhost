<?php

    include ("..\database\connect.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Individual Patient View</title>
      <link rel="stylesheet" href="..\public\individual_pat_view.css">
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
				$contact=$row['contact'];
                $age=$row['age'];
                $gender=$row['gender'];
				$nationality=$row['nationality'];
				$bloodgroup=$row['bloodgroup'];
                $address=$row['address'];
                $email=$row['email'];
                $date_of_admission=$row['date_of_admission'];
                $discharge_date=$row['discharge_date'];
                $pat_description=$row['pat_description'];
                // $illness=$row['illness'];
                // $diagnosis=$row['diagnosis'];
                // $treatment=$row['treatment'];
                $doctor_assigned=$row['doctor_assigned'];
                // $remarks=$row['remarks'];
            }
        }
    ?>
    <div class="container">
        <table>
            <tr>
                <h3>Personal Information's</h3>
            </tr>
            <tr>
                <th>Patient-ID</th>
                <td class="pid"><?= $pid?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?= $name?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?= $age?></td>
                <th>Bloodgroup</th>
                <td><?= $bloodgroup?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?= $gender?></td>
                <th>Address</th>
                <td><?= $address?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?= $contact?></td>
                <th>Email</th>
                <td><?= $email?></td>
            </tr>
            <tr>
        </table>
        <table class="admission_details">
            <tr>
                <h3>Admission Details</h3>
            </tr>
            <tr>
                <th>Date of Admission</th>
                <td><?= $date_of_admission?></td>
            </tr>
            <tr>
                <th>Date of discharge</th>
                <td><?= $discharge_date?></td>
            </tr> 
            <tr>
                <th>Patient Description During Admission</th>
                <td><?= $pat_description ?></td>
            </tr>  
        </table>
    </div>
</body>
</html>