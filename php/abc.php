<?php
    include ("..\database\connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dynamic Dependent Select Box</title>
  <link rel="stylesheet" href="abc.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
		</div>
		<div id="content">
			<form method="">
                <label>Ward</label>
                        <select id="ward">
                            <option value="">Select Ward</option>
                        </select>
            <br><br>
                    <label>Room</label>
                        <select id="room">
                            <option value=""></option>
                        </select>
      </form>
		</div>
	</div>

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "load-cs.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "roomData"){
  					$("#room").html(data);
  				}else{
  					$("#ward").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#ward").on("change",function(){
  		var ward = $("#ward").val();

  		if(ward != ""){
  			loadData("roomData", ward);
  		}else{
  			$("#room").html("");
  		}

  		
  	})
  });
</script>
</body>
</html>
