<<?php

session_start();

$ID_perfil=$_SESSION['Perfil'];//extraerlo de variable la sesion;
$ID_usuario=$_SESSION['ID'];
$cod_postulacion=$_GET['cod_postulacion'];

if ($ID_perfil==1) {

$enlace=mysqli_connect("localhost","root","","viveamazonas");
$sentencia=

  echo $registro[0];

  echo "<table border=1>";
  echo "	<tr>";
  echo "		<td>Etapa del concurso</td>";
  echo "		<td>Estado</td>";
  echo "		<td>Comentarios</td>";
  echo "	</tr>";

  for ($i=1; $i <=$numFilas ; $i++) {

    $registro = mysqli_fetch_row($resultado);
    echo "	<tr>";
    echo "		<td>",$registro[0],"</td>";
    echo "		<td>",$registro[1],"</td>";
    echo "		<td>",$registro[2],"</td>";
    echo "	</tr>";
  }

}

?>
