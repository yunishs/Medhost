<?php

include '..\database\connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Doctor view</title>
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
				<th>NMC ID</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Password</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql="Select * from doctor_reg";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$id=$row['did'];
					$fname=$row['fname'];
					$mname=$row['mname'];
					$lname=$row['lname'];
					$nmc_id=$row['nmc_id'];
					$contact=$row['contact'];
					$email=$row['email'];
					$password=$row['password'];
					echo ' <tr>
					<th>'.$id.'</th>
					<td>'.$fname.'</td>
					<td>'.$mname.'</td>
					<td>'.$lname.'</td>
					<td>'.$nmc_id.'</td>
					<td>'.$contact.'</td>
					<td>'.$email.'</td>
					<td>'.$password.'</td>
					<td>
					<button class="button"><a href="update_doctor.php?updateid='.$id.'">Update</a></button>
					<button class="button"><a href="delete_doctor.php?deleteid='.$id.'">Delete</a></button>
					</td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
	</table>
</body>
</html>