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
  <div style="text-align:center">
    <div class="anuncio_postulacion_div" style="">

      <br>
      <br>
      <br>

      <a href="negociacion_invitacion.php" method="POST">
        <button class="w3-btn w3-ripple w3-black">Invitacion </button>
      </a>

      <br>
      <br>

      <a href="negociacion_negociacion.php" method="GET">
        <button class="w3-btn w3-ripple w3-grey" type="submit">Negociacion</button>
      </a>

      <br>
      <br>

      <a href="negociacion_suscripcion.php" method="post">
        <button class="w3-btn w3-ripple w3-red" type="submit">Suscripción</button>
      </a>

    </div>
  </div>

</body>

</html>
