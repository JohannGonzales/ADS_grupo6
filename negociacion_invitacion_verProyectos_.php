<?php
$cod_concurso = $_GET["cod_concurso"];
$cod_proyecto = $_GET["cod_proyecto"];
$fecha_negociacion = $_POST["fecha_negociacion"];

$enlace = mysqli_connect("localhost","root","","viveamazonas");
// concurso
$query = "UPDATE concursos SET etapa_concurso = 4 WHERE cod_concurso = '$cod_concurso' ";
mysqli_query($enlace,$query);

// proyecto
$query = "UPDATE proyectos SET etapa_postulacion = 5, Estado_postulacion ='Por negociar', fecha_fin = $fecha_negociacion  WHERE cod_postulacion = '$cod_proyecto' ";
mysqli_query($enlace,$query);

header('Location:negociacion_invitacion_verProyectos.php?concurso_ID=$cod_concurso');
 ?>
