<?php
		$usuario=$_SESSION["ID"];
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
