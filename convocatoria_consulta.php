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
		 ?>

        <br>
        <div class="form-container">
            <form action="convocatoria_nueva_consulta.php?concurso_ID=<?php echo $concurso_ID ?>" method="post">
                <h2 style="text-align:center;color:black">Realizar Consulta</h2>

                <p style="text-align:left">Título de consulta:</p>
                <input type="text" name="titulo" style="width:100%"><br><br>

                <p style="text-align:left">Consulta:</p>
                <textarea type="text" name="consulta"  style='width:100%'></textarea><br><br>
                <div style="text-align:center">
                    <button class="w3-btn w3-ripple w3-black" type="submit">REALIZAR CONSULTA</button>
                    <!-- <input type="submit" value="CREAR CUENTA" class="w3-button w3-yellow"> -->
                </div>
            </form>
        </div>
	</body>
</html>
