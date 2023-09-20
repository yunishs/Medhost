<?php

include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE FROM frontdesk_info WHERE fid=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:frontdesk_view.php');
    }
    else{
        die(mysqli_error($con));
    }
}
?>