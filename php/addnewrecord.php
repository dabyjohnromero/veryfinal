<html>
<head>
  <title>ADD NEW RECORD</title>
  <link rel="stylesheet" type="text/css" href="../CSS/addnewrec.css">
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
  <form action="insert_record.php" method="POST">
	<div >
	<strong><h1 id="title">ADD NEW RECORD</h1></strong>
	</div>
	
	<div>
        <label for="service">SERVICE</label>
		
        <select name="service">
  <option value="Oral Prophylaxis">Oral Prophylaxis</option>
  <option value="Consultation">Consultation</option>
  <option value="Deep Scaling">Deep Scaling</option>
  <option value="Permanent Light Cure Filling">Permanent Light Cure Filling</option>
  <option value="Tooth Extraction">Tooth Extraction</option>
  <option value="Mouthguard">Mouthguard</option>
  <option value="Hawleys Retainer">Hawley's Retainer</option>
  <option value="Dentures">Dentures</option>
  <option value="Tooth Whitening">Tooth Whitening</option>
</select>
<br><br>



<div>
        <label for="service">PRICE</label>
		
        <input type = "text" name = "price" />



<div>
<br><br>

<div><br>

        <label for="service">PATIENT NAME</label>
		
<select name="patient_id">

<?php 

require 'connect-db.php';
  
	
	$query = mysql_query("SELECT * FROM patient 
	
	WHERE  flag = 1") or die(mysql_error());
	
	
	while ($row= mysql_fetch_assoc($query)){
		
	?>
	
  <option value= "<?php echo $row['patient_id']; ?>" <?php if(isset($_GET['id']) && $row['patient_id'] == $_GET['id'] ) echo "selected"; ?> ><?php echo $row['patient_name']; ?></option>
  
	<?php } ?>
</select>

</div>

    </div>
	<div>
        <label for="remark">TREATMENT</label>
        <textarea  name="treatment" required cols = 20 rows = 7 style = "resize:none">
		
		</textarea>
    </div>
	
	<div>
		<input type="submit" id="fsSubmitButtoncreate"  name="submit" value="ADD"/>
		 <input type="submit" id="fsSubmitButtoncancel"  onclick="location.href='record_information.html'"  name="cancel"  value="Cancel"/>
    </div>
</form>
<hr id="hr1">
  
</body>
</html>
