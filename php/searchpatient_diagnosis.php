<?php
    session_start();
    
    $name='';   
    $contact=''; 

    include '..\database\connect.php';

    

    if(isset($_POST['enter']))
    {
            $pid= $_POST['pid'];
            $contact= $_POST['contact'];

            $sql="SELECT * FROM patient_info WHERE contact='$contact' OR pid='$pid'";
            $result = mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result,  MYSQLI_ASSOC);
            $count= mysqli_num_rows($result);
            if($count==1)
            {
                $_SESSION['pid']=$row['pid'];
                header('Location:dashboard_patinfo_diagnosis.php');
            
            }
            else
            {
                echo '<script>
                    window.location.href="searchpatient_diagnosis.php";
                    alert("Search failed. Invalid Id or Contact")
                </script>';
            } 
        
    }
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="..\public\homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="..\images\MedHost.png">
</head>
<body>
    <header>
        <div class="logosec">
                <a href="dashboard_doctor.php">
                    <img src="..\images\MedHost.png"
                    class="icn menuicn"
                    id="menuicn">
                </a>
                <a href="dashboard_doctor.php" style="text-decoration:none;">
                    <div class="logo">MED-Host</div>
                </a>
                <div class="logout">
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span></a>
                </div>
        </div>
    </header>
    <div class="container">
        <h1>SEARCH PATIENT'S INFO</h1>
        <form action="searchpatient_diagnosis.php" method="POST">
             <div class="row">
                <div class="col-25">
                    <label for="name">Patient Id:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="pid">
                </div>
             </div>
             <div class="row">
                <div class="col-25">
                    <label class="mobile">Contact:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="contact" name="contact">
                </div>
            </div>
   
            <br>
            <div class="row" class="btn">
                <button class="enter-btn" id="enter" name="enter">Search</button>
            </div>
        </form>
        <script>
        function isvalid()
        {
            var name = document.form.name.value;
            var contact = document.form.password.value;

            if(name.length=="" && name.length=="")
            {
                alert("Name and Contact field is empty!");
                return false
            }
            else
            {
                if(name.length=="")
                {
                    alert("Name field is empty!");
                    return false
                }
                if(contact.length=="")
                {
                    alert("Contact field is empty!");
                    return false
                }
            }
        }
    </script>
    </div>
</body>
</html>