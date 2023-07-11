<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="Medhost\public\homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="Medhost\images\MedHost.png">
</head>
<body>
    <header>
        <div class="logosec">
            <img src="Medhost\images\MedHost.png"
                class="icn menuicn"
                id="menuicn">
                <div class="logo">MED-Host</div>
        </div>
    </header>
    <div class="container">
        <h1>SEARCH PATIENT'S INFO</h1>
        <form action="">
            <div class="row">
                <div class="col-25" >
                    <label for="fname">First name:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="fname">
                </div>
            </div>
             <div class="row">
                <div class="col-25">
                    <label for="lname">Last name:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lname">
                </div>
             </div>
             <div class="row">
                <div class="col-25">
                    <label for="age">Age:</label>
                </div>
                <div class="col-75">
                    <input type="number" id="age" name="age">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender:</label>
                </div>
                <div class="col-75">
                    <select name="gender" id="gender">
                        <option>---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
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