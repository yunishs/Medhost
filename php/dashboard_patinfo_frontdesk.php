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
            <a href="dashboard_frontdesk.php">
               <img src="..\images\MedHost.png"
               class="icn menuicn"
               id="menuicn"></a>
               <a href="dashboard_frontdesk.php" style="text-decoration:none;"><div class="logo">MED-Host</div></a>
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
            <li class="active"><a href="#" onclick="document.getElementById('if1').src = 'individual_patview_frontdesk.php'">User Info</a></li>
            <li><a href="#" onclick="document.getElementById('if1').src = 'update_pat_dashboard_frontdesk.php'">Update</a></li>
            <!-- <li>
               <a href="#" class="feat-btn">Diagnosis
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
                    <li><a href="#" onclick="document.getElementById('if1').src = 'view_diagnosis.php'">View</a></li>
                    <li><a href="#" onclick="document.getElementById('if1').src = 'diagnosis_form.php'">Add</a></li>
               </ul>
            </li>
            <!-- <li><a href="#" onclick="document.getElementById('if1').src = 'individual_pat_view.php'">Logout</a></li> -->
         </ul>
      </nav>

        <div class="main">
		    <iframe id="if1" name="iframe_a" style="height:100%; width:100%; border: none;" src="individual_patview_frontdesk.php"></iframe>
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