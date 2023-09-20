<?php
    // $servername= 'localhost';
    // $username= 'root';
    // $password= '';

    // //Connecting to database
    // try{
    //     $conn = new PDO("mysql:host=$servername;dbname=login-info", $username, $password);
    //     //set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo 'Connection Successfully.';
    // }catch(\Exception $e){
    //     $error_message=$e->getMessage();
    // }
    $con = mysqli_connect('localhost','root','','medhost');
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    ?>
?>