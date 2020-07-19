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

    <form action="elegir_ganadores_.php" method="post">



        <?php

    $cod_concurso=$_GET['cod_concurso'];
    $usuario=76819482; //sale de la variable de sesion
    $nombre_concurso=$_GET['nombre_concurso'];


    echo "Nombre concurso: ",$nombre_concurso;
    echo "<br> <br>";
    echo "<table border=1>";
    echo "	<tr>";
    echo "		<td>Código de postulación</td>";
    echo "		<td>Nombre de proyecto</td>";
    echo "		<td>Calificacion</td>";
    echo "    <td>Expediente";
    echo "    <td> Elegir ganador </td>";
    echo "	</tr>";

    $enlace=mysqli_connect("localhost","root","","viveamazonas");
    $sentencia="select a.cod_postulacion,a.nombre_proyecto,sum(b.calificacion),a.cod_postulante from proyectos a inner join calificacion_criterios b on b.cod_postulacion=a.cod_postulacion where b.cod_criterio in (9,10,11,12,13) and a.cod_concurso='$cod_concurso' ;";
    $resultado =mysqli_query($enlace,$sentencia);
    $numFilas = mysqli_num_rows($resultado);

    for ($i=1; $i <= $numFilas ; $i++) {

      $registro=mysqli_fetch_row($resultado);
      echo "	<tr>";
      echo "		<td>",$registro[0],"</td>";
      echo "		<td>",$registro[1],"</td>";
      echo "		<td>",$registro[2],"</td>";
      echo "    <td> <a href='doc_vive_amazonas/$registro[0]/expediente.pdf' download> Descargar </a> </td>";
      echo "    <td> <input type=checkbox name=$registro[0]></td>";
      echo "	</tr>";
    }
      echo "</table>";

    echo "<input type=hidden name='cant_proyectos' value=$numFilas>";
    echo "<input type=hidden name='cod_concurso' value=$cod_concurso>";
    echo "<br><br>";
    echo "<input type='submit' value='Enviar ganadores'> ";
    ?>

    </form>

</body>

</html>
