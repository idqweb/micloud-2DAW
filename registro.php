<!DOCTYPE html>
<html>
<head>
	<title>REGISTRATE</title>
	<meta charset="UTF-8">
			
</head>
	<body>
		<h2>Registro</h2>
		<?php
			session_start();
			
			
		?>
			
	<form method="post" action="creaUser.php">
		<label>Usuario : </label><input type="text" name="user" />
		<br/>
		<label>Password : </label><input type="password" name="pass"/>
		<br/>
		<label>Re-Password : </label><input type="password" name="repass"/>
		<br/>
		<input type="submit" value="Alta Nueva" />
	</form>
	<br/>
	
	</body>
</html>