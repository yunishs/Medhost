<?php 
    $fname='';
    
    include '..\database\connect.php';

    session_start();
    if(($_SESSION['role']!=3) || (empty($_SESSION['username'])))
    {
        header("Location:loginpage.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="..\public\dashboard_user.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Frontdesk Dashboard</title>
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
    <header>
        <div class="logosec">
            <img src="..\images\MedHost.png"
            class="icn menuicn"
            id="menuicn">
            <div class="logo">MED-Host</div>
            <div class="logout">
                <a href="logout.php""><i class="fa-solid fa-right-from-bracket"></i></a>
                <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span></a>
            </div>
        </div>
    </header><br>
    <section class="dashboard">
    <div class="float">
        <div class="float1">
            <div class="DAT2">
                <h1>Hello, <?php $fname=$_SESSION['fname']; echo"$fname"; ?></h1>
                <h2 id="time"></h2>
                <h3 id="day"></h3>
                <h3 id="date"></h3>
            </div>
        </div>
        <div class="float1">
            <div class="dash-content">
                <div class="overview">
                    <div class="boxes">
                        <a href="searchpatient_frontdesk.php" class="link">
                            <div class="box box1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <span class="text">Search Patient</span>
                            </div>
                        </a>
                        <a href="pat_view_frontdesk.php" class="link">
                            <div class="box box2">
                                <i class="fa-solid fa-eye"></i>
                                <span class="text">View Information</span>
                            </div>
                        </a>
                        <a href="pat_registration_frontdesk.php" class="link">
                            <div class="box box3">
                                <i class="fa-solid fa-circle-plus"></i>
                                <span class="text">Create Patient's Profile</span>
                            </div>
                        </a>    
                        <!-- <div class="box box4">
                            <i class="fa-solid fa-bed-pulse"></i>
                            <span class="text">Update </span>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</section>
<!-- <script src="script.js"> -->
<script>
    // Function to update the time, day, and date
    function updateTime() {
      const now = new Date();

      // Get the current time (hours, minutes, and seconds)
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      const timeString = `${hours}:${minutes}:${seconds}`;

      // Get the current day (Sunday, Monday, etc.)
      const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const dayString = days[now.getDay()];

      // Get the current date (day, month, and year)
      const date = now.getDate().toString().padStart(2, '0');
      const month = (now.getMonth() + 1).toString().padStart(2, '0');
      const year = now.getFullYear();
      const dateString = `${date}/${month}/${year}`;

      // Update the HTML content
      document.getElementById('time').textContent = `${timeString}`;
      document.getElementById('day').textContent = `${dayString}`;
      document.getElementById('date').textContent = `${dateString}`;
    }

    // Update the time every second
    setInterval(updateTime, 1000);

    // Initial update when the page loads
    updateTime();
  </script>
</body>
</html>
