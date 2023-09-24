<?php

    session_start();
    $id=$_GET['searchid'];
    
    include ("..\database\connect.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Individual Doctor View</title>
      <link rel="stylesheet" href="..\public\viewdfm.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
    </head>
    <body>
        <?php

            $sql="SELECT * from doctor_info where did=$id";
		    $result=mysqli_query($con,$sql);
		    if($result)
		    {
                while($row=mysqli_fetch_assoc($result))
                {
                    $did=$row['did'];
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
                    $nmc_id=$row['nmc_id'];
                    $specialization=$row['specialization'];
                    $email=$row['email'];
                }
        }
    ?>
    <h3>Doctor's Personal Information:</h3>
    <div class="container">
    
        <table> 
            <tr>
                <th>Doctor-ID</th>
                <td class="did"><?= $did?></td>
            </tr>
            <tr>
            <th>NMC ID</th>
                <td><?= $nmc_id?></td>
            </tr>   
            <tr>
                <th>Name</th>
                <td><?= $name?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?= $age?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?= $gender?></td>
            </tr>
            <tr>
                <th>Contact</th>
                <td><?= $contact?></td>
            </tr>
            <tr>
                <th>Specialization</th>
                <td><?= $specialization?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $email?></td>
            </tr>
    
	    </table>
    </div>
</body>
</html>