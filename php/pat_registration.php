<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration_page</title>
    <link rel="stylesheet" href="..\public\pat_registration.css">
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
    <form action="">
        <div class="input-box">
            <h3>Personal Information:</h3>
            <form action="/action_page.css"></form>
            <div class="row">
                <div class="col-25" >
                    <label class="fname">First name:</label>
                        <input type="stext" id="fname" name="fname" size="10px">
                    <label class="mname">Middle name:</label>
                        <input type="stext" id="mname" name="mname" size="10px" >
                    <label class="lname">Last name:</label>
                        <input type="stext" id="lname" name="lname" size="10px" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                        <label class="dob">Date of birth:</label>
                            <input type="date" id="dob" name="dob">
                        <label class="age">Age:</label>
                            <input type="sty" id="age" name="age" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="gender">Gender:</label>
                    <select class="exc" name="gender" id="gender"> <!--YO WALA--->
                        <option>---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <label class="nationality">Nationality:</label>
                    <input type="stext" id="nationality" name="nationality" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="bloodgroup">Blood group:</label>
                    <select name="bloodg" id="bloodg" type="sty">
                        <option>---</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="address">Address: </label>
                    <input type="txt" id="address" name="address" >
                    <label class="mobile">Mobile no: </label>
                    <input type="integer" id="mobile" name="mobile">
                </div>
            </div>
    
            <div class="row">
                <div class="col-25">
                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email" >  
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="pat_des">Patient's Description: </label>
                </div>
                <div class="col-35">
                    <input type="text" class="pat_des" id="pat_desc" name="pat_desc" placeholder="Enter the patient's initial condition">
                </div>
            </div>
            <div class="row">
                <button type="button" class="enter-btn">ENTER</button>
            </div>
            
        </div>
    </form>
    <script>
        Window.addEventaListener("scroll",function(){
        var header= document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY>0);
        })
    </script>
</body>
</html>
