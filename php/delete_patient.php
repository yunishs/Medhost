<?php

include '..\database\connect.php';


if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql1="UPDATE room JOIN patient_info ON room.room_id=patient_info.roomid_fk SET room.alloc_stat = '0' WHERE patient_info.pid=$id";
    $result1=mysqli_query($con,$sql1);
    $sql="DELETE FROM patient_info WHERE pid=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        // echo "Deleted successfully";
        header('location:pat_view_doctor.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>