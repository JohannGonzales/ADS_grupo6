<html>

<head>
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
                  }
              ?>

    <br>
    <br>
    <h1>Lista de concursos pendientes de aprobación</h1>
    <br> <br>
    <form action="registrar_concursos.php" method="POST">
        <?php
                  $enlace=mysqli_connect("localhost","root","","viveamazonas")  ;
                  $sentencia="SELECT cod_concurso, nombre_concurso,bases_concurso FROM concursos WHERE etapa_concurso = 0";
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
                      echo "      <td>estado</td>";
                      echo "      <td>Bases</td>";
                      echo "      <td>Anuncio</td>";

                      echo "  <tr>";

                      for ($i=1; $i <= $numFilas; $i++){
                          $registro=mysqli_fetch_row($resultado);
                          echo "  <tr>";
                          echo "      <td>",$registro[0],"</td>";
                          echo "      <td>",$registro[1],"</td>";
                          echo "      <td>",$registro[2],"</td>";
                          echo "		<td> <a href='doc_vive_amazonas/Concursos/$registro[0]/bases_concurso.pdf' download> Descargar </a> </td>";
                          echo "		<td> <a href='doc_vive_amazonas/Concursos/$registro[0]/anuncio_concurso.pdf' download> Descargar </a> </td>";

                          if ($_SESSION["Perfil"]==4){
                            echo "       <td><a href='editarconvocatoria.php?cod_concurso=$registro[0]'>Editar</a>      <a href='eliminarconvocatoria.php?cod_concurso=$registro[0]'>Eliminar</a></td>";
                          } elseif ($_SESSION["Perfil"]==8) {
                            echo "       <td><a href='listaconcursos_aprobar.php?cod_concurso=$registro[0]&aprobar=1'>Aprobar</a>      <a href='listaconcursos_aprobar.php?cod_concurso=$registro[0]&aprobar=0'>Desaprobar</a></td>";
                          }

                          echo "  </tr>";
                      }
                      echo "</table>";
                  }
                  ?>
        <br><br>
        <input type="submit" value="Nuevo concurso">
    </form>
</body>

</html>
