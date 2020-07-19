<html>
  <head>
  </head>
  <body>
      <?php
      $cod_concurso=$_GET["cod_concurso"];
      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="DELETE FROM concursos where cod_concurso='$cod_concurso'";
      mysqli_query($enlace,$sentencia);
      header ("Location:listaconcursos.php");
      ?>
    </body>
</html>
