<?php
$cod_postulacion = $_GET["cod_postulacion"];

$enlace = mysqli_connect("localhost","root","","viveamazonas");

$query = "UPDATE proyectos SET Estado_postulacion ='VALIDADO'  WHERE cod_postulacion = '$cod_postulacion' ";

mysqli_query($enlace,$query);

header('Location:negociacion_main.php');

 ?>
