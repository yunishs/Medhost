<?php

    include '..\database\connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="..\public\homepagedashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Admin Dashboard Panel</title>
</head>
<body>
    <section class="dashboard">
        <!-- <div class="top">
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
          <img src="images/profile.jpg" alt="">
        </div> -->
      <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>
                <div class="boxes">
                    <div class="box box1">
                    <i class="fa-sharp fa-solid fa-stethoscope"></i>
                        <span class="text">Doctor</span>
                        <span class="number">
                            <?php
                                $sql="SELECT * FROM doctor_info";
                                $result=mysqli_query($con,$sql);
                                $totalCount=mysqli_num_rows($result);
                                echo $totalCount;
                            ?>
                        </span>
                    </div>
                    <div class="box box2">
                    <i class="fa-brands fa-hire-a-helper"></i>
                        <span class="text">Front-Desk</span>
                        <span class="number"><?php
                                $sql="select * from frontdesk_info";
                                $result=mysqli_query($con,$sql);
                                $totalCount=mysqli_num_rows($result);
                                echo $totalCount;
                            ?>
                        </span>
                    </div>
                    <div class="box box3">
                    <i class="fa-solid fa-staff-snake"></i>
                        <span class="text">Medical-Staff</span>
                        <span class="number">
                            <?php
                                $sql="select * from medicalstaff_info";
                                $result=mysqli_query($con,$sql);
                                $totalCount=mysqli_num_rows($result);
                                echo $totalCount;
                            ?>
                        </span>
                    </div>
                    <div class="box box4">
                    <i class="fa-solid fa-bed-pulse"></i>
                        <span class="text">Patients</span>
                        <span class="number">
                            <?php
                                $sql="select * from patient_info";
                                $result=mysqli_query($con,$sql);
                                $totalCount=mysqli_num_rows($result);
                                echo $totalCount;
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <!-- <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>
                <div class="activity-data">
                    <div class="data names">
                        <span class="data-title">Name</span>
                        <span class="data-list">Prem Shahi</span>
                        <span class="data-list">Deepa Chand</span>
                        <span class="data-list">Manisha Chand</span>
                        <span class="data-list">Pratima Shahi</span>
                        <span class="data-list">Man Shahi</span>
                        <span class="data-list">Ganesh Chand</span>
                        <span class="data-list">Bikash Chand</span>
                    </div>
                    <div class="data email">
                        <span class="data-title">Email</span>
                        <span class="data-list">premshahi@gmail.com</span>
                        <span class="data-list">deepachand@gmail.com</span>
                        <span class="data-list">manishachand@gmail.com</span>
                        <span class="data-list">pratimashhai@gmail.com</span>
                        <span class="data-list">manshahi@gmail.com</span>
                        <span class="data-list">ganeshchand@gmail.com</span>
                        <span class="data-list">bikashchand@gmail.com</span>
                    </div>
                    <div class="data joined">
                        <span class="data-title">Joined</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-12</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-13</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-14</span>
                        <span class="data-list">2022-02-15</span>
                    </div>
                    <div class="data type">
                        <span class="data-title">Type</span>
                        <span class="data-list">Doctor</span>
                        <span class="data-list">sister</span>
                        <span class="data-list">Doctor</span>
                        <span class="data-list">Patient</span>
                        <span class="data-list">FrontDesk</span>
                        <span class="data-list">Patient</span>
                        <span class="data-list">Nurse</span>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">On Duty</span>
                        <span class="data-list">On Duty</span>
                        <span class="data-list">Leave</span>
                        <span class="data-list">Discharged</span>
                        <span class="data-list">On Duty</span>
                        <span class="data-list">Admitted</span>
                        <span class="data-list">Leave</span>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <script src="script.js">

const body = document.querySelector("body"),
      modeToggle = body.querySelector(".mode-toggle");
let getStatus = localStorage.getItem("status");
if(getStatus && getStatus ==="close"){
    sidebar.classList.toggle("close");
}
sidebarToggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
    if(sidebar.classList.contains("close")){
        localStorage.setItem("status", "close");
    }else{
        localStorage.setItem("status", "open");
    }
})
</script>
</body>
</html>