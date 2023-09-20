<?php

include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM doctor_info WHERE did=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:doctorview_admin.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>