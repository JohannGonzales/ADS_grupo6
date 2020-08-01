<html>

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Intranet ViveAmazonas</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/formats.css" type="text/css">
</head>

<?php
session_start();
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$genero = $_POST['genero'];
$pais = $_POST['pais'];
$ciudad = $_POST['ciudad'];
$codpostulacion = $_GET['cod_postulacion'];
$codconcurso = $_GET['cod_concurso'];
$nomproyecto = $_POST["nomproyecto"];
$fechpostulacion = $_POST["fechpostulacion"];

////////////////////////////////////////////////// SUBE ARCHIVOS
$tipo_archivo = $_FILES['expediente']['type'];
$tamano_archivo = $_FILES['expediente']['size'];
$error_archivo= $_FILES['expediente']['error'];
$permitidos =  array("application/pdf");
$limite_kb=100000;
$ruta='doc_vive_amazonas/Postulaciones/'.$codpostulacion.'/';
$nombre_archivo = $ruta."expediente.pdf";
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

			$resultado=@move_uploaded_file($_FILES['expediente']['tmp_name'],$nombre_archivo);

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

//////////////////////////////////////////////////




?>



<body>
	<form action="infopostulante.php?cod_postulacion=<?php echo $codpostulacion; ?>&cod_concurso=<?php echo $codconcurso; ?>" method="POST" enctype="multipart/form-data">
		<?php

						echo "Código de postulante: ";
						echo $_SESSION["ID"];
						echo "<br>Nombres: ";
						echo $nombres;
						echo "<br>Apellidos: ";
						echo $apellidos;
						echo "<br>Género: ";
						echo  $genero;
						echo "<br>País: ";
						echo $pais;
						echo "<br>Ciudad: ";
						echo $ciudad;
						echo "<br>Código de postulación: ";
						echo $codpostulacion;
						echo "<br>Código de concurso: ";
						echo $codconcurso;
						echo "<br>Nombre del proyecto: ";
						echo $nomproyecto;
						echo "<br>Fecha de postulación: ";
						echo $fechpostulacion;
				?>

		<input type="hidden" name="nombres" value="<?php echo $nombres; ?>">
		<input type="hidden" name="apellidos" value="<?php echo $apellidos; ?>">
		<input type="hidden" name="genero" value="<?php echo $genero; ?>">
		<input type="hidden" name="pais" value="<?php echo $pais; ?>">
		<input type="hidden" name="ciudad" value="<?php echo $ciudad; ?>">
		<input type="hidden" name="codpostulacion" value="<?php echo $codpostulacion; ?>">
		<input type="hidden" name="codconcurso" value="<?php echo $codconcurso; ?>">
		<input type="hidden" name="nomproyecto" value="<?php echo $nomproyecto; ?>">
		<input type="hidden" name="fechpostulacion" value="<?php echo $fechpostulacion; ?>">

		<br><br>
		<input type='submit' name='boton' value='Confirmar'>
		<button class="w3-btn w3-ripple w3-red" type="button" ><a href="postular.php?cod_concurso=<?php echo $codconcurso; ?>">Regresar</a></button>
	</form>

</body>

</html>
<
