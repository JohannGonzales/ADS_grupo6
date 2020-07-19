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
    ?>

    <h1>Asignación de comités</h1>
    <h2>Comité CTI y CTE</h2>
    <br> <br>
    <form action="asigcomites.php" method="POST">
        <div style="display:inline">
            <div style="display:inline">
                <?php
                $enlace=mysqli_connect("localhost","root","","viveamazonas");
                $sentencia="SELECT ID_Trabajador,count(*) from asignacion_comite where ID_Comite='1' group by ID_Trabajador";
                $resultado=mysqli_query($enlace,$sentencia);
                $numFilas=mysqli_num_rows($resultado);

                if ($numFilas==0){
                    echo "No existen trabajadores <br>";
                }
                else{
                    echo "<table border=1>";
                    echo "  <tr>";
                    echo "      <td>id_trabajador</td>";
                    echo "      <td>count*</td>";

                    echo "  <tr>";

                    for ($i=1; $i <= $numFilas; $i++){
                    $registro=mysqli_fetch_row($resultado);
                    echo "  <tr>";
                    echo "      <td>",$registro[0],"</td>";
                    echo "      <td>",$registro[1],"</td>";
                    echo "  </tr>";
                }
                echo "</table>";
                    }
                ?>
            </div>

            <div style="display:inline">
                <h2> Conformar comité CTI </h2>

                <p>Persona 1:</p>
                <input name="persona1" type="text">
                <p>Persona 2:</p>
                <input name="persona2" type="text">
                <p>Persona 3: </p>
                <input name="persona3" type="text">
                <p>Persona 4: </p>
                <input name="persona4" type="text">

            </div>
            <br>

            <div>

                <?php
                    $enlace=mysqli_connect("localhost","root","","viveamazonas");
                    $sentencia="SELECT id_trabajador,count(*) from asignacion_comite where ID_Comite=2 group by ID_Trabajador";
                    $resultado=mysqli_query($enlace,$sentencia);
                    $numFilas=mysqli_num_rows($resultado);

                    if ($numFilas==0){
                        echo "No existen trabajadores asignados <br>";
                    }
                    else{
                        echo "<table border=1>";
                        echo "  <tr>";
                        echo "      <td>id_trabajador</td>";
                        echo "      <td>count*</td>";
                        echo "  <tr>";

                        for ($i=1; $i <= $numFilas; $i++){
                        $registro=mysqli_fetch_row($resultado);
                        echo "  <tr>";
                            echo "      <td>",$registro[0],"</td>";
                            echo "      <td>",$registro[1],"</td>";
                            echo "  </tr>";
                        }
                        echo "</table>";
                    }
                ?>
            </div>

            <div>
                Conformar comité CTE
                <p>Persona 1:</p>
                <input name="persona21" type="text">
                <p>Persona 2:</p>
                <input name="persona22" type="text">
                <p>Persona 3: </p>
                <input name="persona23" type="text">
                <p>Persona 4: </p>
                <input name="persona24" type="text">
                <p>Persona 5: </p>
                <input name="persona25" type="text">

            </div>

        </div>
        <input type="submit">
    </form>
</body>

</html>
