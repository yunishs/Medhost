
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>admin</title>
	<link rel="stylesheet"  href="..\public\admin_test.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>

<body>
	<!-- for header part -->
	<header>

		<div class="logosec">
			<img src="..\images\MedHost.png"
				class="icn menuicn"
				id="menuicn">
				<div class="logo">MedHost</div>
		</div>
	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1" onclick="document.getElementById('if1').src = 'doc_registration.php'">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="doctor">
						<h3>Doctor</h3>
					</div>

					<div class="option2 nav-option" onclick="document.getElementById('if1').src = 'frontdesk.php'">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
							class="nav-img"
							alt="frontdesk">
						<h3> Front-Desk</h3>
					</div>

					<div class="nav-option option3" onclick="document.getElementById('if1').src = 'pat_view.php'">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="patient">
						<h3> Patient</h3>
					</div>

					<div class="nav-option option4" onclick="document.getElementById('if1').src = 'medicalstaff_reg.php'">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="medicalstaff">
						<h3> Medical Staff</h3>
					</div>

					<div class="nav-option logout" onclick="document.location='loginpage.php'">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div>

				</div>
			</nav>
		</div>
		<div class="main">
			<iframe id="if1" name="iframe_a" style="height:100%; width:100%; border: none;" ></iframe>
			<!-- In this iframe if we give a src="link of the page to be displayed here" then the page 
				 will be displayed and if not, only the frame for iframe will be made kei display chai hudaina -->


			<!-- <iframe
    			src="https://www.google.co.np/"
    			name="targetframe"
    			allowTransparency="true"
    			scrolling="no"
    			frameborder="0">
			</iframe>		 -->
			<!-- <div class="report-container"> -->
				<!-- <div class="report-header">
					<h1 class="recent-Articles">Recent Record</h1>
				</div>

			</div>-->
		</div>
	</div>
	<!--<script src="./index.js"></script>-->
</body>
</html>
