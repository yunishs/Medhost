<?php
    include ("..\database\connect.php");
    $pid='';
	session_start();
	$id=$_SESSION['pid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Patient Prognosis View</title>
	<link rel="stylesheet"  href="..\public\view_diag_prog.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
<?php
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
				// $contact=$row['contact'];
                // $age=$row['age'];
                // $gender=$row['gender'];
				// $nationality=$row['nationality'];
				// $bloodgroup=$row['bloodgroup'];
                // $address=$row['address'];
                // $email=$row['email'];
                // $date_of_admission=$row['date_of_admission'];
                // $discharge_date=$row['discharge_date'];
                // $pat_description=$row['pat_description'];
                // $doctor_assigned=$row['doctor_assigned'];
            }
        }
    ?>

    <table>
        <tr>
            <th>Patient ID</th>
            <td><?= $pid?></td>
            <th>Patient Name</th>
            <td><?= $name?></td>
        </tr>
    </table>
    
    <table class="tbl">
		<thread>
			<tr>
                <th>Prog_id</th>
				<th>Date</th>
				<th>Condition of Patient</th>
				<th>BP</th>
				<th>Sugar</th>
				<th>Heart Rate</th>
				<th>SPO2</th>
				<th>Remarks</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql="SELECT * from pat_prognosis as pg JOIN patient_info as p on p.pid=pg.pid_fk where p.pid='$pid'";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$prog_id=$row['prog_id'];
					$date=$row['date'];
					$condition_of_pat=$row['condition_of_pat'];
					$bp=$row['bp'];
					$sugar_level=$row['sugar_level'];
					$heart_rate=$row['heart_rate'];
					$spo2=$row['spo2'];
				    $remarks=$row['remarks'];

					echo '<tr>
					    <th>'.$prog_id.'</th>
					    <td>'.$date.'</td>
					    <td>'.$condition_of_pat.'</td>
						<td>'.$bp.'</td>
						<td>'.$sugar_level.'</td>
						<td>'.$heart_rate.'</td>
						<td>'.$spo2.'</td>
					    <td>'.$remarks.'</td>
					    <td>
					        <button class="button1"><a href="update_prognosis_medical.php?updateid='.$prog_id.'" class="link1">Update</a></button>
					        <button class="button2"><a href="delete_prognosis_medical.php?deleteid='.$prog_id.'" class="link2">Delete</a></button>
					    </td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
	</table>
</body>
</html>