<?php
    include ("..\database\connect.php");
    $pid='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Patient Diagnosis View</title>
	<link rel="stylesheet"  href="..\public\view_diag_prog.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
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
                <th>Diag_id</th>
				<th>Date</th>
				<th>Symptoms</th>
				<th>Tests Conducted</th>
				<th>Medication</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql="SELECT * from pat_diagnosis as d JOIN patient_info as p on p.pid=d.pid_fk where p.pid='$pid'";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$diag_id=$row['diag_id'];
					$date=$row['date'];
					$symptoms=$row['symptoms'];
					$test_conducted=$row['test_conducted'];
					$medication=$row['medication'];

					echo '<tr>
					    <th>'.$diag_id.'</th>
					    <td>'.$date.'</td>
					    <td>'.$symptoms.'</td>
					    <td>'.$test_conducted.'</td>
					    <td>'.$medication.'</td>
					    <td>
					        <button class="button1"><a href="update_diagnosis.php?updateid='.$diag_id.'" class="link1">Update</a></button>
					        <button class="button2"><a href="delete_diagnosis.php?deleteid='.$diag_id.'" class="link2">Delete</a></button>
					    </td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
	</table>
</body>
</html>