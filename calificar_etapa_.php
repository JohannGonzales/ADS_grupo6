<?php
$cod_postulacion=$_POST['cod_postulacion'];
$cod_criterio=$_POST['cod_criterio'];
$num_etapa=$_POST['num_etapa'];
$calificacion=$_POST['puntaje'];
$comentario=$_POST['comentario'];


$enlace=mysqli_connect("localhost","root","","viveamazonas");
$sentencia="update calificacion_criterios SET calificacion=$calificacion,comentario='$comentario' where cod_postulacion='$cod_postulacion' and cod_criterio=$cod_criterio;";
mysqli_query($enlace,$sentencia);

///////////////////////////////////////////////////////////LOGICA PARA LA ETAPA 1 /////////////////////////////////////////////////////////////////////////////


if ($num_etapa==1) {

   if ($calificacion==2) {

  //genero 7 criterios de la segunda etapa
  for ($i=2; $i < 9; $i++) {
    $sentencia1="insert into calificacion_criterios (cod_criterio,cod_postulacion,calificacion,ID_Trabajador)values ($i,'$cod_postulacion',0,0);";
    mysqli_query($enlace,$sentencia1);
  }
  //asigno usuarios a calificar para la segunda etapa
  for ($i=2; $i < 9 ; $i++) {
    $sentencia2="select a.id_trabajador ,count(b.id_trabajador) as contador from asignacion_comite a left outer join calificacion_criterios b on b.ID_Trabajador=a.ID_Trabajador where a.ID_Comite=1 group by a.ID_Trabajador order by contador asc;";
    $resultado =mysqli_query($enlace,$sentencia2);
    $registro= mysqli_fetch_row($resultado);

    $sentencia3="update calificacion_criterios set ID_Trabajador=$registro[0] where cod_criterio=$i and cod_postulacion='$cod_postulacion';";
    mysqli_query($enlace,$sentencia3);
      }

    $sentencia4="update proyectos set etapa_postulacion=2,Estado_postulacion='Por revisar' where cod_postulacion='$cod_postulacion';";
    mysqli_query($enlace,$sentencia4);

      header('location:etapa1.php');
    }

    elseif ($calificacion==1) {

      $sentencia1="update proyectos set Estado_postulacion='Rechazado' where cod_postulacion='$cod_postulacion';";
      mysqli_query($enlace,$sentencia1);

      header('location:etapa1.php');
    }

}

