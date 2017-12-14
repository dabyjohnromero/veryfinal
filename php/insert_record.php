<?php 

require 'connect-db.php';


$service= $_POST['service'];

$treatment= $_POST['treatment'];

$price= $_POST['price'];

$patient_id= $_POST['patient_id'];




session_start();


mysql_query("INSERT INTO 

service(service_name, service_price, treatment,  username, patient_id) 

VALUES(
'$service',
'$price',
'$treatment', 
'$_SESSION[username]', 
'$patient_id') 

") or die(mysql_error());



header("Location: patient_information.php?id=".$patient_id);

?>
