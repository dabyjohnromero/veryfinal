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
	
	
	


<?php
error_reporting(0);
session_start();


	require 'connect-db.php';
if(isset($_POST['username']) && isset($_POST['password']))
{
	
	
$username = $_POST['username'];
$password = $_POST['password'];

	$query = mysql_query("SELECT * FROM employee WHERE username='$username' ") or die(mysql_error());
	
	$row = mysql_fetch_assoc($query);
				
	
	
	
	
	
	if(mysql_num_rows($query) >= 1)
		{
				
					$dbusername = $row['username'];
					$dbpassword= $row['password'];
				
			if($username == $dbusername&&$password==$dbpassword)	
			{
				
				
				
				$_SESSION['username']=$username;
				
				echo "<script>alert('You are now logged in')</script>";
				echo "<script>alert('WELCOME')</script>";
			
				
			}
			else
				die( "Your Password is Incorrect!");
		}
		else
			
			die("That user doesn't exist!");
	}
	else if(!isset($_SESSION['username']))
		die("Please enter a username and a password!");
		
?>
<html>
<head>
  <title>HOME</title>
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

  <div id = "container">
  <br><br>
  
  
  
  
  <?php

mysql_connect("localhost","root","");
mysql_select_db("new_aug_salon_db");



// Create connection
	





$sql = "SELECT *
	FROM patient WHERE flag = 1
";


$result = mysql_query($sql);



if (mysql_num_rows($result) >0){
    // display data

	
	echo "<table  border='6	 solid' id = 'example' cellpadding='10' cellspacing='5' style ='width: 500px;' >";

	echo "<thead>
		<th>Name</font></th> 
		  <th>Gender</font></th> 
	      <th>Contact Number</font></th>
		  <th>View Information</font></th>
		  
		  </thead>
		  
		  ";
		  
	while($row = mysql_fetch_assoc($result)) {
	
		// echo out the contents of each row into a table
		
		echo "<tr>";
		echo '<td> ' . $row['patient_name'].'</td>';
		echo '<td> ' . $row['patient_gender'] .'</td>';
		echo '<td> ' . $row['patient_contact_num'].'</td>';
		echo "<td><a href='patient_information.php?id=".$row["patient_id"]."'><img src='../Images/view1.png'></a></td>";"

		</tr>"; 
		 
		
		}
		
	echo "</table>";
	
} else {
	
	echo "<div style='padding-top:10'>";
    echo '<font size=20> 0 result';
	echo "<center>";
	echo "<div style='padding-top:50'>";
	echo "<div style='padding-left:450'>";
	echo '<font color="white" size=20>(NO INFORMATION<BR><br> FOR THAT PERSON!)';
	}




?>
  
  
  </table>
  
  </div>
<hr id="hr1">
</body>
</html>



