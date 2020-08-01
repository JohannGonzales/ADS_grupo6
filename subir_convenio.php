<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset='utf-8'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/miestilo.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/formats.css" type="text/css">
  <title> Intranet ViveAmazonas</title>
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
			else{
				include("cinta_de_opciones.php");
			}
      ?>
  <!-- <div style="text-align:center">
    <div class="anuncio_postulacion_div" style="">
    </div>
  </div> -->
<?php
  $usuario=$_SESSION["ID"];
  $cod_postulacion=$_POST["cod_postulacion"];
  //datos del arhivo
  $tipo_archivo = $_FILES['convenio']['type'];
  $tamano_archivo = $_FILES['convenio']['size'];
  $error_archivo= $_FILES['convenio']['error'];
  $permitidos =  array("application/pdf");
  $limite_kb=100000;
  $ruta='doc_vive_amazonas/Postulaciones/'.$cod_postulacion.'/';
  $nombre_archivo = $ruta.'convenio.pdf';
  //datos de donde se almaceran
  if ($error_archivo>0) {
    echo "Error al cargar archivo";
  }
  else {

    if (in_array($tipo_archivo,$permitidos) && $tamano_archivo<=$limite_kb*1024) {

      if (!file_exists($ruta)) {
        mkdir($ruta);
      }

      if (!file_exists($nombre_archivo)) {

        $resultado=@move_uploaded_file($_FILES['convenio']['tmp_name'],$nombre_archivo);

        if ($resultado) {
          echo "archivo guardado";
        }
        else {
          echo "error al guardar el archivo";
        }
      }
    }
    else {
      echo "Archivo no permitido o excede el tamaño";
    }
  }
  $enlace=mysqli_connect("localhost","root","","viveamazonas");
  $query="update proyectos set Estado_postulacion='Por suscribir' where cod_postulacion='$cod_postulacion';";
  mysqli_query($enlace,$query);

header('location:negociacion_negociacion.php');
  ?>
