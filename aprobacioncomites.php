<html>
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
                else {
                    include("cinta_de_opciones.php");
                } ?>

            <h1>Lista de concursos y comités por aprobar</h1>
            <form action="aprobcomit.php" method="POST">
            <?php
                  $enlace=mysqli_connect("localhost","root","","viveamazonas");
                  $sentencia="select cod_concurso,nombre_concurso,etapa_concurso from concursos;";
                  $resultado=mysqli_query($enlace,$sentencia);
                  $numFilas=mysqli_num_rows($resultado);

                  if ($numFilas==0){
                    echo "No existen concursos registrados <br>";
                  }
                  else{
                      echo "<table border=1>";
                      echo "  <tr>";
                      echo "      <td>cod_concurso</td>";
                      echo "      <td>nombre_concurso</td>";
                      echo "      <td>etapa_concurso</td>";
                      echo "  <tr>";

                      for ($i=1; $i <= $numFilas; $i++){
                          $registro=mysqli_fetch_row($resultado);
                          echo "  <tr>";
                          echo "      <td>",$registro[0],"</td>";
                          echo "      <td>",$registro[1],"</td>";
                          echo "      <td>",$registro[2],"</td>";
                          echo "      <td><a href='aprobcomit.php?cod_concurso=$registro[0]&aprobacion=1'>Aprobar</a>    <a href='eliminarconvocatoria.php'?cod_concurso=$registro[0]&aprobacion=0>Eliminar</td>;";
                          echo "  </tr>";
                      }
                      echo "</table>";
                  }
              ?>
            </form>
      </body>
</html>
