<?php

$con=new mysqli('localhost','root','','login-info');

if($con){
    echo "Connection successful";
}
else{
    die(mysqli_error($con));
}