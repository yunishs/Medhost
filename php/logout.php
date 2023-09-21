<?php 
    session_start();

    session_unset();
    session_destroy();
    echo"<script>alert('You have been logged out.');</script>";
    header('Location:login.php');
    // if(isset($_POST['logoutButtonName'])) {
    //     session_destroy();
    //     header('location:loginpage.php');
    // }

    // if(isset($_GET['logout'])) {
    //     session_destroy();
    //     header('location:loginpage.php');
    // }
?>
