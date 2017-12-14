<html>
<head>
  <title>ADD ACCOUNT</title>
	<link rel="stylesheet" type="text/css" href="../CSS/add.css">
</head>

<body>
	<div class="container">
		<img src="../Images/logo5.png" />
	</div>
	<hr>
		<nav class="side-nav">
    <a href="index.php" class="side-nav-button ">Home</a>
	 <a href="add.php" class="side-nav-button active">Add Patient</a>	
    <a href="logoff.php" class="side-nav-button" >Logout</a>
  </nav>

</script>
<form action="add.php"  method="post">
	<div>
        <label for="First Name">Name:</label>
			<input type="text" name="patient_name" placeholder="" required />
    </div>
	
	<div>
		<label for="gender">Gender:</label>
			<select name="patient_gender">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
	</div>
    <div>
			<label for="contact">Contact No:</label>
				<input type="textbox" name="patient_contact_num" placeholder="" required />
    </div>
	<div>
			<label for="address">Home Address:</label>
				<input type="text" name="patient_address" placeholder="" required />
    </div>
	<div>
			<label for="occupation">Occupation:</label>
				<input type="text" name="patient_occupation" placeholder="" required />
    </div>
	<div>
			<label for="Status">Status:</label>
				<select name="patient_status">
					<option value="Single">Single</option>
					<option value="Married">Married</option>
				</select>
	</div>
	<div>
				<input type="submit" id="fsSubmitButtoncreate" name="submit" value="Create Account"/>
				<input type="reset" id="fsSubmitButtonreset" name="reset" value="Reset"/>
    </div>
</form>
<hr id="hr1">
</body>
</html>

<?php
mysql_connect("localhost","root","");
mysql_select_db("new_aug_salon_db");

if (isset($_POST['submit'])){
	$patient_name = $_POST['patient_name'];
	$patient_gender = $_POST['patient_gender'];
	$patient_address = $_POST['patient_address'];
	$patient_contact_num = $_POST['patient_contact_num'];
	$patient_occupation = $_POST['patient_occupation'];
	$patient_status = $_POST['patient_status'];
	
	$query = "insert into patient(patient_name,patient_gender,patient_addr,patient_contact_num,patient_occupation,patient_status)
	values ('$patient_name','$patient_gender','$patient_address',$patient_contact_num,'$patient_occupation','$patient_status')";
	
	if(mysql_query($query)){	
	echo "<script>alert('Success')</script>";
	mysql_connect("localhost","root","");
	mysql_select_db("new_aug_salon_db");

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "new_aug_salon_db";


	$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
} 
	$query = "select * from patient ORDER BY patient_id DESC LIMIT 1 ";
	$result = $conn->query($query);


if ($result->num_rows > 0) {
    // output data of each row
	
		while($row = $result->fetch_assoc()) {
			header('location:patient_information.php?id='.$row['patient_id']);
			}
		}	
	}
}

?>