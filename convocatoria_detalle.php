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
			$concurso_ID = $_GET["concurso_ID"]

			// // con el codigo de concurso encontramos el codigo de postulación pues ese es el nombre con
			// // que se graba en las carpetas de archivos.
			// $enlace = mysqli_connect("localhost","root","","viveamazonas");
			// $query = "SELECT cod_concurso, cod_postulacion FROM `proyectos` WHERE cod_concurso =$concurso_ID ";
			// $resultado = mysqli_query($enlace,$query);
			// $registro = mysqli_fetch_row($resultado);
			// $postulacion_ID = $registro[1];

		?>


		<div style="text-align:center">
			<div class="anuncio_postulacion_div">
				<br><br><br><br>ANUNCIO DE CONVOCATORIA
				<br><br><br><br>

				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<!-- cambiar ruta y preguntar lógica -->
				<a href="concursos/<?php echo $concurso_ID ?>/bases.pdf" download="Bases">
					<button class="w3-btn w3-ripple w3-black">Descargar<br>bases </button>
				</a>

				<form class="" action="convocatoria_consulta.php?concurso_ID=<?php echo $concurso_ID ?>" method="GET">
					<button class="w3-btn w3-ripple w3-grey" type="submit" >Realizar<br>consulta</button>
				</form>

				<form class="" action="postular.php" method="post">
					<button class="w3-btn w3-ripple w3-red" type="submit">POSTULAR</button>
				</form>

			</div>
		</div>
	</body>
</html>
