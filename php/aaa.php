<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\public\aaa.css">
    <script>
        var items = 0;
        function addItem() {
            items++;
            
            var html = "<tr>";
                html += "<td>" + items + "</td>";
                html += "<td><input class='input-box' type='text' name='itemName[]'></td>";
                html += "<td><input class='input-box' type='text' name='itemPurpose[]'></td>";
                html += "<td><input class='input-box' type='text' name='itemDosage[]'></td>";
                html += "<td><input class='input-box' type='textr' name='itemFrequency[]'></td>";
                html += "<td><button type='button' class='button2' onclick='deleteRow(this);'>Delete</button></td>"
            html += "</tr>";
    
            var row = document.getElementById("tbody").insertRow();
            row.innerHTML = html;
        }
    
        function deleteRow(button) {
            items--
            button.parentElement.parentElement.remove();
            // first parentElement will be td and second will be tr.
        }
    </script>
    <?php
 
        session_start();
        $id=3;
        $frequency=$dosage=$purpose=$name='';
        include '..\database\connect.php';

        if (isset($_POST['addInvoice']))
        {
            $date=$_POST['date'];
            for ($a = 0; $a < count($_POST['itemName']); $a++)
            {
                $name = $_POST['itemName'][$a];
                $purpose = $_POST['itemPurpose'][$a];
                $dosage = $_POST['itemDosage'][$a];
                $frequency = $_POST['itemFrequency'][$a];
                $sql = "INSERT INTO medication (name,date,purpose,dosage,frequency,pid_fk) VALUES ('$name','$date', '$purpose', '$dosage', '$frequency','$id')";
                mysqli_query($con, $sql);
            }
            header('Location: view_medication.php');
        }

    ?>
</head>
<body>
    <h1>Medication</h1>

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
				// $contact=$row['contact'];
                // $age=$row['age'];
                // $gender=$row['gender'];
				// $nationality=$row['nationality'];
				// $bloodgroup=$row['bloodgroup'];
                // $address=$row['address'];
                // $email=$row['email'];
                // $date_of_admission=$row['date_of_admission'];
                // $discharge_date=$row['discharge_date'];
                // $pat_description=$row['pat_description'];
                // $doctor_assigned=$row['doctor_assigned'];
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
    <form method="POST" action="">   
        <div class="date">
            <label>Date</label>
            <input class="box" type="datetime-local" id="date" name="date" value="<?php echo $date; ?>">
        </div>
        <table class="tbl">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Purpose</th>
                <th>Dosage</th>
                <th>Frequency</th>
            </tr>
            <tbody id="tbody"></tbody>
        </table>
    
        <button type="button" class="button1" onclick="addItem();">Add Item</button>
        <input type="submit" name="addInvoice" class="button3" value="Enter">
    </form>
    
</body>
</html>