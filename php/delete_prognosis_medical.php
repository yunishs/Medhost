<?php
    session_start();

    include '..\database\connect.php';


    if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM pat_prognosis WHERE prog_id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:view_prognosis_medical.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>