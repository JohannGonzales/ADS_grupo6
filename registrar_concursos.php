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

  <?php
  $enlace = mysqli_connect("localhost","root","","viveamazonas");
  $query = "SELECT cod_concurso, nombre_concurso FROM `concursos` ";
  $resultado = mysqli_query($enlace,$query);
  $num_rows = mysqli_num_rows($resultado);
  $cod_concurso = "CON-0".($num_rows +1);
  ?>

  <form action="nuevoconcurso.php?cod_concurso=<?php echo $cod_concurso ?>" method="POST" enctype="multipart/form-data">

    <p>Nombre del concurso:</p>
    <input name="nombre_concurso" type="text">

    <p>Monto a financiar: </p>
    <input name="monto" type="text">


    <p>Bases del concurso: </p>
    <input name="bases_concurso" type="file">

    <p>Anuncio de concurso: </p>
    <input name="anuncio_concurso" type="file">

    <!-- <p>Comité CTI: </p> -->
    <!-- <input name="idcomitecti" type="text"> ojito}

        <p>Comité CTE: </p>
        <input name="idcomitecte" type="text"> ojito -->
    <br><br>
    <input type="submit" value="Grabar">
  </form>
</body>

</html>
