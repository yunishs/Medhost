<?php
session_start();
    include ("..\database\connect.php");
    $roomid_fk=$_SESSSION['room_idfk'];
    if($_POST['id'])
    {
        $id=$_POST['id'];
        {   
            $sql ="SELECT * FROM room WHERE ward_id_fk ='$id' AND alloc_stat='0'";
            $query = mysqli_query($con,$sql) or die("Query Unsuccessful.");
            while($row = mysqli_fetch_assoc($query))
            {
                echo '<option value="'.$row['room_id'].'">'.$row['room_name'].'</option>';
            }
        }
    }
?>