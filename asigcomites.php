<html>

<head>
</head>

<body>
  <?php
              session_start();
              $cod_concurso = $_GET["cod_concurso"];
              $persona1=$_POST["persona1"];
              $persona2=$_POST["persona2"];
              $persona3=$_POST["persona3"];
              $persona4=$_POST["persona4"];
              $persona21=$_POST["persona21"];
              $persona22=$_POST["persona22"];
              $persona23=$_POST["persona23"];
              $persona24=$_POST["persona24"];
              $persona25=$_POST["persona25"];


              $enlace=mysqli_connect("localhost","root","","viveamazonas");
              for ($i=1; $i <= 4; $i++) {
                $id_personal_temp1 =  ${"persona".$i};
                $sentencia="INSERT INTO asignacion_comite (ID_Trabajador,ID_Comite,codigo_concurso)
 VALUE ($id_personal_temp1 ,1,'{$cod_concurso}'); ";
                mysqli_query($enlace,$sentencia);
              }

              for ($i=1; $i <= 5; $i++) {
                $id_personal_temp2 = ${"persona2".$i};
                $sentencia="INSERT into asignacion_comite (ID_Trabajador,ID_Comite,codigo_concurso)
 VALUE ( $id_personal_temp2,2,'{$cod_concurso}') ;";
                mysqli_query($enlace,$sentencia);
              }


              // header("Location:listaconcursos.php");
          ?>
</body>


</html>
