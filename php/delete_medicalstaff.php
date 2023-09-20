<?php

include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM medicalstaff_info WHERE mid=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:medicalstaff_view.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>