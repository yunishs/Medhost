<?php
    session_start();

    include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM medication WHERE med_id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:view_medication.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>