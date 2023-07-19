<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="..\public\doctordashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Dashboard Panel</title>
    <title>Doctor Dashboard Panel</title>
</head>
<body>
<section class="dashboard">
        <div class="top">
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
</div>
            <img src="images/profile.jpg" alt="">
        </div>
        <div class="dash-content">
        <div class="overview">
                <div class="boxes">
                    <div class="box box1">
                    <i class="fa-sharp fa-solid fa-stethoscope"></i>
                        <span class="text">Doctor</span>
                    </div>
                    <div class="box box2">
                    <i class="fa-brands fa-hire-a-helper"></i>
                        <span class="text">Front-Desk</span>
                    </div>
                    <div class="box box3">
                    <i class="fa-solid fa-staff-snake"></i>
                        <span class="text">Medical-Staff</span>
                    </div>
                    <div class="box box4">
                    <i class="fa-solid fa-bed-pulse"></i>
                        <span class="text">Patients</span>
                    </div>
</div>
                </div>
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