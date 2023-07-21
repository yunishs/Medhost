
<?php

   // $key=$_GET['key'];
   // $array = array();
   // $con=mysqli_connect("localhost","root","","demos");
    //$query=mysqli_query($con, "select * from cfg_demos where title LIKE '%{$key}%'");
    //while($row=mysqli_fetch_assoc($query))
    //{
     // $array[] = $row['title'];
    //}
   // echo json_encode($array);
   // mysqli_close($con);

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
            <img src="..\images\MedHost.png"
                class="icn menuicn"
                id="menuicn">
                <div class="logo">MED-Host</div>
        </div>
    </header>
    <div class="container">
        <h1>SEARCH PATIENT'S INFO</h1>
        <form action="">
             <div class="row">
                <div class="col-25">
                    <label for="name">Name:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="name" name="name">
                </div>
             </div>
             <div class="row">
                <div class="col-25">
                    <label class="mobile">Mobile no: </label>
                </div>
                <div class="col-75">
                    <input type="number" id="mobile" name="mobile">
                </div>
            </div>
   
            <br>
            <div class="row">
                <button type="button" class="enter-btn">ENTER</button>
            </div>
            <div class="reg-btn">
                <h3 onclick="document.location='pat_registration.php'">Click to register new patient</h3>
            </div>
        </form>
    </div>
</body>
</html>