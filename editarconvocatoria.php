<html>

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
    <h1> Modificación de los datos de la convocatoria </h1>

    <?php
     $cod_concurso=$_GET["cod_concurso"];

     $enlace=mysqli_connect("localhost","root","","viveamazonas");
     $sentencia="select * from concursos where cod_concurso='$cod_concurso';";
     $resultado=mysqli_query($enlace,$sentencia);
     $fila=mysqli_fetch_row($resultado);
     echo "<form action='editconvocatoria.php' method='POST'><br>";
     echo "Código del concurso:<br> <input name='cod_concurso' type='text' value='$fila[0]'><br>";
     echo "Nombre del concurso:<br> <input name='nombre_concurso' type='text' value='$fila[1]'><br>";
     echo "Fecha de inicio de postulación:<br> <input name='fecha_postulacion_inicio' type='text' value='$fila[2]'><br>";
     echo "Fecha de fin de postulación:<br> <input name='fecha_postulacion_fin' type='text' value='$fila[3]'><br>";
     echo "Bases del concurso:<br> <input name='bases_concurso' type='text' value='$fila[4]'><br>";
     echo "Anuncio de convocatoria:<br> <input name='anuncio_concurso' type='text' value='$fila[5]'><br>";
     echo "Monto a financiar:<br> <input name='tipo_monto' type='text' value='$fila[6]'><br>";
     // echo "Comité CTI:<input name='id_comite_cti' type='text' value='$fila[7]'>"; este no se si hay en sql
     // echo "Comité CTE:<input name='id_comite_cte' type='text' value='$fila[8]'>"; x2
     echo "<input type='submit' value='Grabar'>";
     echo "</form>";
    ?>
</body>

</html>
