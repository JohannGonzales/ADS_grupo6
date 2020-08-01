<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/miestilo.css">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="css/formats.css" type="text/css">
	<title> Intranet ViveAmazonas</title>
</head>

<body>
	<div class="w3-container w3-black w3-leftbar w3-border-light-green">
		<h1 style="">Intranet ViveAmazonas</h1>
	</div>

	<?php
		session_start(); //inicio de sesión
		if (!isset($_SESSION["ID"])){
			session_destroy();
			echo "<br><br> <font color='red'>Intento de acceso sin autorización!!!</font>";
			exit;
		}
		else{
			include("cinta_de_opciones.php");
		}
	?>

	<br>
	<table border=1>
		<?php
			// $loginUser_toTest = $_POST["loginUser"];
			// $loginPassword_toTest = $_POST["loginPassword"];
			// $es_admin = $_POST["es_administrador"];

			$enlace = mysqli_connect("localhost","root","","viveamazonas");
			$query = "SELECT cod_concurso, nombre_concurso, fecha_postulacion_inicio, fecha_postulacion_fin FROM `concursos` WHERE  etapa_concurso = 1 ";
			$resultado = mysqli_query($enlace,$query);
			$num_rows = mysqli_num_rows($resultado);

			if ($num_rows == 0) {
				echo "No existen convocatorias activas <br>";
			}
			else {
				echo "<table border=1>";
				echo "	<tr>";
				echo "		<td>Convocatoria</td>";
				echo "		<td>Fecha de inicio de postulación</td>";
				echo "		<td>Fecha limite</td>";
				echo "	</tr>";

				/*Estoy definiendo una iteración*/
				for ($i=1; $i <= $num_rows; $i++){
					/*Esta función permite obtener un registro (fila) del resultado de un query*/
					$registro = mysqli_fetch_row($resultado);
					echo "	<tr>";
								// el campo 0 es el id y sirve para ir llevarse por get al detalle
					echo "		<td>",$registro[1],"</td>";
					echo "		<td>",$registro[2],"</td>";
					echo "		<td>",$registro[3],"</td>";
					echo "		<td><a href='convocatoria_detalle.php?concurso_ID=$registro[0]'>Detalle</a> </td>";
					echo "	</tr>";
				}
				echo "</table>";
			}

		?>

</body>

</html>
