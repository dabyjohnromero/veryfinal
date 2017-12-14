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

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="../CSS/search.css">
	<title>SEARCH PATIENT</title>

	

	<script type="text/javascript">


	</script>
	

<br/>
	</head>

<body>
<div class="container">
		<img src="../Images/logo6.png" />
   </div>
<hr>
<nav class="side-nav">
    <a href="Search_patient_list.php" class="side-nav-button active">Home</a>
    <a href="add.php" class="side-nav-button">Add Account</a>
	<a href="addnewrecord.php" class="side-nav-button">Add Service</a>
	 <a href="Search_patient_list.php" class="side-nav-button">List of Accounts</a>

    <a href="logoff.php" class="side-nav-button" >Logout</a>
  </nav>
  



	
	
	



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

	
	echo "<table  border='5 solid' id = 'example' cellpadding='10' cellspacing='5' style ='width: 500px;' >";

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
	echo "<Center>";
	echo "<div style='padding-top:90'>";
    echo '<font color="white" size=20> 0 result';
	echo "<center>";
	echo "<div style='padding-top:50'>";
	echo "<div style='padding-left:450'>";
	echo '<font color="white" size=20>(NO INFORMATION<BR><br> FOR THAT PERSON!)';
	}




?>


</body>

</html>
