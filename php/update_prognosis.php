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
	<title>Update Diagnosis</title>
	<link rel="stylesheet"  href="..\public\update_diag_prog.css">
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
    <section class="container">
        <form class="form" method="POST">
            <div class="input-box">
                <label>Date</label><br>
                <input type="datetime-local" id="date" name="date" value="<?php echo $date; ?>">
            </div>
            <div class="input-box">
                <label>Condition of Patient</label><br>
                <textarea type="text" class="condition_of_pat" id="condition_of_pat" name="condition_of_pat" placeholder="Enter the medical condition of patient.." value="<?php echo $condition_of_pat; ?>"></textarea>
            </div>
            <div class="input-box">
                <label>Remarks</label><br>
                <textarea type="text" class="remarks" id="remarks" name="remarks" placeholder="Enter the remarks.." value="<?php echo $remarks; ?>"></textarea>
            </div>
            <button type="enter" class="enter-btn" name="enter">ENTER</button>
        </form>
    </section>
    


</body>