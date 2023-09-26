<?php
    $pid='';
    // session_start();

    include ("..\database\connect.php");
    $id=3;
    // $id=$_SESSION['pid'];


// Include autoloader 
require_once '../dompdf/autoload.inc.php'; 



// Load HTML content 
$html='<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Individual Patient View</title>
      <style>
      *{
        margin: 0;
        padding: 0px 0px 15px 0px;
        box-sizing:border-box;
        font-family: "Poppins", sans-serif;
    }
    body
    {
        
        padding-left: 10%;
        /* font-size: large; */
    }
    header{
      position: fixed;
      display: block;
      top: 0;
      left: 0;
      width: 100%;
      height:30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 40px 40px;
      background-color: #fafaff;
    }
    .logo {
      font-size: 30px;
      font-weight: 600;
      color: rgb(16, 47, 184);
      }
      .icn {
      height: 45px;
      }
      .menuicn {
      cursor: pointer;
      }
    
      .logosec {
      display: inline;
      align-items: center;
      justify-content: center;
      gap: 60px;
    }
    .container
    {
      margin-top:10px;
    }
    .tbl {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 90%;
      /* margin-left: 20px; */
    }
    
    .tbl td, .tbl th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    .tbl tr:hover {background-color: #ddd;}
    
    .tbl th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #38bc8c;
      color: white;
    }
    h3
    {
        align-items:center;
        margin-top:40px;
        margin-bottom: 10px;
    }
    table 
    {
        align-items: center;
        border-collapse:initial;
        width: 90%;
        padding:15px;
        box-shadow:5px 5px 10px rgba(0, 0, 0, 0.25);
    }
    .update
    {
      width: 90%;
      display: flex;
      justify-content: space-between;
      flex-direction: row;
      align-items: center;
    }
    .butn
    {
      
      margin-right: 5px;
      text-align: center;
      background-color: #38bc8c;
      border-radius: 3px;
      padding: 7px;
    }
    .butn:hover
    {
      background-color: rgb(176, 219, 20);
    }
    .link
    {
      font-size: 16px;
      margin:0px;
      text-align: center;
      cursor: pointer;
      color:rgb(250, 245, 245);
      text-decoration: none;
    }
    .link:hover
    {
      color:rgb(100, 16, 13);
    }
    .pid,.did,.mid,.fid
    {
        background-color: aliceblue;
    }
      th{
        text-align: left;
        padding: 8px 8px 8px 8px;
        border-bottom: 1px solid #8f8c8c;
      }
      td {
        text-align: left;
        padding: 8px 8px 8px 20px;
        border-bottom: 1px solid #8f8c8c;
      }
      
      
</style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
   </head>
