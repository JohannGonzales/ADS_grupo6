<html>

<head>
</head>

<body>
	<?php

		$boton=$_POST['boton'];
		if ($boton=='Confirmar') {

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

		}
		elseif 	($boton=='Editar') {


					$codigo = $_POST['codpostulante'];
					$nombres = $_POST['nombres'];
					$apellidos = $_POST['apellidos'];
					$genero = $_POST['genero'];
					$pais = $_POST['pais'];       /*si  solo es en Perú sino debe ser borrado */
					$ciudad = $_POST['ciudad'];

					$codpostulacion = $_POST['codpostulacion'];
					$codconcurso = $_POST["codconcurso"];
					$nomproyecto = $_POST["nomproyecto"];
					$fechpostulacion = $_POST["fechpostulacion"];


					echo "<form action='editPostulante.php' method='POST'>";
						echo "Código de postulante: <input name='codpostulante' type='text' value='$codigo'> <br><br>";
						echo "Nombres: <input name='nombres' type='text' value='$nombres'> <br><br>";
						echo "Apellidos: <input name='apellidos' type='text' value='$apellidos'> <br><br>";
						echo "Género: ";
						if ($genero=='M') {
							echo "<input name='genero' type='radio' value='$genero' checked>Masculino";  /*me indica que ya esta marcado (checked)*/
							echo "<input name='genero' type='radio' value='$genero'>Femenino";
						}
						else {
							echo "<input name='genero' type='radio' value='$genero'>Masculino";
							echo "<input name='genero' type='radio' value='$genero' checked>Femenino";
						}
						echo "<br><br>";
						echo "País: <input name='pais'type='text' value='$pais'> <br><br>";
						echo "Ciudad: <input name='ciudad' type='text' value='$ciudad'> <br><br>";

						echo "Código de postulación: <input name='codpostulacion' type='text' value='$codpostulacion'> <br><br>";
						echo "Código de concurso: <input name='codconcurso' type='text' value='$codconcurso'> <br><br>";
						echo "Nombre del proyecto: <input name='nomproyecto' type='text' value='$nomproyecto'> <br><br>";
						echo "Fecha de postulación: <input name='fechpostulación' type='date' value='$fechpostulacion'> <br><br>";
						echo "<br>";
						echo "<br>";
						echo "<input type='submit' value='Grabar'>";
						echo "</form>";

		}
		?>
</body>

</html>
