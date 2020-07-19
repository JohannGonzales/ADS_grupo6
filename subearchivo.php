<html>

	<head>
	
	</head>

	
	<body>
		
		<?php
		//codigo de insertar en sql
		?>
		
		
		<?php
		// Datos del log in
		
		//linea para descargar , no pertenece a este archivo : echo "		<td> <a href='doc_vive_amazonas/$registro[2]/declaracion.pdf' download> Descargar </a> </td>";

		$usuario=74453484;
		//datos del arhivo
		$tipo_archivo = $_FILES['userfile']['type'];
		$tamano_archivo = $_FILES['userfile']['size'];
		$error_archivo= $_FILES['userfile']['error'];
		$permitidos =  array("application/pdf");
		$limite_kb=100000;
		$ruta='postulante/'.$usuario.'/';
		$nombre_archivo = $ruta.$_FILES['userfile']['name'];
		//datos de donde se almaceran
		if ($error_archivo>0) {
			echo "Error al cargar archivo";
		}
		else {

			if (in_array($tipo_archivo,$permitidos) && $tamano_archivo<=$limite_kb*1024) {

				if (!file_exists($ruta)) {
					mkdir($ruta);
				}

				if (!file_exists($nombre_archivo)) {

					$resultado=@move_uploaded_file($_FILES['userfile']['tmp_name'],$nombre_archivo);

					if ($resultado) {
						echo "archivo guardado";
					}
					else {
						echo "error al guardar el archivo";
					}
				}
			}
			else {
				echo "Archivo no permitido o excede el tamaño";
			}
		}

		?>
		
		
		<?php
		//datos del arhivo
		$nombre_archivo = $_FILES['userfile00000']['name'];
		$tipo_archivo = $_FILES['userfile00000']['type'];
		$tamano_archivo = $_FILES['userfile000000']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}	
		
			//datos del arhivo
		$nombre_archivo = $_FILES['userfile1']['name'];
		$tipo_archivo = $_FILES['userfile1']['type'];
		$tamano_archivo = $_FILES['userfile1']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile1']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}	
		//datos del arhivo
		$nombre_archivo = $_FILES['userfile2']['name'];
		$tipo_archivo = $_FILES['userfile2']['type'];
		$tamano_archivo = $_FILES['userfile2']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile2']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}	
		//datos del arhivo
		$nombre_archivo = $_FILES['userfile3']['name'];
		$tipo_archivo = $_FILES['userfile3']['type'];
		$tamano_archivo = $_FILES['userfile3']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile3']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}	
		//datos del arhivo
		$nombre_archivo = $_FILES['userfile4']['name'];
		$tipo_archivo = $_FILES['userfile4']['type'];
		$tamano_archivo = $_FILES['userfile4']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile4']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}	
		//datos del arhivo
		$nombre_archivo = $_FILES['userfile5']['name'];
		$tipo_archivo = $_FILES['userfile5']['type'];
		$tamano_archivo = $_FILES['userfile5']['size'];
				
		//compruebo si las características del archivo son las que deseo
		if (!((strpos($tipo_archivo, "pdf") || strpos($tipo_archivo, "docx")))) {
			echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .docx o .pdf<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
		}else{
			if (move_uploaded_file($_FILES['userfile5']['tmp_name'],  $nombre_archivo)){
					echo "El archivo ha sido cargado correctamente.";
			}else{
					echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
			}
		}
	
		
		?>	
		
	</body>


</html>