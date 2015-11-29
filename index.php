<!DOCTYPE html>
<html>
<head>
	<title>LOGEATE</title>
	<meta charset="UTF-8">
			
</head>
	<body>
		<h2>Login</h2>
		<?php
			session_start();
			
		?>
		
	<form method="post" action="login.php">
		<label>Usuario : </label><input type="text" name="user" />
		<br/>
		<label>Password : </label><input type="password" name="pass"/>
		<br/>
		<input type="submit" value="Entrar" />
	</form>
	<br/>
		<a href="registro.php">Nuevo Usuario</a>	
		
			
		
		
	</body>
</html>