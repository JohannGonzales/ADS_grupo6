<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta charset="utf-8"/>
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
			$cod_concurso = $_GET["cod_concurso"];

		?>

		<br>
		<h1>VIVEAMAZONAS POSTULACIÓN</h1>
		<h8>La información que está consignando, así como los documentos de sustento que adjunta tiene carácter de DECLARACION JURADA, por lo que deben responder a la verdad. De detectarse que omite, oculta o consigna información falsa VIVEAMAZONAS procede con las acciones legales que correspondan.</h8>

		<br><br>


		<form action="mostrarpostulante.php" method="POST" enctype="multipart/form-data">
			<U><b>Información de postulante</b></U>
			<br><br>
			Código de postulante: <?php echo $_SESSION["ID"] ;?> <br><br>
			Nombres: <input name="nombres" type="text"> <br><br>
			Apellidos: <input name="apellidos" type="text"> <br><br>
			Género: <input name="genero" type="radio" value="M">Masculino
					<input name="genero" type="radio" value="F">Femenino
			<br><br>
			País: <input name="pais" type="text"> <br><br>
			Ciudad: <input name="ciudad" type="text"> <br><br>
			<U><b>Información del proyecto</b></U>
			<br><br>


			<!-- LOGICA PARA CODIGO DE POSTULACION -->
			<?php
			$enlace = mysqli_connect("localhost","root","","viveamazonas");
			$sentencia = "SELECT count(*) from proyectos where cod_concurso='$cod_concurso'; ";
			$resultado =mysqli_query($enlace,$sentencia);
      $registro = mysqli_fetch_row($resultado);
			$cod = $registro[0] +1;
			$cod_postulacion = $cod_concurso."-".$cod ;
			?>


			Código de postulación: <?php echo $cod_postulacion; ?> <br> <br>
			Código de concurso: <?php echo $cod_concurso; ?> <br><br>
			Nombre del proyecto: <input name="nomproyecto" type="text"> <br><br>
			Fecha de postulación: <input name="fechpostulacion" type="date"> <br><br>




				Adjuntar documentos:
				<br><h10 style ="color:red">Los documentos deben estar en formato docx o pdf</h10>

				<table border='1' cellpadding = '5' cellspacing = '2' bordercolor='green'>
				<tr>
					<td><p>Expediente</p></td>
					<td><p><input name="userfile" type="file"></p></td>
				</tr>
				<tr>

				</table>

				<br><br>

				<input type="submit" value="Enviar">
			</form>






	</body>
</html>
