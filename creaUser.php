<?php
			#Si todo esta bien te podras registrar y con ello creas tu panel de control

		session_start();


			
			$usuario = $_POST['user'];
			$pass=md5($_POST['pass']);
			#Variable ruta del usuario
			$mipath= "./uploads/$usuario";

			if (file_exists ($mipath)){
				echo "usuario existente";
			}	
			else{
				if(isset ($_POST['user']) && isset ($_POST['pass']) && isset ($_POST['repass'])){
					
					if( $_POST['pass'] == $_POST['repass']){
					
						$_SESSION['usuario'] = $_POST['user'];
						$_SESSION['password'] = md5($_POST['pass']);
						$fecha=date("Y-m-d H:i:s"); 

						mkdir($mipath);
						//tengo que meterlo porque uso en casa lammp
						chmod($mipath,0777);
						$f1=fopen("usuarios.dat","a+");
						$registro="$usuario;$pass;$fecha;";
						fwrite($f1,"$registro\r\n");
						fclose($f1);
						
						$_SESSION['usuario'] = $_POST['user'];
						$_SESSION['logeado']=true;
						#Ir al panel del usuario
						header("Location: panelUser.php");
					}
					else {
						echo "los pass no son iguales";
						echo "<a href='registro.php'>Vuelve al registro ANDA</a>";
					}	
			}

			}

?>
		
		