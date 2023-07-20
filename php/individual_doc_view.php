<?php

include '..\database\connect.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head
      <meta charset="utf-8">
      <title>Individual Panel</title>
      <link rel="stylesheet" href="..\public\individual_doc_view.css"> <!-- change garnu parcha -->
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
   </head>
   <body>
    <header>
        <div class="logosec">
            <img src="..\images\MedHost.png"
            class="icn menuicn"
            id="menuicn">
            <div class="logo">MedHost</div>
        </div>
    </header>
        <?php
            $sql="Select * from doctor_reg LIMIT 1";
			$result=mysqli_query($con,$sql);
			if($result)
			{
					while($row=mysqli_fetch_assoc($result)){
					$id=$row['did'];
					$fname=$row['fname'];
					$mname=$row['mname'];
					$lname=$row['lname'];
					$nmc_id=$row['nmc_id'];
                    $gender=$row['gender'];
                    $age=$row['age'];
					$contact=$row['contact'];
					$email=$row['email'];
                    }
            }
        ?>
        <div class=row>
            <h3>Patient information</h3>
            <ul>First Name:     <span><?= $fname?></span></ul>
            <ul>Middle Name:    <span><?= $mname?></span></ul>
            <ul>Last Name:      <span><?= $lname?></span></ul>
            <ul>NMC Id:         <span><?= $nmc_id?></span></ul>
            <ul>Gender:         <span><?= $gender?></span></ul>
            <ul>Age:            <span><?= $age?></span></ul>
            <ul>Contact:        <span><?= $contact?></span></ul>
            <ul>Email:        <span><?= $email?></span></ul>

        </div>
    </body>