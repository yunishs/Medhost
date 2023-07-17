<?php

$con=new mysqli('localhost','root','','login-info');

if($con){
}
else{
    die(mysqli_error($con));
}