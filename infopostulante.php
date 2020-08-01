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

	$enlace = mysqli_connect("localhost","root","","viveamazonas");

	$sentencia = "INSERT INTO postulante VALUES('{$_SESSION["ID"]}', '$nombres', '$apellidos', '$genero', '$pais', '$ciudad');" ;

  $sentencia2 ="INSERT INTO proyectos (cod_postulacion,cod_postulante,cod_concurso,nombre_proyecto,fecha_postulacion)VALUES('$codpostulacion','{$_SESSION["ID"]}','$codconcurso','$nomproyecto','$fechpostulacion');";

	$sentencia3 ="INSERT INTO calificacion_criterios (cod_criterio,cod_postulacion,calificacion,ID_Trabajador) values (1,'$codpostulacion',0,76984225);";



	mysqli_query($enlace,$sentencia);
	mysqli_query($enlace,$sentencia2);
	mysqli_query($enlace,$sentencia3);

	header("Location:mis_postulaciones.php");
?>
