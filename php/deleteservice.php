	<?php

	require 'connect-db.php';


	// Create connection
	// Check connection

	$id = $_GET['id'];
	$serch_id= $_GET['patient_id'];

	$query = "UPDATE  service SET flag = 0 WHERE service_id='$id' ";
		
		if(mysql_query($query)){	
		echo "<script>alert('Success')</script>";
		
		header('Location: patient_information.php?id='.$serch_id);

		}

	?>