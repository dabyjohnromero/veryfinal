<html>
<head>


<title>Patient Info</title>
<script>
	function changeLinkOnChange() {
			
			var id = getQueryString('id');
			
			var x = document.getElementById("services").value;
			document.getElementById("add_services_link").href = "Add_Patient_Services.php?id="+id+"&sid="+x;
		}
		
		var getQueryString = function ( field, url ) {
		var href = url ? url : window.location.href;
		var reg = new RegExp( '[?&]' + field + '=([^&#]*)', 'i' );
		var string = reg.exec(href);
		return string ? string[1] : null;
	};
</script>

</head>
<body>
	<div class="container">
		<img src="../Images/logo5.png" />
	</div>
<hr>
<nav class="side-nav">
    <a href="index.php" class="side-nav-button active">Home</a>
	 <a href="add.php" class="side-nav-button">Add Patient</a>	
    <a href="logoff.php" class="side-nav-button" >Logout</a>
  </nav>
<script type="text/javascript">
    function delete_confirmation(e) {
    var answer = confirm("Are you sure you want to delete this record?")
    if (answer){
				alert("This record has been deleted!")
				
			}
			else{
				e.preventDefault();
				return false;
			}
		}
</script>
<?php

mysql_connect("localhost","root","");
mysql_select_db("new_aug_salon_db");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_aug_salon_db";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['id']))
	$searchId = $_GET['id']; 
else
	header("Location: Search_patient_list.php");

$sql = "SELECT * from patient where patient_id= '$searchId'";
	
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
	while($row = $result->fetch_assoc()) {
		?>
<form>
	<div>
		<label for="Name">Name: </label>
			<?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_name"]."<br/>"; ?>
	</div>
	
	<div>
		<label for="gender">Gender: </label>
			<?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_gender"]."<br/>"; ?>
	</div>
    <div>
        <label for="contact">Contact No: </label>
			<?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_contact_num"]."<br/>"; ?>
    </div>
	<div>
        <label for="address">Address:</label>
			<?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_addr"]."<br/>"; ?>
    </div>
	<div>
        <label for="occupation">Occupation: </label>
			<?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_occupation"]."<br/>"; ?>
    </div>
	<div>
		<label>Status:</label>
		    <?php echo "<font color='#003366' font size='4px' font-weight='bold'>".$row["patient_status"]."<br/>"; ?>
			
	</div>
	<div>
</form>
<?php
		}
} else {
    echo "0 results";
}

$conn->close();
?>
<br><br><br>
<a id="fsSubmitButtonrecord"href='addnewrecord.php?id=<?php echo $_GET['id']; ?>'>ADD RECORD</a>
<a id="fsSubmitButtonupdate" href='updaccount.php?id=<?php echo $_GET['id'] ?>'>UPDATE</a>
<a id="fsSubmitButtondelete" onclick="delete_confirmation(event)"  href='delete_patient.php?id=<?php echo $_GET['id'] ?>'>DELETE</a>
<br><br><br>
</body>
</html>
<?php

	mysql_connect("localhost","root","");
	
	mysql_select_db("new_aug_salon_db");
	
	
	$searchId= $_GET['id'];

	$sql = "SELECT * from service where patient_id ='$searchId' AND flag = 1";
	
	$result = mysql_query($sql);

	
	?>
	
	

<script type="text/javascript" language="javascript"  src="../DataTables/media/js/jquery.js">
	</script>
	<script type="text/javascript" language="javascript" src="../DataTables/media/js/jquery.dataTables.js">
	</script>
	
		<link rel="stylesheet" type="text/css" href="../DataTables/media/css/jquery.dataTables.css">

	<script type="text/javascript" language="javascript" class="init">
	

$(document).ready(function() {
	$('#example').DataTable();
} );


	</script>
	
	
	

<table id = "example" style = "width:500px;">

		<thead>
		<tr>
		  <th scope="col" >DATE</th>
		  <th scope="col">NAME</th>
		   <th scope="col">TREATMENT</th>
		   <th scope="col">PRICE</th>

			 <th scope="col">ACTION</th>
		 </tr>
	</thead>
	
	
  <tbody>
<?php

	if(mysql_num_rows($result) >= 1){
   
		
		while($row = mysql_fetch_assoc($result)){

	?>
	
  
    <tr>
     
	 <td><?php echo $row['date']; ?></td>
	 <td><?php echo $row['service_name']; ?></td>
	 <td><?php echo $row['treatment']; ?></td>
	 <td><?php echo $row['service_price']; ?></td>
	 <td><a href= "<?php echo 'deleteservice.php?id='.$row['service_id'].'&patient_id='.$searchId; ?>">Delete</a>
	 </tr>
	
		
		
			<?php
		}
		
		?>
		</tbody>
		</table>
		<?php
} else {
    echo " ";
}

?>

