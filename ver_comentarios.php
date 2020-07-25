<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
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
              else {
                  include("cinta_de_opciones.php");
              }
          ?>

<?php


$ID_perfil=$_SESSION['Perfil'];//extraerlo de variable la sesion;
$ID_usuario=$_SESSION['ID'];
$cod_postulacion=$_GET['codpostulacion'];

if ($ID_perfil==1) {

$enlace=mysqli_connect("localhost","root","","viveamazonas");
//numero de etapas hasta el momento
$sentencia="select max(b.num_etapa) from calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where a.cod_postulacion='$cod_postulacion';";
$resultado=mysqli_query($enlace,$sentencia);
$registro=mysqli_fetch_row($resultado);


  echo "<table border=1>";
  echo "	<tr>";
  echo "		<td>Criterio</td>";
  echo "		<td>Calificacion</td>";
  echo "		<td>Comentarios</td>";
  echo "	</tr>";

  for ($i=1; $i <=$registro[0] ; $i++) {

    if ($i=1) {
      $sentencia1="select a.cod_criterio, b.criterios_etapa, a.calificacion,a.comentario  from calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$i and a.cod_postulacion='$cod_postulacion' order by a.cod_criterio;";
      $resultado1=mysqli_query($enlace,$sentencia1);

      $numFilas=mysqli_num_rows($resultado1);

      echo "	<tr>";
      echo "		<td><b>","Etapa 1: Revisión inicial","</b></td>";
      echo "	</tr>";

      for ($a=1; $a <=$numFilas ; $a++) {
          $registro1=mysqli_fetch_row($resultado1);
        echo "	<tr>";

          echo "		<td>", $registro1[1] ,"</td>";
          if ($registro1[2]==2) {
            echo "		<td> Aprobado </td>";
          }
          if ($registro1[2]==1) {
          echo "		<td>Desaprobado </td>";
          }
          if ($registro1[2]==0) {
          echo "		<td>Por revisar </td>";
          }

          echo "		<td>", $registro1[3],"</td>";
        echo "	</tr>";
      }
    }

    if ($i=2) {

      $sentencia1="select a.cod_criterio, b.criterios_etapa, a.calificacion,a.comentario  from calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$i and a.cod_postulacion='$cod_postulacion' order by a.cod_criterio;";
      $resultado1=mysqli_query($enlace,$sentencia1);

      $numFilas=mysqli_num_rows($resultado1);

      echo "	<tr>";
      echo "		<td><b>","Etapa 2: Elegibilidad","</b></td>";
      echo "	</tr>";

      for ($b=1; $b <=$numFilas ; $b++) {
        $registro1=mysqli_fetch_row($resultado1);
        echo "	<tr>";

          echo "		<td>", $registro1[1] ,"</td>";
          if ($registro1[2]==2) {
            echo "		<td> Aprobado </td>";
          }
          elseif ($registro1[2]==1) {
          echo "		<td>Desaprobado </td>";
          }
          elseif ($registro1[2]==0) {
          echo "		<td>Por revisar </td>";
          }

          echo "		<td>", $registro1[3],"</td>";
        echo "	</tr>";
      }


    }

    if ($i=3) {

      $sentencia1="select a.cod_criterio, b.criterios_etapa, a.calificacion,a.comentario  from calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$i and a.cod_postulacion='$cod_postulacion' order by a.cod_criterio;";
      $resultado1=mysqli_query($enlace,$sentencia1);

      $numFilas=mysqli_num_rows($resultado1);


      echo "	<tr>";
      echo "		<td><b>","Etapa 3: Evaluación técnica","</b></td>";
      echo "	</tr>";

      for ($b=1; $b <=$numFilas ; $b++) {
        $registro1=mysqli_fetch_row($resultado1);
        echo "	<tr>";

          echo "		<td>", $registro1[1] ,"</td>";
          if ($registro1[2]==3) {
            echo "		<td> Aprobado </td>";
          }
          elseif ($registro1[2]==2) {
          echo "		<td>Aprobado con errores </td>";
          }
          elseif ($registro1[2]==1) {
          echo "		<td>Desaprobado </td>";
          }
          elseif ($registro1[2]==0) {
          echo "		<td>Por revisar </td>";
          }

          echo "		<td>", $registro1[3],"</td>";
        echo "	</tr>";
      }

    }
    if ($i=4) {

      $sentencia1="select a.cod_criterio, b.criterios_etapa, a.calificacion,a.comentario  from calificacion_criterios a inner join criterios_eva b on b.codigo_criterio=a.cod_criterio where b.num_etapa=$i and a.cod_postulacion='$cod_postulacion' order by a.cod_criterio;";
      $resultado1=mysqli_query($enlace,$sentencia1);

      $numFilas=mysqli_num_rows($resultado1);

      echo "	<tr>";
      echo "		<td><b>","Etapa 4: Elección final del ganador","</b></td>";
      echo "	</tr>";

      for ($b=1; $b <=$numFilas ; $b++) {
        $registro1=mysqli_fetch_row($resultado1);
        echo "	<tr>";

          echo "		<td>", $registro1[1] ,"</td>";
          if ($registro1[2]==2) {
            echo "		<td> Aprobado </td>";
          }
          elseif ($registro1[2]==1) {
          echo "		<td>Desaprobado </td>";
          }
          elseif ($registro1[2]==0) {
          echo "		<td>Por revisar </td>";
          }

          echo "		<td>", $registro1[3],"</td>";
        echo "	</tr>";
      }

    }


  }

echo "</table>";


$sentencia2="select Estado_postulacion from proyectos where cod_postulacion='$cod_postulacion';";
$resultado2=mysqli_query($enlace,$sentencia2);
$registro2=mysqli_fetch_row($resultado2);


if ($registro2[0]=='Seleccionado') {
  echo "<br><b>Felicitaciones! su proyecto ha sido seleccionado. En los próximos días nos estaremos comunicando con usted para coordinar los siguientes pasos";
}
if ($registro2[0]=='No Seleccionado') {
  echo "<br><b>Lamentablemente su proyecto ha sido rechazado para este concurso. Agradecemos su participación y lo invitamos a seguir postulando<b>";
}

}

?>

</body>

</html>
