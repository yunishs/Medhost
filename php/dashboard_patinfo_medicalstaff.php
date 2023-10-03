<?php
   $id='';
   session_start();
   // require_once (realpath(dirname(__FILE__) . '/../php/session_admin.php'));
   // echo( $_SESSION["username"]);
   
   if(isset($_GET['searchid']))
   {
      $abc=$_GET['searchid'];
      $_SESSION['pid']=$abc;
      $id=$_SESSION['pid'];
   }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>User Panel</title>
      <link rel="stylesheet" href="..\public\dashboard_patient.css">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
   </head>
   <body>
    <header>
        <div class="logosec">
            <a href="dashboard_medical.php">
               <img src="..\images\MedHost.png"
               class="icn menuicn"
               id="menuicn"></a>
               <a href="dashboard_medical.php" style="text-decoration:none;"><div class="logo">MED-Host</div></a>
            <div class="logout">
               <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
               <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span><a>
            </div>
        </div>
    </header>
    
      <!-- <div class="btn">
         <span class="fas fa-bars"></span>
      </div> -->
      <nav class="sidebar">
         <div class="text">
            User Panel
         </div>
         <ul>
            <li class="active"><a href="#" onclick="document.getElementById('if1').src = 'individual_patview_medical.php'">User Info</a></li>
            <li><a href="#" onclick="document.getElementById('if1').src = 'view_diagnosis_medical.php'">Diagnosis</a></li>
            <li>
               <a href="#" class="serv-btn1">Prognosis
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show1">
                  <li><a href="#" onclick="document.getElementById('if1').src = 'view_prognosis_medical.php'">View</a></li>
                  <li><a href="#" onclick="document.getElementById('if1').src = 'prognosis_form.php'">Add</a></li>  
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn1">Medication
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show1">
                  <li><a href="#" onclick="document.getElementById('if1').src = 'view_medication_medical.php'">View</a></li>
                  <li><a href="#" onclick="document.getElementById('if1').src = 'medication_form_medical.php'">Add</a></li>  
               </ul>
            </li>
            <li><a href="../dompdf/pdfpreview.php" target="_blank">Print Info</a></li>

            
            <!-- <li><a href="#" onclick="document.getElementById('if1').src = 'pat_view.php'">Patient</a></li>
            <li>
               <a href="#" class="serv-btn2">Medical Staff
               <span class="fas fa-caret-down third"></span>
               </a>
               <ul class="serv-show2">
                    <li><a href="#" onclick="document.getElementById('if1').src = 'medicalstaff_reg.php'">Register</a></li>
                    <li><a href="#" onclick="document.getElementById('if1').src = 'medicalstaff_view.php'">View</a></li>
               </ul>
            </li> -->
            <!-- <li><a href="#" onclick="document.getElementById('if1').src = 'individual_pat_view.php'">Logout</a></li> -->
         </ul>
      </nav>

        <div class="main">
		    <iframe id="if1" name="iframe_a" style="height:100%; width:100%; border: none;" src="individual_patview_medical.php"></iframe>
        </div>

      <script>
        //  $('.btn').click(function(){
        //    $(this).toggleClass("click");
        //    $('.sidebar').toggleClass("show");
        //  });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn1').click(function(){
             $('nav ul .serv-show1').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('.serv-btn2').click(function(){
             $('nav ul .serv-show2').toggleClass("show2");
             $('nav ul .third').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>
   </body>
</html>