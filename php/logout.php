<?php 
    session_start();

    session_unset();
    session_destroy();
    echo"<script>
        window.location.href='loginpage.php';
        alert('You have been logged out.');</script>";
    // header('Location:loginpage.php');
?>
