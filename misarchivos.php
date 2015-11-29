<!DOCTYPE html>
<html>
<head>
	<title>Mis Archivos Subidos</title>
	<meta charset="UTF-8">
			
</head>
	<body>
		
		<?php
			session_start();
			// Comprobar que si estas aqui es es por Logearte OK
			if (!isset($_SESSION['usuario']) || $_SESSION['logeado'] !=true){ 
				header("Location: index.php");
			}
		?>
	
		<h2>Los Archivos Subidos de <?php echo $_SESSION['usuario']; ?></h2>
		
		<?php

			$usuario = $_SESSION['usuario'];
			$todoslosarchivos= glob("uploads/$usuario/*.*");

			if (isset($todoslosarchivos)){
					echo "<table border='2'>";
					echo "<tr><th>Fichero</th><th>Tamaño (Kb)</th><th>Fecha</th><th>Descargar</th></tr>";
				foreach (($todoslosarchivos) as $misarchivos){
					$nombredelarchivo = basename($misarchivos);
					#calculo el tamaño, paso a kb y redondeo a 2 decimales
					$tamano=round(filesize("$misarchivos")/1024,2);
					$ultimafecha= date("Y-m-d H:i:s", filemtime($misarchivos));
					
					
					
					echo "<tr>";
					echo "<td>$nombredelarchivo</td>";
					echo "<td>$tamano</td>";
					echo "<td>$ultimafecha</td>";
					echo "<td><a href='$misarchivos'><img src='./images/folder.png'/></a></td>";
					echo "</tr>";
				}
					echo "</table>";
			}
		?>
		
		
		<a href="panelUser.php">Volver al Panel de control</a><br/><br/>
		<a href="logout.php">Cerrar Sesion</a>
		
		
		
		
		
	</body>
</html>