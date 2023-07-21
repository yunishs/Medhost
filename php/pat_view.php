<?php

include '..\database\connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Patient view</title>
	<link rel="stylesheet"  href="..\public\doctorview_admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
	<table class="tbl">
		<thread>
			<tr>
				<th>S.N.</th>
				<th>Fname</th>
				<th>Mname</th>
				<th>Lname</th>
				<th>Contact</th>
                <th>Bloodgroup</th>
				<th>Email</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql="Select * from patient_reg";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$id=$row['pid'];
					$fname=$row['fname'];
					$mname=$row['mname'];
					$lname=$row['lname'];
					$contact=$row['contact'];
                    $bloodgroup=$row['bloodgroup'];
					$email=$row['email'];
					echo ' <tr>
					<th>'.$id.'</th>
					<td>'.$fname.'</td>
					<td>'.$mname.'</td>
					<td>'.$lname.'</td>
					<td>'.$contact.'</td>
                    <td>'.$bloodgroup.'</td>
					<td>'.$email.'</td>
					<td>
					<button class="button1"><a href="update_patient.php?updateid='.$id.'" class="link1">Update</a></button>
					<button class="button2"><a href="delete_patient.php?deleteid='.$id.'" class="link2">Delete</a></button>
					</td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
	</table>
</body>
</html>