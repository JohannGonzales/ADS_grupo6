<!DOCTYPE html>
<html lang="en" dir="ltr">

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
  <!-- <div style="text-align:center">
    <div class="anuncio_postulacion_div" style="">
    </div>
  </div> -->

<form action="subir_convenio.php" method="post" enctype="multipart/form-data">


  <table border=1>

		<?php
			// $loginUser_toTest = $_POST["loginUser"];
			// $loginPassword_toTest = $_POST["loginPassword"];
			// $es_admin = $_POST["es_administrador"];

      $cod_concurso=$_GET['concurso_ID'];

			$enlace = mysqli_connect("localhost","root","","viveamazonas");
			$query = "SELECT cod_postulante, nombre_proyecto, fecha_fin, cod_postulacion from proyectos where cod_concurso='$cod_concurso' and etapa_postulacion =5  and Estado_postulacion='Por negociar'";
			$resultado = mysqli_query($enlace,$query);
			$num_rows = mysqli_num_rows($resultado);

			if ($num_rows == 0) {
				echo "No existen proyectos pendientes de negociar<br>";
			}
			else {
				echo "<table border=1>";
				echo "	<tr>";
				echo "		<td>ID</td>";
				echo "		<td>Nompre proyecto</td>";
				echo "		<td>Fecha</td>";
        echo "		<td>Cargar acta</td>";
        echo "		<td>Subir acta</td>";
				echo "	</tr>";

				/*Estoy definiendo una iteración*/
				for ($i=1; $i <= $num_rows; $i++){
					/*Esta función permite obtener un registro (fila) del resultado de un query*/
					$registro = mysqli_fetch_row($resultado);

					echo "	<tr>";
					echo "		<td>",$registro[0],"</td>";
					echo "		<td>",$registro[1],"</td>";
          echo "		<td>",$registro[2],"</td>";
          echo "		<td><input name='convenio' type='file'></td>";
					echo "		<td><input type='submit' name='enviar'></td>";
					echo "	</tr>";
          echo "<input type='hidden' value='$registro[3]' name='cod_postulacion'>";
				}
				echo "</table>";
			}

		?>

</form>

</body>

</html>
