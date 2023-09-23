<?php

    session_start();
    $id=$_SESSION['pid'];
    include ("..\database\connect.php");

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
				$contact=$row['contact'];
                $age=$row['age'];
                $gender=$row['gender'];
				$nationality=$row['nationality'];
				$bloodgroup=$row['bloodgroup'];
                $address=$row['address'];
                $email=$row['email'];
                $date_of_admission=$row['date_of_admission'];
                $discharge_date=$row['discharge_date'];
                $pat_description=$row['pat_description'];
                // $illness=$row['illness'];
                // $diagnosis=$row['diagnosis'];
                // $treatment=$row['treatment'];
                $doctor_assigned=$row['doctor_assigned'];
                // $remarks=$row['remarks'];
            }
        }
    ?>
    <div class="container">
        <table>
            <tr>
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

        <table class="admission_details">
            <tr>
                <h3>Admission Details</h3>
            </tr>
            <tr>
                <th>Date of Admission</th>
                <td><?= $date_of_admission?></td>
            </tr>
            <tr>
                <th>Date of discharge</th>
                <td><?= $discharge_date?></td>
            </tr> 
            <tr>
                <th>Patient Description During Admission</th>
                <td><?= $pat_description ?></td>
            </tr>  
        </table>

        <table class="tbl">
		    <div class="table">
                <tr>
                    <h3>Diagnosis Details</h3>
                </tr>
			    <thread>
			        <tr>
        				<th>S.N.</th>
	        			<th>Date</th>
		        		<th>Symptoms</th>
			        	<th>Test Conducted</th>
    			    	<th>Medication</th>
	    		    </tr>
		        </thread>
    		    <tbody>
    	    		<?php
    	    		    $sql="SELECT * FROM pat_diagnosis WHERE pid_fk=$id ORDER BY diag_id DESC LIMIT 5";
	    	    	    $result=mysqli_query($con,$sql);
		    	        if($result)
			            {
				    	    while($row=mysqli_fetch_assoc($result)){
    				    	    $diag_id=$row['diag_id'];
	    				        $date=$row['date'];
    		    			    $symptoms=$row['symptoms'];
	    		    		    $test_conducted=$row['test_conducted'];
		    		    	    $medication=$row['medication'];
			    		        echo " <tr>
				    	        <th>$diag_id</th>
    				    	    <td>$date</td>
	    				        <td>$symptoms</td>
		    			        <td>$test_conducted</td>
        		    			<td>$medication</td>
        			    		</tr>";
	        			    }
		        	    }
                    ?>	
		        </tbody>
    		</div>
	    </table>

        <table class="tbl">
		    <div class="table">
                <tr>
                    <h3>Prognosis Details</h3>
                </tr>
			    <thread>
			        <tr>
        				<th>S.N.</th>
	        			<th>Date</th>
		        		<th>Conditin of Patient</th>
			        	<th>Remarks</th>
	    		    </tr>
		        </thread>
    		    <tbody>
    	    		<?php
    	    		    $sql="SELECT * FROM pat_prognosis WHERE pid_fk=$id ORDER BY prog_id DESC LIMIT 5";
	    	    	    $result=mysqli_query($con,$sql);
		    	        if($result)
			            {
				    	    while($row=mysqli_fetch_assoc($result)){
    				    	    $prog_id=$row['prog_id'];
	    				        $date=$row['date'];
    		    			    $condition_of_pat=$row['condition_of_pat'];
	    		    		    $remarks=$row['remarks'];
			    		        echo " <tr>
				    	        <th>$prog_id</th>
    				    	    <td>$date</td>
	    				        <td>$condition_of_pat</td>
		    			        <td>$remarks</td>
        			    		</tr>";
	        			    }
		        	    }
                    ?>	
		        </tbody>
    		</div>
	    </table>


    </div>
</body>
</html>