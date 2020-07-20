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

<?php

session_start();

$ID_perfil=$_SESSION['Perfil'];//extraerlo de variable la sesion;
$ID_usuario=$_SESSION['ID'];

if ($ID_perfil==1) {

$enlace=mysqli_connect("localhost","root","","viveamazonas");
$sentencia="select a.cod_postulacion,a.nombre_proyecto,b.nombre_concurso,a.etapa_postulacion,a.Estado_postulacion,a.fecha_postulacion,a.fecha_fin from proyectos a inner JOIN concursos b on b.cod_concurso=a.cod_concurso where a.cod_postulante='$ID_usuario';";
$resultado=mysqli_query($enlace,$sentencia);
$numFilas = mysqli_num_rows($resultado);

echo "<table border=1>";
echo "	<tr>";
echo "		<td>Código de postulación</td>";
echo "		<td>Nombre de proyecto</td>";
echo "		<td>Nombre de concurso</td>";
echo "		<td>Etapa de postulación</td>";
echo "		<td>Estado de postulación</td>";
echo "		<td>Fecha inicio de postulación</td>";
echo "		<td>Fecha fin de postulación </td>";
echo "		<td>Revisar comentarios </td>";
echo "	</tr>";

for ($i=1; $i <=$numFilas ; $i++) {

  $registro = mysqli_fetch_row($resultado);
  echo "	<tr>";
  echo "		<td>",$registro[0],"</td>";
  echo "		<td>",$registro[1],"</td>";
  echo "		<td>",$registro[2],"</td>";
  echo "		<td>",$registro[3],"</td>";
  echo "		<td>",$registro[4],"</td>";
  echo "		<td>",$registro[5],"</td>";
  echo "		<td>",$registro[6],"</td>";
  echo "		<td> <a href='ver_comentarios.php?codpostulacion=$registro[0]'>Ver </a> </td>";
  echo "	</tr>";
}

}


?>
</body>

</html>
