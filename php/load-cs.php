<?php

    include ("..\database\connect.php");

	if($_POST['type'] == ""){
		$sql = "SELECT * FROM ward";

		$query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['ward_id']}'>{$row['ward_name']}</option>";
		}
	}else if($_POST['type'] == "roomData"){

		$sql = "SELECT * FROM room WHERE ward_id_fk = {$_POST['id']} AND alloc_stat='0'";

		$query = mysqli_query($con,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['room_id']}'>{$row['room_name']}</option>";
		}
	}

	echo $str;

 ?>
