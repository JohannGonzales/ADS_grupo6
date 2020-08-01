<?php
    $cod_concurso = $_GET["cod_concurso"];
    $aprobar = $_GET["aprobar"];

    $enlace = mysqli_connect("localhost","root","","viveamazonas");
    if ($aprobar==0) {
      $sentencia="UPDATE concursos SET bases_concurso='desaprobado' WHERE cod_concurso = '$cod_concurso' ;";

    } elseif ($aprobar==1) {
      $sentencia = "UPDATE concursos SET bases_concurso = 'aprobado', etapa_concurso=1 WHERE cod_concurso = '$cod_concurso' ;";
    }
    mysqli_query($enlace,$sentencia);
    header('Location:listaconcursos.php');
  ?>
