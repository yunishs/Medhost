<?php

    include ("..\database\connect.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Update Prognosis</title>
      <link rel="stylesheet" href="..\public\update_diag_prog.css">
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
                $date=$row['date'];
                $condition_of_patient=$row['condition_of_patient'];
                //$condition_of_patient=$row['condition_of_patient']
                $remarks=$row['remarks'];
                // $remarks=$row['remarks'];
            }
        }
    ?>
    <div class="container">
        <table>
            <tr>
                <h3>Information</h3>
            </tr>
            <tr>
                <th>Patient-ID</th>
                <td class="pid"><?= $pid?></td>
                <th>Patient's Name</th>
                <td><?= $name?></td>
            </tr>
    </table>
            <table>
            <tr>
                <h3>Prognosis</h3>
            </tr>
            <tr>
                <th>Date</th>
                <td><?=$date?></td>
    </tr>
            <tr>
                <th>Condition of patient</th>
                <td><?= $condition_of_patient?></td>
            </tr>
            <tr>
                <th>Remarks</th>
                <td><?= $remarks?></td>
            </tr>  
        </table>
    </div>
</body>
</html>