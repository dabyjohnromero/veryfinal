<html>
<head>
  <title>UPDATE RECORD</title>
  <link rel="stylesheet" type="text/css" href="../CSS/update.css">
<body>
  <div class="container">
		<img src="../Images/logo6.png" />
	</div>
	<hr>
	
  <nav class="side-nav">
    <a href="Home.html" class="side-nav-button ">Home</a>
    <a href="index.html" class="side-nav-button">Search Patient</a>
    <a href="add.html" class="side-nav-button active">Add Account</a>
    
    <a href="logoff.html" class="side-nav-button" >Logout</a>
  </nav>
  <form action="/my-handling-form-page" method="post">
	<div >
	<strong><h1 id="title">UPDATE PATIENT RECORD</h1></strong>
	</div>
	<div>
			<label for="date">DATE</label>
				<input type="date" name="date"  placeholder="" required />
		</div>
		<div>
			<label for="service">SERVICE</label>
				<select name="service">
					<option value="1">Oral</option>
					<option value="2">Dental</option>
				</select>
		</div>
		<div>
			<label for="remark">REMARKS</label>
				<textarea type="text" id="remark" name="remark" placeholder="" required /></textarea>
		</div>
		<div>
			<label for="amount">AMOUNT PAID</label>
				<input type="text" id="amount" placeholder="" name="amount" required />
			</div>
		

		<input type="submit" id="fsSubmitButtonupdaterecord" name="submit" value="UPDATE RECORD"/>
        <input type="submit" id="fsSubmitButtoncancel"  onclick="location.href='record_information.php'"  name="cancel"  value="Cancel"/>
		
		
    </div>
</form>
<hr id="hr1">
  
</body>
</html>