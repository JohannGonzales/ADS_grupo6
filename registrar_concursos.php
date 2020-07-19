<html>

<head>

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


    <h1>Registrar concurso</h1>
    <br><br>
    <form action="nuevoconcurso.php" method="POST">
        <p>Código del concurso:</p>
        <input name="cod_concurso" type="text">
        <p>Nombre del concurso:</p>
        <input name="nombre_concurso" type="text">

        <!-- AUTOMÁTICO AL APROBARSE EL CONCURSO -->
        <!-- <p>Fecha de inicio de postulación: </p>
        <input name="fecha_postulacion_inicio" type="text"> -->


        <!-- <p>Fecha de fin de postulación: </p>
        <input name="fecha_postulacion_fin" type="text"> -->


        <!-- subir archivos -->
        <!-- <p>Bases del concurso: </p>
        <input name="bases_concurso" type="text">
        <p>Anuncio de concurso: </p>
        <input name="anuncio_concurso" type="text"> -->

        <p>Monto a financiar: </p>
        <input name="monto" type="text">




        <!-- <p>Comité CTI: </p> -->
        <!-- <input name="idcomitecti" type="text"> ojito}

        <p>Comité CTE: </p>
        <input name="idcomitecte" type="text"> ojito -->
        <br><br>
        <input type="submit" value="Grabar">
    </form>
</body>

</html>
