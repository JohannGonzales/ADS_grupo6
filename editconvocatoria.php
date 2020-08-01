<html>

<head>
</head>

<body>
  <?php
      $cod_concurso=$_GET["cod_concurso"];
      $nombre_concurso=$_POST["nombre_concurso"];


      $enlace=mysqli_connect("localhost","root","","viveamazonas");
      $sentencia="UPDATE concursos SET nombre_concurso='$nombre_concurso' WHERE cod_concurso = '$cod_concurso' ;";

      mysqli_query($enlace,$sentencia);
      // header ("Location:listaconcursos.php");


              // SUBE EL ARCHIVOS bases_concurso
              $tipo_archivo = $_FILES['bases_concurso']['type'];
          		$tamano_archivo = $_FILES['bases_concurso']['size'];
          		$error_archivo= $_FILES['bases_concurso']['error'];
          		$permitidos =  array("application/pdf");
          		$limite_kb=100000;
          		$ruta='doc_vive_amazonas/Concursos/'.$cod_concurso.'/';
          		// $nombre_archivo = $ruta."$_FILES['bases_concurso']['name']";
          		$nombre_archivo = $ruta."bases_concurso.pdf";
          		//datos de donde se almaceran
          		if ($error_archivo>0) {
          			echo "Error al cargar archivo";
          		}
          		else {

          			if (in_array($tipo_archivo,$permitidos) && $tamano_archivo<=$limite_kb*1024) {

          				if (!file_exists($ruta)) {
          					mkdir($ruta);
          				}


          					$resultado=@move_uploaded_file($_FILES['bases_concurso']['tmp_name'],$nombre_archivo);

          					if ($resultado) {
          						echo "archivo guardado";
          					}
          					else {
          						echo "error al guardar el archivo";
          					}
          			}
          			else {
          				echo "Archivo no permitido o excede el tamaño";
          			}
          		}

              /////////////////////////////////////////////////////////////////////////////////////////

              // SUBE EL ARCHIVOS anuncio_concurso

              $tipo_archivo = $_FILES['anuncio_concurso']['type'];
          		$tamano_archivo = $_FILES['anuncio_concurso']['size'];
          		$error_archivo= $_FILES['anuncio_concurso']['error'];
          		$permitidos =  array("application/pdf");
          		$limite_kb=100000;
          		$ruta='doc_vive_amazonas/Concursos/'.$cod_concurso.'/';
          		// $nombre_archivo = $ruta."$_FILES['anuncio_concurso']['name']";
          		$nombre_archivo = $ruta."anuncio_concurso.pdf";
          		//datos de donde se almaceran
          		if ($error_archivo>0) {
          			echo "Error al cargar archivo";
          		}
          		else {

          			if (in_array($tipo_archivo,$permitidos) && $tamano_archivo<=$limite_kb*1024) {

          				if (!file_exists($ruta)) {
          					mkdir($ruta);
          				}


          					$resultado=@move_uploaded_file($_FILES['anuncio_concurso']['tmp_name'],$nombre_archivo);

          					if ($resultado) {
          						echo "archivo guardado";
          					}
          					else {
          						echo "error al guardar el archivo";
          					}
          			}
          			else {
          				echo "Archivo no permitido o excede el tamaño";
          			}
          		}
      ?>
</body>

</html>
