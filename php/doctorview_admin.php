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
	<link rel="stylesheet"  href="../public/doctorview_admin1.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
	<table class="tbl">
		<thread>
			<tr>
				<th>D-ID</th>
				<th>Name</th>
				<th>NMC ID</th>
				<th>Specialization</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php
			$name='';
			$sql="Select * from doctor_info";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$id=$row['did'];
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
					$nmc_id=$row['nmc_id'];
					$specialization=$row['specialization'];
					$contact=$row['contact'];
					$email=$row['email'];					
					echo ' <tr>
					<th>'.$id.'</th>
					<td>'.$name.'</td>
					<td>'.$nmc_id.'</td>
					<td>'.$specialization.'</td>
					<td>'.$contact.'</td>
					<td>'.$email.'</td>
					<td>
						<button class="button1"><a href="individual_doc_view.php?searchid='.$id.'" class="link1">View</a></button>
						<button class="button2"><a href="update_doctor.php?updateid='.$id.'" class="link2">Update</a></button>
						<button class="button3"><a href="delete_doctor.php?deleteid='.$id.'" class="link3">Delete</a></button>
					</td>
					</tr>';
				}
			}	
			
			?>
		</tbody>
	</table>
</body>
</html>