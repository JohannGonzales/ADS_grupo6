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
     echo "<form action='editconvocatoria.php?cod_concurso=$cod_concurso' method='POST' enctype='multipart/form-data'><br>";
     echo "Nombre del concurso:<br> <input name='nombre_concurso' type='text' value='$fila[1]'><br>";
     ?>

     <p>Bases del concurso: </p>
     <input name="bases_concurso" type="file">

     <p>Anuncio de concurso: </p>
     <input name="anuncio_concurso" type="file">
     <input type='submit' value='Grabar'>
     </form>
</body>

</html>
