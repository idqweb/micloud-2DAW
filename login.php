<?php
	session_start();

				$existe = false;
				$nombre=$_POST['user'];
				$password = md5($_POST['pass']);

				
				#leer el archivo usuarios.dat pero en este caso lo meto el registro en un array
			if(file_exists("usuarios.dat")){
				$f1=fopen("usuarios.dat","r");
					while(!feof($f1)){
						$linea = fgetss($f1,1024);
						$nombredelaDB = explode(";",$linea);
						if ($nombre == $nombredelaDB[0] && $password == $nombredelaDB[1]){
							$existe = true;
							$_SESSION['logeado']=true;
							break;
						}
					}
				fclose($f1);
			}
			
			
			if ($existe==true){
				$_SESSION['usuario'] = $_POST['user'];
				header("Location: panelUser.php");
			}
			
			
			if(!isset($_POST['user']) || $_POST['user'] == "" ){
				header("Location:index.php");
			}
			else{
				if ($existe==false)
					header("Location:index.php");
			}



			
		?>