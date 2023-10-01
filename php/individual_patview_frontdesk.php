<?php
    $pid='';
    session_start();

    include ("..\database\connect.php");
    if(isset($_GET['searchid']))
    {
        $abc=$_GET['searchid'];
        $_SESSION['searchid']=$abc;
        $id=$_SESSION['searchid'];
    }
    else if(isset($_SESSION['pid']))
    {
        $id=$_SESSION['pid'];
    }
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

        $sql="SELECT * from patient_info where pid='$id'";
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
                $date_of_visit=$row['date_of_visit'];
                $next_date_of_visit=$row['next_date_of_visit'];
                $pat_description=$row['pat_description'];
                $doctor_assigned=$row['doctor_assigned'];
                $rel_name=$row['rel_name'];
                $rel_relation=$row['rel_relation'];
                $rel_contact=$row['rel_contact'];
                $rel_email=$row['rel_email'];
                $pat_type=$row['pat_type'];
                $roomid_fk=$row['roomid_fk'];
            }
        }
    ?>
    <div class="container">
        <table>
            <tr>
                <div class="update">
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
        <?php
        if($pat_type=='inpatient')
        {
            $sql1="SELECT * FROM `room` as r JOIN ward as w ON r.ward_id_fk=w.ward_id where room_id='$roomid_fk'";
            $result1=mysqli_query($con,$sql1);
            if($result1)
            {
                $room_name=$ward_name='';
                while($row1=mysqli_fetch_assoc($result1))
                {
                    $room_name=$row1['room_name'];
                    $ward_name=$row1['ward_name'];
                }
            }
            echo"
                <table class='admission_details'>
                    <tr>
                        <h3>Admission Details</h3>
                    </tr>
                    <tr>
                        <th>Patient Type</th>
                        <td>$pat_type</td>
                    </tr>
                    <tr>
                        <th>Doctor Assigned</th>
                        <td>$doctor_assigned</td>
                    </tr>
                    <tr>
                        <th>Ward Assigned</th>
                        <td>$ward_name</td>
                    </tr>
                    <tr>
                        <th>Room Assigned</th>
                        <td> $room_name</td>
                    </tr>
                    <tr>
                        <th>Date of Admission</th>
                        <td> $date_of_admission</td>
                    </tr>
                    <tr>
                        <th>Date of discharge</th>
                        <td> $discharge_date</td>
                    </tr> 
                    <tr>
                        <th>Patient Description During Admission</th>
                        <td> $pat_description </td>
                    </tr>  
                </table>";
        }
        if($pat_type=='outpatient')
        {
                echo"
                <table class='admission_details'>
                    <tr>
                        <h3>Appointment Details</h3>
                    </tr>
                    <tr>
                    <th>Patient Type</th>
                        <td>$pat_type</td>
                    </tr>
                    <tr>
                        <th>Doctor Assigned</th>
                        <td> $doctor_assigned</td>
                    </tr>
                    <tr>
                        <th>Date of Visit</th>
                        <td> $date_of_visit</td>
                    </tr>
                    <tr>
                        <th>Date of next visit</th>
                        <td> $next_date_of_visit</td>
                    </tr> 
                    <tr>
                        <th>Patient Description </th>
                        <td> $pat_description </td>
                    </tr>  
                </table>";
        }
        ?>
 <table>
                    <tr>
                        <h3>In case of emergency</h3>  
                    </tr>
                    <tr>
                    <th>Name</th>
                        <td><?= $rel_name?></td>
                    </tr>
                    <tr>
                        <th>Relation</th>
                        <td><?=$rel_relation?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td><?= $rel_contact?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $rel_email?></td>
                    </tr> 
                </table>
    </div>
</body>
</html>