<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Front-Desk_reg</title>
    <link rel="stylesheet" href="..\public\doc_registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/png" href="../images/MedHost.png">
</head>
<body>
    <!-- <header>
        <div class="logo">MED-Host</div>
    </header> -->
    <form action="">
        <div class="input-box">
            <h1 class="h1">Front-Desk Information</h1>
            <!-- <form action="/action_page.css"></form> -->
            <div class="row">
                <div class="col-25">
                    <label class="fname">First name:</label>
                        <input type="stext" id="fname" name="fname">
                    <label class="mname">Middle name:</label>
                        <input type="stext" id="mname" name="mname">
                    <label class="lname">Last name:</label>
                        <input type="stext" id="lname" name="lname">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="reg_id">REG ID  : </label>
                        <input type="inti" id="nmc_id" name="nmc_id" >
                </div>
            </div>
           
            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" type="sty">
                        <option>---</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select> 
                    <label class="age">Age:</label>
                                    <input type="integer" id="age" name="age" >
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label class="contact_no">Contact: </label>
                    <input type="ini" id="contact_no" name="contact_no">
                    <label class="email">Email: </label>
                    <input type="text" id="email" name="email" >
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

