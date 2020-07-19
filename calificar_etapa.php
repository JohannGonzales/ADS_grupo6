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

    <form action="calificar_etapa_.php" method="post">

        <?php
    $cod_postulacion=$_GET['cod_postulacion'];
    $cod_criterio=$_GET['cod_criterio'];
    $num_etapa=$_GET['num_etapa'];

// pantalla para criterios de la etapa 1
// se puede integrar todo mediante if con etapas pero es mejor separarlo para editar por si hubiera algo especial por etapa

    if ($num_etapa==1) {
      echo "<table border=1>";
      echo "<tr>";
        echo "<td>Descripción del criterio</td>";
        echo "<td>Incompleto</td>";
        echo "<td>Completo</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>Documentos completos</td>";
        echo "<td><input type='radio' name='puntaje' value=1></td>";
        echo "<td><input type='radio' name='puntaje' value=2></td>";
      echo "</tr>";
      echo "</table>";
      echo "<br><br>";
      echo "Comentario:<input type='text' name='comentario'>";
      echo "<br><br>";
      echo"<input type='submit'  value='Enviar calificación'>";

      echo"<input type='hidden' name='cod_postulacion' value='$cod_postulacion'>";
      echo"<input type='hidden' name='cod_criterio' value='$cod_criterio'>";
      echo"<input type='hidden' name='num_etapa' value='$num_etapa'>";

    }

// pantalla para criterios de la etapa 2

    else if ($num_etapa==2) {

      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="sELECT criterios_etapa FROM criterios_eva where codigo_criterio=$cod_criterio;";
      $resultado =mysqli_query($enlace,$sentencia);
      $registro = mysqli_fetch_row($resultado);

      echo "<table border=1>";
      echo "<tr>";
        echo "<td>Descripción del criterio</td>";
        echo "<td>No Elegible</td>";
        echo "<td>Elegible</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>",$registro[0],"</td>";
        echo "<td><input type='radio' name='puntaje' value=1></td>";
        echo "<td><input type='radio' name='puntaje' value=2></td>";
      echo "</tr>";
      echo "</table>";
      echo "<br><br>";
      echo "Comentario:<input type='text' name='comentario'>";
      echo "<br><br>";
      echo"<input type='submit'  value='Enviar calificación'>";
      echo"<input type='hidden' name='cod_postulacion' value='$cod_postulacion'>";
      echo"<input type='hidden' name='cod_criterio' value='$cod_criterio'>";
      echo"<input type='hidden' name='num_etapa' value='$num_etapa'>";

    }

    // pantalla para criterios de la etapa 3

    elseif ($num_etapa==3) {

      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="select criterios_etapa FROM criterios_eva where codigo_criterio=$cod_criterio;";
      $resultado =mysqli_query($enlace,$sentencia);
      $registro = mysqli_fetch_row($resultado);

      echo "<table border=1>";
      echo "<tr>";
        echo "<td>Descripción del criterio</td>";
        echo "<td>No aprueba</td>";
        echo "<td>Aprueba con errores</td>";
        echo "<td>Aprueba sin errores</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>",$registro[0],"</td>";
        echo "<td><input type='radio' name='puntaje' value=1></td>";
        echo "<td><input type='radio' name='puntaje' value=2></td>";
        echo "<td><input type='radio' name='puntaje' value=3></td>";
      echo "</tr>";
      echo "</table>";
      echo "<br><br>";
      echo "Comentario:<input type='text' name='comentario'>";
      echo "<br><br>";
      echo"<input type='submit'  value='Enviar calificación'>";
      echo"<input type='hidden' name='cod_postulacion' value='$cod_postulacion'>";
      echo"<input type='hidden' name='cod_criterio' value='$cod_criterio'>";
      echo"<input type='hidden' name='num_etapa' value='$num_etapa'>";
    }


    ?>

    </form>
</body>

</html>
