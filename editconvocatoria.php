<html>
  <head>
  </head>
    <body>
      <?php>
      $cod_concurso=$_POST["cod_concurso"];
      $nombre_concurso=$_POST["nombre_concurso"];
      $fecha_postulacion_inicio=$_POST["fecha_postulacion_inicio"];
      $fecha_postulacion_fin=$_POST["fecha_postulacion_fin"];
      $bases_concurso=$_POST["bases_concurso"];
      $anuncio_concurso=$_POST["anuncio_concurso"];
      $tipo_monto=$_POST["tipo_monto"];


      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="update set
                  cod_concurso='$cod_concurso',
                  nombre_concurso='$nombre_concurso',
                  fecha_postulacion_inicio='$fecha_postulacion_inicio',
                  fecha_postulacion_fin='$fecha_postulacion_fin',
                  bases_concurso='$bases_concurso',
                  anuncio_concurso='$anuncio_concurso',
                  tipo_monto='$tipo_monto'";

      mysqli_query($enlace,$sentencia);
      header ("Location:listaconcursos.php");
      ?>
    </body>
</html>
