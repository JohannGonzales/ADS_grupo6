<html>
      <head>
      </head>

      <body>
            <h1>Lista de concursos y comités por aprobar</h1>
            <br> <br>
            <form action="aprobcomit.php" method="POST">
            <?php
                  $enlace=mysqli_connect{"localhost","root","","nombreBD"}
                  $sentencia="select cod_concurso,nombre_concurso from nombredelatabla;";
                  $resultado=mysqli_query($enlace,$sentencia);
                  $numfilas=mysqli_num_rows($resultado);

                  if ($numFilas==0){
                    echo "No existen concursos registrados <br>";
                  }
                  else{
                      echo "<table border=1>";
                      echo "  <tr>";
                      echo "      <td>cod_concurso</td>";
                      echo "      <td>nombre_concurso</td>";

                      echo "  <tr>";

                      for ($i=1; $i <= $numFilas; $i++){
                          $registro=mysqli_fetch_row($resultado);
                          echo "  <tr>";
                          echo "      <td>",$registro[0],"</td>";
                          echo "      <td>",$registro[1],"</td>";
                          echo        <td><a href='aprobcomit.php'?cod_concurso=$registro[0]>Aprobar</a><a href='eliminarconvocatoria.php'?cod_concurso=$registro[0]>Eliminar</td>;
                          echo "  </tr>";
                      }
                      echo "</table>";
                  }
              ?>
            </form>
      </body>
</html>