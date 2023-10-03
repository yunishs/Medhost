<?php

include '..\database\connect.php';
$name='';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Patient view</title>
	<link rel="stylesheet"  href="..\public\pat_view_admin.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
    <div class="view">
        <table class="tbl">
		    <thread>
			    <tr>
				    <th>Pid</th>
				    <th>Name</th>
    				<th>Contact</th>
                    <th>Bloodgroup</th>
                    <th>Address</th>
			    	<th>Email</th>
					<th>Type</th>
    			</tr>
	    	</thread>
		    <tbody>
    			<?php

	        		$sql="SELECT * from patient_info";
		        	$result=mysqli_query($con,$sql);
    		    	if($result)
    	    		{
	    				while($row=mysqli_fetch_assoc($result)){
			    		    $id=$row['pid'];
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
                            $bloodgroup=$row['bloodgroup'];
		    			                                $address=$row['address'];
				    	    $email=$row['email'];
						$pat_type=$row['pat_type'];
						echo " <tr>
					            <th>$id</th>
					            <td>$name</td>
		    			        <td>$contact</td>
                                <td>$bloodgroup</td>
                                <td>$address</td>
					            <td>$email</td>
					            <td> ";
							if($pat_type=='inpatient')
							{
								$discharge_date=$row['discharge_date'];
								$pat_type="Inpatient";
								echo "$pat_type";
								if(isset($discharge_date))
								{
									echo "<button class='buttonx'>Discharged</button>";
								}
								else
								{
									echo "<button class='buttony'>Active</button>";
								}

							}
							else
							{
								$pat_type="Outpatient";
								echo "$pat_type";
							}
							echo "</td>
					    </tr>";
    				    }
	    		    }	
		    	// ".$_SESSION["u_id"].=$id."
		        ?>
		    </tbody>
	    </table>
    </div>
</body>
</html>