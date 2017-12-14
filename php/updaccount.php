<?php
/* 
 EDIT.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id,$firstname,$lastname,$middle, $gender, $address, $contact, $occupation, $status, $error)
 {
 ?>
<html>
<head>
  <title>UPDATE ACCOUNT</title>
  <link rel="stylesheet" type="text/css" href="../CSS/updaccount.css">
<body>
  <div class="container">
		<img src="../Images/logo5.png" />
	</div>
	<hr>
  <nav class="side-nav">
    <a href="index.php" class="side-nav-button ">Home</a>
    <a href="add.php" class="side-nav-button active">Add Account</a>
    
    <a href="logoff.html" class="side-nav-button" >Logout</a>
  </nav>

 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
	<p><h1><strong>ID:</strong><?php echo $id; ?></p></h1>
<div>
        <label for="First Name">Name:</label>
			<input type="text" name="name" value="<?php echo $firstname; ?>"  placeholder="" required  />
</div>
	
	<div>
		<label for="gender">Gender:</label>
			<select name="patient_gender" value="<?php echo $gender; ?>">
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>
	</div>
    <div>
			<label for="contact">Contact No:</label>
				<input type="textbox" name="patient_contact_num" placeholder="" required  value="<?php echo $contact; ?>"/>
    </div>
	<div>
			<label for="address">Home Address:</label>
				<input type="text" name="patient_address" placeholder="" required  value="<?php echo $address; ?>"/>
    </div>
	<div>
			<label for="occupation">Occupation:</label>
				<input type="text" name="patient_occupation" placeholder="" required  value="<?php echo $occupation;?>"/>
    </div>
	<div>
			<label for="Status">Status:</label>
				<select name="patient_status" value="<?php echo $status;?>" >
					<option value="Single">Single</option>
					<option value="Married">Married</option>
				</select>
	</div>
	<div>
				<input type="submit" id="fsSubmitButtoncreate" name="submit" value="Update Account"/>
				<input type="reset"  onclick="history.back();"  id="fsSubmitButtoncancel" name="cancel" value="Cancel"/>
    </div>
</form>
<hr id="hr1">
</body>
</html>

  
</body>
</html>
<?php
 
 }


 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (isset($_POST['id']))
 {
 // get form data, making sure it is valid
 $patient_id = $_POST['id'];
 
 $patient_name = mysql_real_escape_string(htmlspecialchars($_POST['name']));


 $patient_gender = mysql_real_escape_string(htmlspecialchars($_POST['patient_gender']));
 $patient_address = mysql_real_escape_string(htmlspecialchars($_POST['patient_address']));
 $patient_contact_no = mysql_real_escape_string(htmlspecialchars($_POST['patient_contact_num']));
 $patient_occupation = mysql_real_escape_string(htmlspecialchars($_POST['patient_occupation']));
  $patient_status = mysql_real_escape_string(htmlspecialchars($_POST['patient_status']));
  
 // check that firstname/lastname fields are both filled in
 
 // save the data to the database
  mysql_query("UPDATE patient SET patient_name='$patient_name', patient_gender='$patient_gender',patient_contact_num='$patient_contact_no', patient_addr='$patient_address', 
 patient_occupation='$patient_occupation', patient_status='$patient_status' WHERE patient_id='$patient_id'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: patient_information.php?id=$patient_id"); 
 
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']))
 {
 // query db
 
 require 'connect-db.php';
 
 
 $patient_id = $_GET['id'];
 
 $result = mysql_query("SELECT * FROM patient WHERE patient_id = '$patient_id'")
 
 or die(mysql_error()); 
 
 $row = mysql_fetch_assoc($result);
 
// print_r($row);
 
 if(mysql_num_rows($result))
 {
 
 
 $patient_fname = $row['patient_name'];
 
$patient_lname = 0;
 $patient_mid = 0;
 $patient_gender = $row['patient_gender'];
 $patient_address = $row['patient_addr'];
 $patient_contact_no = $row['patient_contact_num'];
 $patient_occupation= $row['patient_occupation'];
 $patient_status= $row['patient_status'];
 
 
 renderForm($patient_id, $patient_fname, $patient_lname, $patient_mid,$patient_gender, $patient_address, $patient_contact_no,$patient_occupation, $patient_status,'');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
