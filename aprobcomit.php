<html>
      <head>
      </head>
      <body>
      <?php
      $etapa_concurso=$_GET['etapa_concurso'];
      $cod_concurso=$_GET['cod_concurso'];
      $nombre_concurso=$_GET['nombre_concurso'];

      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="select etapa_concurso,cod_concurso, from concursos;";
      mysqli_query($enlace,$sentencia);

if (aprobacion==1) {
$etapa_concurso
$sentencia="update concursos SET etapa_concurso=$etapa_concurso where cod_concurso='$cod_concurso';";

elseif (aprobacion==0)

$enlace=mysqli_connect{"localhost","root","","viveamazonas"}
$sentencia="delete from concursos where cod_concurso='$cod_concurso';";
mysqli_query($enlace,$sentencia);


header ("Location:aprobacioncomites.php");
      ?>

      </body>
</html>
