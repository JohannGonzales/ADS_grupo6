<html>

<head>
</head>

<body>

  <div class="w3-container w3-black w3-leftbar w3-border-light-green">
    <h1 style="">Intranet ViveAmazonas</h1>
  </div>
  <?php
        session_start(); //inicio de sesión
        if (!isset($_SESSION["ID"])) {
            session_destroy();
            echo "<br><br> <font color='red'>Intento de acceso sin autorización!!!</font>";
            exit;
        }
        else {
            include("cinta_de_opciones.php");
        }

        $cod_concurso = $_GET["cod_concurso"];

    ?>



  <form action="asigcomites.php?cod_concurso=<?php echo $cod_concurso; ?>" method="POST">
    <div style="display:inline">
      <div style="display:inline">
        <h2> Conformar comité CTI </h2>

        <?php


                $enlace=mysqli_connect("localhost","root","","viveamazonas");
                $sentencia="SELECT a.ID_Trabajador,b.nombre_trabajador,count(*)from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where ID_Comite= 1 group by a.ID_Trabajador ";
                $resultado=mysqli_query($enlace,$sentencia);
                $numFilas=mysqli_num_rows($resultado);

                if ($numFilas==0){
                    echo "No existen trabajadores <br>";
                }
                else{
                    echo "<table border=1>";
                    echo "  <tr>";
                    echo "      <td>ID_trabajador</td>";
                    echo "      <td>Nombre</td>";
                    echo "      <td>Carga de trabajo</td>";

                    echo "  <tr>";

                    for ($i=1; $i <= $numFilas; $i++){
                    $registro=mysqli_fetch_row($resultado);
                    echo "  <tr>";
                    echo "      <td>",$registro[0],"</td>";
                    echo "      <td>",$registro[1],"</td>";
                    echo "      <td>",$registro[2],"</td>";
                    echo "  </tr>";
                }
                echo "</table>";
                    }
                ?>
      </div>

      <div style="display:inline">
        <br>
        Integrante 1: <input name="persona1" type="text"><br>
        Integrante 2: <input name="persona2" type="text"><br>
        Integrante 3: <input name="persona3" type="text"><br>
        Integrante 4: <input name="persona4" type="text"><br>

      </div>
      <br>

      <div>
        <h2>Conformar comité CTE</h2>

        <?php
                    $enlace=mysqli_connect("localhost","root","","viveamazonas");
                    $sentencia="SELECT a.ID_Trabajador,b.nombre_trabajador,count(*)from asignacion_comite a inner join trabajadores b on b.ID_Trabajador=a.ID_Trabajador where ID_Comite='2' group by a.ID_Trabajador";
                    $resultado=mysqli_query($enlace,$sentencia);
                    $numFilas=mysqli_num_rows($resultado);

                    if ($numFilas==0){
                        echo "No existen trabajadores asignados <br>";
                    }
                    else{
                        echo "<table border=1>";
                        echo "  <tr>";
                        echo "      <td>ID_trabajador</td>";
                        echo "      <td>Nombre</td>";
                        echo "      <td>Carga de trabajo</td>";
                        echo "  <tr>";

                        for ($i=1; $i <= $numFilas; $i++){
                        $registro=mysqli_fetch_row($resultado);
                        echo "  <tr>";
                            echo "      <td>",$registro[0],"</td>";
                            echo "      <td>",$registro[1],"</td>";
                            echo "      <td>",$registro[2],"</td>";
                            echo "  </tr>";
                        }
                        echo "</table>";
                    }
                ?>
      </div>

      <div>
        <br>
        Integrante 1: <input name="persona21" type="text"><br>
        Integrante 2: <input name="persona22" type="text"><br>
        Integrante 3: <input name="persona23" type="text"><br>
        Integrante 4: <input name="persona24" type="text"><br>
        Integrante 5: <input name="persona25" type="text"><br>
      </div>

    </div>
    <br><br> <input value ="Crear convocatoria pendiente de aprobación" type="submit">
  </form>
</body>

</html>
