<?php

$con=new mysqli('localhost','root','','medhost');

if($con){
}
else{
    die(mysqli_error($con));
}

?>