<body>';
        $sql="SELECT * from patient_info where pid=$id";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			while($row=mysqli_fetch_assoc($result))
            {
                $pid=$row["pid"];
				$fname=$row["fname"];
				$mname=$row["mname"];
				$lname=$row["lname"];
                if($mname=="")
                {
                    $name=$fname." ".$lname;
                }
                else
                {
                    $name=$fname." ".$mname." ".$lname;
                }
				$contact=$row["contact"];
                $age=$row["age"];
                $gender=$row["gender"];
				$nationality=$row["nationality"];
				$bloodgroup=$row["bloodgroup"];
                $address=$row["address"];
                $email=$row["email"];
                $date_of_admission=$row["date_of_admission"];
                $discharge_date=$row["discharge_date"];
                $pat_description=$row["pat_description"];
                $doctor_assigned=$row["doctor_assigned"];
                $rel_name=$row["rel_name"];
                $rel_relation=$row["rel_relation"];
                $rel_contact=$row["rel_contact"];
                $rel_email=$row["rel_email"];
                $pat_type=$row["pat_type"];
                $roomid_fk=$row["roomid_fk"];
            }
        }
    $html .='<div class="container">
        <table>
            <tr>
                <div class="update">
                    <h3>Personal Information</h3>
                </div>
            </tr>
            <tr>
                <th>Patient-ID</th>
                <td class="pid">.'. $pid. '</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>'. $name .'</td>
            </tr>
            <tr>
                <th>Age</th>
                <td>'. $age .'</td>
                <th>Bloodgroup</th>
                <td>'. $bloodgroup .'</td>
            </tr>
            <tr>
                <th>Gender</th>
                <td>'. $gender .'</td>
                <th>Address</th>
                <td>'. $address .'</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>'. $contact .'</td>
                <th>Email</th>
                <td>
                '. $email .'</td>
            </tr>
            <tr>
        </table>';
        if($pat_type=='inpatient')
        {
            $sql1="SELECT * FROM `room` as r JOIN ward as w ON r.ward_id_fk=w.ward_id where room_id='$roomid_fk'";
            $result1=mysqli_query($con,$sql1);
            if($result1)
            {
                $room_name=$ward_name='';
                while($row1=mysqli_fetch_assoc($result1))
                {
                    $room_name=$row1["room_name"];
                    $ward_name=$row1["ward_name"];
                }
            }
            $html .='<table class="admission_details">
                    <tr>
                        <h3>Admission Details</h3>
                    </tr>
                    <tr>
                        <th>Patient Type</th>
                        <td>'. $pat_type .'</td>
                    </tr>
                    <tr>
                        <th>Doctor Assigned</th>
                        <td>'. $doctor_assigned. '</td>
                    </tr>
                    <tr>
                        <th>Ward Assigned</th>
                        <td>'. $ward_name .'</td>
                    </tr>
                    <tr>
                        <th>Room Assigned</th>
                        <td>'. $room_name .'</td>
                    </tr>
                    <tr>
                        <th>Date of Admission</th>
                        <td> '. $date_of_admission .'</td>
                    </tr>
                    <tr>
                        <th>Date of discharge</th>
                        <td>'. $discharge_date .'</td>
                    </tr> 
                    <tr>
                        <th>Patient Description During Admission</th>
                        <td> '. $pat_description .'</td>
                    </tr>  
                </table>';
        }
        if($pat_type=='outpatient')
        {
            $html .='<table class="admission_details">
                    <tr>
                        <h3>Appointment Details</h3>
                    </tr>
                    <tr>
                    <th>Patient Type</th>
                        <td>'. $pat_type .'</td>
                    </tr>
                    <tr>
                        <th>Doctor Assigned</th>
                        <td>'. $doctor_assigned .'</td>
                    </tr>
                    <tr>
                        <th>Date of Visit</th>
                        <td>'. $date_of_admission .'</td>
                    </tr>
                    <tr>
                        <th>Date of next visit</th>
                        <td>'. $discharge_date .'</td>
                    </tr> 
                    <tr>
                        <th>Patient Description </th>
                        <td>'. $pat_description .'</td>
                    </tr>  
                </table>';
        }
        $html .='
        <table class="tbl">
                <tr>
                
                        <h3>Diagnosis Details</h3>
        
                </tr>
			    <tr>
        				<th>S.N.</th>
	        			<th>Date</th>
		        		<th>Symptoms</th>
			        	<th>Test Conducted</th>
    			    	<th>Medication</th>
	    		</tr>
    		    <tbody>';
    	    		    $sql="SELECT * FROM pat_diagnosis WHERE pid_fk='$id'";
	    	    	    $result=mysqli_query($con,$sql);
		    	        if($result)
			            {
				    	    while($row=mysqli_fetch_assoc($result)){
    				    	    $diag_id=$row["diag_id"];
	    				        $date=$row["date"];
    		    			    $symptoms=$row["symptoms"];
	    		    		    $test_conducted=$row["test_conducted"];
		    		    	    $medication=$row["medication"];
			    		        $html .=' <tr>
				    	        <th>'. $diag_id .'</th>
    				    	    <td>'. $date .'</td>
	    				        <td>'. $symptoms .'</td>
		    			        <td>'. $test_conducted .'</td>
        		    			<td>'. $medication .'</td>
        			    		</tr>';
	        			    }
		        	    }
                        $html .='</tbody>
	    </table>

        <table class="tbl">
                <tr>
                        <h3>Prognosis Details</h3>
                </tr>
                <tr>
                <th>Prog_id</th>
				<th>Date</th>
				<th>Condition of Patient</th>
				<th>BP</th>
				<th>Sugar</th>
				<th>Heart Rate</th>
				<th>SPO2</th>
				<th>Remarks</th>
			</tr>
    		    <tbody>';
    	    		    $sql="SELECT * FROM pat_prognosis WHERE pid_fk=$id";
	    	    	    $result=mysqli_query($con,$sql);
		    	        if($result)
			            {
				    	    while($row=mysqli_fetch_assoc($result)){
    				    	    $prog_id=$row["prog_id"];
					$date=$row["date"];
					$condition_of_pat=$row["condition_of_pat"];
					$bp=$row["bp"];
					$sugar_level=$row["sugar_level"];
					$heart_rate=$row["heart_rate"];
					$spo2=$row["spo2"];
				    $remarks=$row["remarks"];

                    $html .='<tr>
				    	        <th>'.$prog_id .'</th>
					    <td>'. $date .'</td>
					    <td>'. $condition_of_pat .'</td>
						<td>'. $bp .'</td>
						<td>'. $sugar_level .'</td>
						<td>'. $heart_rate .'</td>
						<td>'. $spo2 .'</td>
					    <td>'. $remarks .'</td>
        			    		</tr>';
	        			    }
		        	    }
                        $html .='</tbody>
	    </table>
        <table>
                    <tr>
                        <h3>In case of emergency</h3>  
                    </tr>
                    <tr>
                    <th>Name</th>
                        <td>'. $rel_name .'</td>
                    </tr>
                    <tr>
                        <th>Relation</th>
                        <td>'. $rel_relation .'</td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <td>'. $rel_contact .'</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>'. $rel_email .'</td>
                    </tr> 
                </table>

    </div>
</body>
</html>';

use Dompdf\Dompdf; 
 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
// Load HTML content 

$dompdf->loadHtml($html); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'landscape'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// // Output the generated PDF to Browser 
// $dompdf->stream();

// // Load content from html file 
// $html = file_get_contents("pdf-content.html"); 
// $dompdf->loadHtml($html); 
 
// // (Optional) Setup the paper size and orientation 
// $dompdf->setPaper('A4', 'landscape'); 
 
// // Render the HTML as PDF 
// $dompdf->render(); 
 
// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("codexworld", array("Attachment" => 0));
?>


