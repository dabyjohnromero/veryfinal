<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="../CSS/security.css">
</head>
<body>
<div class="container">
<img src="../Images/logo5.png" />
</div>
<hr>
<div class="form">
      
	<h1><strong>LOGIN</strong></h1>
	<form action="index.php" method="post">
	<div class="field-wrap">
		<label>
			Username<span class="req">*</span>
		</label>
			<input type="text" name="username" required autocomplete="off"/>	
	</div>
		
	
		
	<div class="field-wrap">
		<label>
			Password<span class="req">*</span>
		</label>
			<input type="password" name="password" required autocomplete="off"/>	
	</div>
		
    <input type="submit" value="SUBMIT" name="login" class="button button-block"/>
	<hr>
	<input type="submit" onclick="location.href='login.php'" value="CANCEL" class="button button-block1"/>
	</form>
	
</div>
<hr id="hr1"/>
</body>

</html>
