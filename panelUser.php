<!DOCTYPE html>
<html>
<head>
	<title>Panel de Usuarios</title>
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
		
		<h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
		
		
		
		<h3>Panel de Control de <?php echo $_SESSION['usuario']; ?> </h3>
		<hr/>
		<br/>
		<br/>
		
		<?php
			#Subo fichero
				$usuario= $_SESSION['usuario'];	
				
			$dir_subida="./uploads/$usuario/";
		if(isset($_POST['marca'])){
			$fichero_subido = $dir_subida.basename($_FILES['archivo']['name']); 
			
			if(move_uploaded_file($_FILES['archivo']['tmp_name'],$fichero_subido)){
					#si llega aqui es que se subio bien
					$_SESSION['subido']=1;
					
			}
		}
			
		?>	
		
		
		
		
		
		
		
		
		
		
		
		<?php
			if (isset($_POST['marca']) && $_POST['marca'] == 1){
				if ($_SESSION['subido'] == 1){
					echo "Archivo Subido  <strong>".$_FILES['archivo']['name']."</strong> CORRECTAMENTE"."<br/>";
					$_SESSION['subido']=0;
					
				}
				
			}
			
		?>
		
				
		<form action="panelUser.php" method="post" enctype="multipart/form-data">
			<label>Archivo:</label><br/>
			<input name="archivo" type="file"  />
			<br/>
			<!-- tengo que crear esta marca oculta porque el input type="file" no se comporta bien con isset -->
			<input name="marca" type="hidden" value="1"  />
			<br/>
			<input type="submit" value="Subir" />
		</form>
		<br/>
		
		
			
		
		<a href="misarchivos.php">Ver mi carpeta Personal</a><br/><br/>
		<a href="logout.php">Cerrar Sesion</a>
		
		
		
		
		
	</body>
</html>