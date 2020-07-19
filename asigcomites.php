
<html>
      <head>
      </head>

      <body>
          <?php
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

              $sentencia="INSERT into asignacion_comite VALUES ('$persona1','$persona2','$persona3','$persona4','$persona5','$persona21','$persona22','$persona23','$persona24','$persona25')";
              mysqli_query($enlace,$sentencia);

              header("Location:listaconcursos.php");
          ?>
      </body>


</html>
