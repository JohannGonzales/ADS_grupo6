<html>

<head>
</head>

<body>


    <?php

        // generar codigo algoritmicamente
          // $cod_concurso=



        $nombre_concurso=$_POST["nombre_concurso"];

        // deifnir bajo lógica
        $fecha_postulacion_inicio=$_POST["fecha_postulacion_inicio"];
        $fecha_postulacion_fin=$_POST["fecha_postulacion_fin"];
        $monto=$_POST["monto"];

        if ($monto< 1000000) {
            $tipo_monto=1;
        }else {
            $tipo_monto=2;
        }

        // $idcomitecti=$_POST["idcomitecti"];
        // $idcomitecte=$_POST["idcomitecte"];

          $enlace=mysqli_connect("localhost","root","","viveamazonas");

          $sentencia="INSERT INTO concursos VALUES (NAN,'$nombre_concurso',$fecha_postulacion_inicio,$fecha_postulacion_fin,$bases_concurso,$anuncio_concurso,$tipo_monto,$lodelcit,$lodelcte)";
          mysqli_query($enlace,$sentencia);
        
          header("Location: nuevos.php");
    ?>


</body>


</html>
