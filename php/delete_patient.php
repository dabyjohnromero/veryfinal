<?php

require 'connect-db.php';


// Create connection
// Check connection

$id = $_GET['id'];


$query = "UPDATE  patient SET flag = 0 WHERE patient_id='$id' ";
	
	if(mysql_query($query)){
	echo "<script>alert('Success')</script>";
	
	header('Location: index.php');

	}

?>