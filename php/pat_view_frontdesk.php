<?php
	session_start();
	$_SESSION['searchid']=null;
	$_SESSION['pid']=null;

	include '..\database\connect.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"content="IE=edge">
	<meta name="viewport"	content="width=device-width, initial-scale=1.0">
	<title>Patient view</title>
	<link rel="stylesheet"  href="..\public\pat_view.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="..\images\MedHost.png">
</head>
<body>
	<header>
        <div class="logosec">
            <a href="dashboard_frontdesk.php">
               <img src="..\images\MedHost.png"
               class="icn menuicn"
               id="menuicn"></a>
               <a href="dashboard_frontdesk.php" style="text-decoration:none;"><div class="logo">MedHost</div></a>
            <div class="logout">
               <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
               <a href="logout.php" style="text-decoration:none;"><span class="log">Logout</span><a>
            </div>
        </div>
    </header>
	<br>
	<<form  action="pat_view_frontdesk.php" method="POST">
        <div class="top">
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here..." name="search" id="search">
				<!-- <button>enter</button> -->
            </div>
        </div>
    </form>
	<br>
	<table class="tbl">
		<div class="table">
			<thread>
			<tr>
				<th>S.N.</th>
				<th>Fname</th>
				<th>Mname</th>
				<th>Lname</th>
				<th>Contact</th>
                <th>Bloodgroup</th>
				<th>Address</th>
				<th>Email</th>
				<th>Operation</th>
			</tr>
		</thread>
		<tbody>
			<?php
			$up_id=$dl_id='';
			function fn_val($up_id,$dl_id){
				$_SESSION['update_id']=$up_id;
				$_SESSION['delete_id']=$dl_id;
			}
			if(isset($_POST['search']))
			{
				$search=$_POST['search'];
				$sql1="SELECT * FROM patient_info WHERE concat(fname,' ',mname,' ',lname) LIKE '%". $search ."%' OR concat(fname,' ',lname) LIKE'%. $search .%'";
				$result1=mysqli_query($con,$sql1);
				$count= mysqli_num_rows($result1);
				if($count>=1)
				{
					if($result1)
					{
						while($row1=mysqli_fetch_assoc($result1)){
							$id=$row1['pid'];
							$fname=$row1['fname'];
							$mname=$row1['mname'];
							$lname=$row1['lname'];
							$contact=$row1['contact'];
							$bloodgroup=$row1['bloodgroup'];
							$address=$row1['address'];
							$email=$row1['email'];
							echo " <tr>
							<th>$id</th>
							<td>$fname</td>
							<td>$mname</td>
							<td>$lname</td>
							<td>$contact</td>
							<td>$bloodgroup</td>
							<td>$address</td>
							<td>$email</td>
							<td>
								<button class='button1'><a href='dashboard_patinfo_frontdesk.php?searchid=$id' class='link1'>View</a></button>
								<button class='button2'><a href='update_pat_frontdesk.php?updateid=$id' class='link2'>Update</a></button>
								<button class='button3'><a href='delete_patient_frontdesk.php?deleteid=$id' class='link3'>Delete</a></button>
							</td>
							</tr>";
						}
					}
				}
				else{
					echo"<script>
        			window.location.href='pat_view_frontdesk.php';
        			alert('No record found.');</script>";
				}
			}
			if(!isset($_POST['search'])){
				$sql="SELECT * from patient_info";
				$result=mysqli_query($con,$sql);
				if($result)
				{
						while($row=mysqli_fetch_assoc($result)){
						$id=$row['pid'];
						$fname=$row['fname'];
						$mname=$row['mname'];
						$lname=$row['lname'];
						$contact=$row['contact'];
						$bloodgroup=$row['bloodgroup'];
						$address=$row['address'];
						$email=$row['email'];
						echo " <tr>
						<th>$id</th>
						<td>$fname</td>
						<td>$mname</td>
						<td>$lname</td>
						<td>$contact</td>
						<td>$bloodgroup</td>
						<td>$address</td>
						<td>$email</td>
						<td>
							<button class='button1'><a href='dashboard_patinfo_frontdesk.php?searchid=$id' class='link1'>View</a></button>
							<button class='button2'><a href='aaaaaupdate.php?updateid=$id' class='link2'>Update</a></button>
							<button class='button3'><a href='delete_patient_frontdesk.php?deleteid=$id' class='link3'>Delete</a></button>
						</td>
						</tr>";
					}
				}	
			}
			//  ".fn_val($id,$id);"
			//  ".fn_val($id,$id);"
			//call a function and send data there
			// ".$_SESSION["u_id"].=$id."
			?>
			<!-- <script> javascript:JavaScript_Function()
			function js_assign(){
				<?php // $_SESSION['update_id']=$id;
				// $_SESSION['delete_id']=$dl_id; ?>
			}	</script> -->
		</tbody>
		</div>
	</table>
</body>
</html>