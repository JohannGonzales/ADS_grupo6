<html>
      <head>
      </head>
      <body>
      <?php
      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="update concursos SET etapa_concurso=$etapa_concurso where cod_concurso='$cod_concurso';";
      mysqli_query($enlace,$sentencia);
//actualizo la etapa en sql y se debe mostrar un msj que salga si esta aprob o por aprob
if ($etapa_concurso==4) {

      ?>

      </body>
</html>