///////////////////////////////////////////////////////////LOGICA PARA LA ETAPA 2 /////////////////////////////////////////////////////////////////////////////
elseif ($num_etapa==2) {

//sentencia para saber si aun falta calificar algun criterio de la etapa 2

  $sentencia1="select a.* FROM calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=2 and a.cod_postulacion='$cod_postulacion' and a.calificacion=0;";
  $resultado=mysqli_query($enlace,$sentencia1);
  $filas=mysqli_num_rows($resultado);

  if ($filas==0) {
    // sentencia para hallar el puntaje
      $sentencia2="select sum(a.calificacion) as puntaje FROM calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$num_etapa and a.cod_postulacion='$cod_postulacion';";
      $resultado2=mysqli_query($enlace,$sentencia2);
      $registro1= mysqli_fetch_row($resultado2);

    //subasginación para cuando todos terminan de calificar la etapa 2 rumbo a la etapa 3

    //todos calificaron y obtuvo aprobacion unanime
      if ($registro1[0]==14) {

        for ($i=9; $i < 14; $i++) {
          $sentencia3="insert into calificacion_criterios (cod_criterio,cod_postulacion,calificacion,ID_Trabajador)values ($i,'$cod_postulacion',0,0);";
          mysqli_query($enlace,$sentencia3);
        }

        $sentencia4="update calificacion_criterios a set ID_Trabajador = (SELECT a.id_trabajador from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where a.codigo_concurso=(SELECT codigo_concurso from proyectos where cod_postulacion='$cod_postulacion') and b.cargo_trabajador ='Especialista_gestion') where cod_postulacion='$cod_postulacion' and cod_criterio=9;";
        $sentencia5="update calificacion_criterios a set ID_Trabajador = (SELECT a.id_trabajador from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where a.codigo_concurso=(SELECT codigo_concurso from proyectos where cod_postulacion='$cod_postulacion') and b.cargo_trabajador ='Especialista_cambio') where cod_postulacion='$cod_postulacion' and cod_criterio=10;";
        $sentencia6="update calificacion_criterios a set ID_Trabajador = (SELECT a.id_trabajador from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where a.codigo_concurso=(SELECT codigo_concurso from proyectos where cod_postulacion='$cod_postulacion') and b.cargo_trabajador ='Especialista_tematica') where cod_postulacion='$cod_postulacion' and cod_criterio=11;";
        $sentencia7="update calificacion_criterios a set ID_Trabajador = (SELECT a.id_trabajador from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where a.codigo_concurso=(SELECT codigo_concurso from proyectos where cod_postulacion='$cod_postulacion') and b.cargo_trabajador ='Especialista_salva_amb') where cod_postulacion='$cod_postulacion' and cod_criterio=12;";
        $sentencia8="update calificacion_criterios a set ID_Trabajador = (SELECT a.id_trabajador from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where a.codigo_concurso=(SELECT codigo_concurso from proyectos where cod_postulacion='$cod_postulacion') and b.cargo_trabajador ='Especialista_salva_soc') where cod_postulacion='$cod_postulacion' and cod_criterio=13;";

        mysqli_query($enlace,$sentencia4);
        mysqli_query($enlace,$sentencia5);
        mysqli_query($enlace,$sentencia6);
        mysqli_query($enlace,$sentencia7);
        mysqli_query($enlace,$sentencia8);

        $sentencia9="update proyectos set etapa_postulacion=3,Estado_postulacion='Por revisar' where cod_postulacion='$cod_postulacion';";;
        mysqli_query($enlace,$sentencia9);
        header('location:etapa1.php');

      }

      // todos calificaron y tuvo error en alguna aprobacion
      else if ($registro1[0] < 14) {

        $sentencia3="update proyectos set Estado_postulacion='Rechazado' where cod_postulacion='$cod_postulacion';";;
        mysqli_query($enlace,$sentencia3);
        header('location:etapa1.php');

      }
  }


  elseif ($filas >= 1) {
    header('location:etapa1.php');
  }


}

///////////////////////////////////////////////////////////LOGICA PARA LA ETAPA 3 /////////////////////////////////////////////////////////////////////////////

elseif ($num_etapa=3) {

  //sentencia para saber si aun falta calificar algun criterio de la etapa 2

    $sentencia1="select a.* FROM calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=3 and a.cod_postulacion='$cod_postulacion' and a.calificacion=0;";
    $resultado=mysqli_query($enlace,$sentencia1);
    $filas=mysqli_num_rows($resultado);

    if ($filas==0) {

      // sentencia para hallar el puntaje
        $sentencia2="select sum(a.calificacion) as puntaje FROM calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$num_etapa and a.cod_postulacion='$cod_postulacion';";
        $resultado2=mysqli_query($enlace,$sentencia2);
        $registro= mysqli_fetch_row($resultado2);

        if ($registro[0]>=13) {

        $sentencia3="update proyectos set etapa_postulacion=4,Estado_postulacion='Por revisar' where cod_postulacion='$cod_postulacion';";
        mysqli_query($enlace,$sentencia3);

        $sentencia4="insert into calificacion_criterios (cod_criterio,cod_postulacion,calificacion,ID_Trabajador)values (14,'$cod_postulacion',0,(select id_trabajador from trabajadores where area=8 and cargo_trabajador='Director'));";
        mysqli_query($enlace,$sentencia4);

        header('location:etapa1.php');

        }

        elseif ($registro[0]<13) {

          $sentencia3="update proyectos set Estado_postulacion='Rechazado' where cod_postulacion='$cod_postulacion';";
          mysqli_query($enlace,$sentencia3);
          header('location:etapa1.php');

        }

    }

    elseif ($filas<>0) {
      header('location:etapa1.php');
    }


}


?>
