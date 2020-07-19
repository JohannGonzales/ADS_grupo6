<html>

	<head>
	</head>

	<body>
		<?php
			$codigo = $_POST['codpostulante'];
					 $codpostulante = $_POST['codpostulante'];
			$nombres = $_POST['nombres'];
			$apellidos = $_POST['apellidos'];
			$genero = $_POST['genero'];
			$pais = $_POST['pais'];       /*si  solo es en Perú esto debe ser borrado */
			$ciudad = $_POST['ciudad'];

					$codpostulacion = $_POST['codpostulacion'];
					$codconcurso = $_POST["codconcurso"];
					$nomproyecto = $_POST["nomproyecto"];
					$fechpostulacion = $_POST["fechpostulacion"];

		$enlace = mysqli_connect("localhost","root","","viveamazonas");   /*cambiar nombre de base de datos*/
			$sentencia = "INSERT INTO postulante VALUES('$codpostulante','$nombres','$apellidos','$genero','$pais','$ciudad');";
		    $sentencia2 ="INSERT INTO proyectos (cod_postulacion,cod_postulante,cod_concurso,nombre_proyecto,fecha_postulacion)VALUES('$codpostulacion','$codpostulante','$codconcurso','$nomproyecto','$fechpostulacion');";
			/*hacer el join de las dos tablas */
			mysqli_query($enlace,$sentencia);

			mysqli_query($enlace,$sentencia2);

			header("Location:postular.php");		
		?>
	</body>
</html>
