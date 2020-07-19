<html>
  <head>
  </head>
  <body>
      <?php
      $cod_concurso=$GET["cod_concurso"];
      $enlace=mysqli_connect{"localhost","root","","nombreBD"}
      $sentencia="delete from nombredelatabla where cod_concurso='$cod_concurso';";
      mysqli_query($enlace,$sentencia);
      header ("Location:aprobacioncomites.php");
      ?>
    </body>
</html>
