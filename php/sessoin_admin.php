<?php
    if(!isset($_SESSION['email']) || ($_SESSION['role']!=0) )
        header('loginpage.php') 
?>