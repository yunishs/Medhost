<?php

include '..\database\connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>MedicalStaff view</title>
	<link rel="stylesheet"  href="..\public\doctorview_admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
	<table class="table">
		<thread>
			<tr>
				<th scope="col">S.N.</th>
				<th scope="col">Fname</th>
				<th scope="col">Mname</th>
				<th scope="col">Lname</th>
				<th scope="col">REG ID</th>
				<th scope="col">Contact</th>
				<th scope="col">Email</th>
				<th scope="col">Password</th>
				<th scope="col">Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php

			$sql="Select * from medicalstaff_reg";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$id=$row['mid'];
					$fname=$row['fname'];
					$mname=$row['mname'];
					$lname=$row['lname'];
					$reg_id=$row['reg_id'];
					$contact=$row['contact'];
					$email=$row['email'];
					$password=$row['password'];
					echo ' <tr>
					<th>'.$id.'</th>
					<td>'.$fname.'</td>
					<td>'.$mname.'</td>
					<td>'.$lname.'</td>
					<td>'.$reg_id.'</td>
					<td>'.$contact.'</td>
					<td>'.$email.'</td>
					<td>'.$password.'</td>
					<td>
					<button class=""><a href="update_medicalstaff.php?updateid='.$id.'">Update</a></button>
					<button class=""><a href="delete_medicalstaff.php?deleteid='.$id.'">Delete</a></button>
					</td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
</body>
</html>