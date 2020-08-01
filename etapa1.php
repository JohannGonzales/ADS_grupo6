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
      $ID_perfil=$_SESSION["Perfil"];//extraerlo de variable la sesion;
      $ID_trabajador=$_SESSION["ID"]; //extraer de la variable sesion
      $cero=0;
      $uno=1;
      $dos=2;
      $tres=3;


  if ($ID_perfil == "4" || $ID_perfil == "5" || $ID_perfil == "6" ) {


      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="select d.num_etapa,d.criterios_etapa,a.cod_postulacion,a.calificacion,b.nombre_proyecto,c.nombre_concurso,d.codigo_criterio FROM calificacion_criterios a inner join proyectos b on b.cod_postulacion=a.cod_postulacion inner join concursos c on c.cod_concurso=b.cod_concurso inner join criterios_eva d on d.codigo_criterio=a.cod_criterio where a.ID_Trabajador=$ID_trabajador;";
      $resultado =mysqli_query($enlace,$sentencia);
      $numFilas = mysqli_num_rows($resultado);



      if ($numFilas == 0) {

				echo "No presenta proyectos por evaluar <br>";
			}


      else {
				echo "<table border=1>";
				echo "	<tr>";
				echo "		<td>Etapa</td>";
				echo "		<td>Criterio de evaluación</td>";
				echo "		<td>Código de postulación</td>";
				echo "		<td>Calificación</td>";
        echo "		<td>Nombre proyecto</td>";
        echo "		<td>Nombre concurso</td>";
        echo "		<td>Expediente</td>";
        echo "		<td>Accion</td>";

				echo "	</tr>";

        for ($i=1; $i <= $numFilas; $i++){
					$registro = mysqli_fetch_row($resultado);
					echo "	<tr>";
					echo "		<td>",$registro[0],"</td>";
					echo "		<td>",$registro[1],"</td>";
					echo "		<td>",$registro[2],"</td>";
          if ($registro[3]==$cero) {
            echo "		<td> Por corregir </td>";
          }
          elseif ($registro[3]==$uno) {
            echo "		<td>Rechazado</td>";
          }
          elseif ($registro[3]==$dos || $registro[3]=$tres) {
            echo "		<td>Aprobado</td>";
          }

          echo "		<td>",$registro[4],"</td>";
          echo "		<td>",$registro[5],"</td>";
          echo "		<td> <a href='doc_vive_amazonas/Postulaciones/$registro[2]/expediente.pdf' download> Descargar </a> </td>";
          echo "		<td> <a href='calificar_etapa.php?cod_postulacion=$registro[2]&cod_criterio=$registro[6]&num_etapa=$registro[0]'> Calificar </a> </td>";
					echo "	</tr>";
				}
				echo "</table>";

      }

    }

    elseif ($ID_perfil=="3" || $ID_perfil=="8") {

      //la etapa 4 de revisión solo la revisa el Director de DE; por ello para que sea adaptable, se genera una query para extraer el ID_trabajador de quien fuese el director de DE//

      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="select id_trabajador from trabajadores where area=8 and cargo_trabajador='Director';";
      $resultado=mysqli_query($enlace,$sentencia);
      $registro=mysqli_fetch_row($resultado);


      //la interfaz para el director de DE
      if ($ID_trabajador==$registro[0]) {

        $enlace=mysqli_connect("localhost","root","","viveamazonas");
        $sentencia="select distinct cod_concurso,nombre_concurso,tipo_monto from concursos where cod_concurso not in (select distinct cod_concurso from proyectos where concat(etapa_postulacion,Estado_postulacion) in ('1Por revisar','2Por revisar','3Por revisar'));";
        $resultado =mysqli_query($enlace,$sentencia);
        $numFilas = mysqli_num_rows($resultado);

        if ($numFilas==0) {
          echo "Se dan los siguientes casos:";
          echo "<br>";
          echo "1. No hay proyectos que hayan llegado por entero a la etapa 4";
          echo "<br>";
          echo "2. Hay proyectos que han llegado a la etapa 4 pero aún quedan por evaluar los restantes del concurso";
          echo "<br>";
          echo "Nota: recordar que la elección de la etapa 4 sólo se dará cuando se tengan e resultado de todos los proyectos de un concurso hasta su llegada a la etapa 4 o rechazo en alguna etapa previa";
        }

        elseif ($numFilas > 0) {

          echo "<table border=1>";
          echo "	<tr>";
          echo "		<td>Código de concurso</td>";
          echo "		<td>Nombre de concurso</td>";
          echo "		<td>Tipo de concurso</td>";
          echo "    <td>Acciones</td>";
          echo "	</tr>";


          for ($i=1; $i <=$numFilas ; $i++) {

            $registro = mysqli_fetch_row($resultado);
            echo "	<tr>";
            echo "		<td>",$registro[0],"</td>";
            echo "		<td>",$registro[1],"</td>";
            echo "		<td>",$registro[2],"</td>";
            echo "		<td> <a href='elegir_ganadores.php?cod_concurso=$registro[0]&nombre_concurso=$registro[1]'>Elegir proyectos ganadores </a> </td>";
            echo "	</tr>";
          }
        }
      }

      else {
        echo "Por generar pantalla para los demas miembros de DE";
      }
    }
    ?>
</body>

</html>
