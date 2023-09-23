<?php

include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM patient_info WHERE pid=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:pat_view_medicalstaff.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>