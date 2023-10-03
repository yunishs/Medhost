<?php 
   session_start();
   require ("..\database\connect.php");
   // require_once('session_admin.php');
   if(($_SESSION['role']!=0) || (empty($_SESSION['username']))){
      header("Location:loginpage.php"); }
      
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Admin Panel</title>
      <link rel="stylesheet" href="..\public\dashboard_admin.css">
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
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

      <!-- <div class="btn">
         <span class="fas fa-bars"></span>
      </div> -->
      <nav class="sidebar">
         <div class="text">
            Admin Panel
         </div>
         <ul>
            <li class="active"><a href="#" onclick="document.getElementById('if1').src = 'homepagedashboard.php'">Dashboard</a></li>
            <li>
               <a href="#" class="feat-btn">Doctor
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
                    <li><a href="#" onclick="document.getElementById('if1').src = 'doc_registration.php'">Register</a></li>
                    <li><a href="#" onclick="document.getElementById('if1').src = 'doctorview_admin.php'">View</a></li>
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn1">Front Desk
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show1">
                    <li><a href="#" onclick="document.getElementById('if1').src = 'frontdesk_reg.php'">Register</a></li>
                    <li><a href="#" onclick="document.getElementById('if1').src = 'frontdesk_view.php'">View</a></li>
               </ul>
            </li>
            <li><a href="#" onclick="document.getElementById('if1').src = 'pat_view_admin.php'">Patient</a></li>
            <li>
               <a href="#" class="serv-btn2">Medical Staff
               <span class="fas fa-caret-down third"></span>
               </a>
               <ul class="serv-show2">
                    <li><a href="#" onclick="document.getElementById('if1').src = 'medicalstaff_reg.php'">Register</a></li>
                    <li><a href="#" onclick="document.getElementById('if1').src = 'medicalstaff_view.php'">View</a></li>
               </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
            <!-- #" onclick="document.getElementById('if1').src =' -->
         </ul>
      </nav>

        <div class="main">
		    <iframe id="if1" name="iframe_a" style="height:100%; width:100%; border: none;" src="homepagedashboard.php"></iframe>
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