<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php

    $numFilas=$_POST['cant_proyectos'];
    $cod_concurso=$_POST['cod_concurso'];

    $enlace=mysqli_connect("localhost","root","","viveamazonas");
    $sentencia="select a.cod_postulacion,a.nombre_proyecto,sum(b.calificacion),a.cod_postulante from proyectos a inner join calificacion_criterios b on b.cod_postulacion=a.cod_postulacion where b.cod_criterio in (9,10,11,12,13) and a.cod_concurso='$cod_concurso' group by a.cod_postulacion,a.nombre_proyecto,a.cod_postulacion;";
    $resultado =mysqli_query($enlace,$sentencia);
    $numFilas=mysqli_num_rows($resultado);

    for ($i=1; $i <= $numFilas ; $i++) {
      $registro=mysqli_fetch_row($resultado);

      ${"proyecto".$i}=$registro[0];

      if (isset($_POST[${"proyecto".$i}])) {

        $sentencia1="update proyectos set Estado_postulacion='Seleccionado' where cod_postulacion='$registro[0]';";
        mysqli_query($enlace,$sentencia1);

        $sentencia2="update calificacion_criterios set calificacion=2 where cod_postulacion='$registro[0]' and cod_criterio=14; ";
        mysqli_query($enlace,$sentencia2);


      }
      elseif (!isset($_POST[${"proyecto".$i}])) {


        $sentencia1="update proyectos set Estado_postulacion='No Seleccionado' where cod_postulacion='$registro[0]';";
        mysqli_query($enlace,$sentencia1);

        $sentencia2="update calificacion_criterios set calificacion=1 where cod_postulacion='$registro[0]' and cod_criterio=14; ";
        mysqli_query($enlace,$sentencia2);


      }
    }

    $sentencia3="update concursos set etapa_concurso=3 where cod_concurso='$cod_concurso' ;";
    mysqli_query($enlace,$sentencia3);

    header('location:etapa1.php');

    ?>
  </body>
</html>
