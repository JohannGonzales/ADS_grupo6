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

		// variables a usar
		$concurso_ID = $_GET["concurso_ID"];
		$titulo = $_POST["titulo"];
		$consulta = $_POST["consulta"];
		// // también $_SESSION[ID]

		// generar codigo de CONSULTA
		// $enlace = mysqli_connect("localhost","root","","viveamazonas");
		// $query = "SELECT cod_concurso, nombre_concurso, fecha_postulacion_inicio, fecha_postulacion_fin FROM `concursos` ";
		// $resultado = mysqli_query($enlace,$query);
		// $num_rows = mysqli_num_rows($resultado);
		$consulta_ID = "123456"

		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		$enlace = mysqli_connect("localhost","root","","viveamazonas");
		$query = "INSERT INTO consultas VALUES ('$consulta_ID','$_SESSION["ID"]','asdasd','asdasd',NULL,NULL,'asdasd','pendiente') "
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTA
		// FALTAd

		 ?>


	</body>
</html>
