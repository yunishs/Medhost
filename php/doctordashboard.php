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
                        <span class="text">view infromation</span>
                    </div>
                    <div class="box box2">
                    <i class="fa-brands fa-hire-a-helper"></i>
                        <span class="text">update prognosis</span>
                    </div>
                    <div class="box box3">
                    <i class="fa-solid fa-staff-snake"></i>
                        <span class="text">Prescribe Medication</span>
                    </div>
                    <div class="box box4">
                    <i class="fa-solid fa-bed-pulse"></i>
                        <span class="text">Update </span>
                    </div>
</div>
</section>
</div>
            </div>
<div class="DAT">
    <h2 id="time"></h2>
    <h3 id="day"></h3>
    <h3 id="date"></h3>
  </div>
               
    <script src="script.js">
// Function to update the time, day, and date
function updateTime() {
      const now = new Date();
      // Get the current time (hours, minutes, and seconds)
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');
      const timeString = ${hours}:${minutes}:${seconds};
      // Get the current day (Sunday, Monday, etc.)
      const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
      const dayString = days[now.getDay()];
      // Get the current date (day, month, and year)
      const date = now.getDate().toString().padStart(2, '0');
      const month = (now.getMonth() + 1).toString().padStart(2, '0');
      const year = now.getFullYear();
      const dateString = ${date}/${month}/${year};
      // Update the HTML content
      document.getElementById('time').textContent = Current Time: ${timeString};
      document.getElementById('day').textContent = Current Day: ${dayString};
      document.getElementById('date').textContent = Current Date: ${dateString};
    }
    // Update the time every second
    setInterval(updateTime, 1000);
    // Initial update when the page loads
    updateTime();
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
