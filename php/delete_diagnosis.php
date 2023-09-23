<?php
    session_start();

    include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM pat_diagnosis WHERE diag_id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:view_diagnosis.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>