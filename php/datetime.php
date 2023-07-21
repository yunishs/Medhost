<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Current Date and Time</title>
</head>
<body>
  <div>
    <h2 id="time"></h2>
    <h3 id="day"></h3>
    <h3 id="date"></h3>
  </div>
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
      document.getElementById('time').textContent = `Current Time: ${timeString}`;
      document.getElementById('day').textContent = `Current Day: ${dayString}`;
      document.getElementById('date').textContent = `Current Date: ${dateString}`;
    }

    // Update the time every second
    setInterval(updateTime, 1000);

    // Initial update when the page loads
    updateTime();
  </script>
</body>
</html>