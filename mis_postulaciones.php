<?php

session_start();

$ID_perfil=$_SESSION['Perfil'];//extraerlo de variable la sesion;
$ID_usuario=$_SESSION['ID'];

if ($ID_perfil==1) {

$enlace=mysqli_connect("localhost","root","","viveamazonas");
$sentencia="select a.cod_postulacion,a.nombre_proyecto,b.nombre_concurso,a.etapa_postulacion,a.Estado_postulacion,a.fecha_postulacion,a.fecha_fin from proyectos a inner JOIN concursos b on b.cod_concurso=a.cod_concurso where a.cod_postulante='$ID_usuario';";
$resultado=mysqli_query($enlace,$sentencia);
$numFilas = mysqli_num_rows($resultado);

echo "<table border=1>";
echo "	<tr>";
echo "		<td>Código de postulación</td>";
echo "		<td>Nombre de proyecto</td>";
echo "		<td>Nombre de concurso</td>";
echo "		<td>Etapa de postulación</td>";
echo "		<td>Estado de postulación</td>";
echo "		<td>Fecha inicio de postulación</td>";
echo "		<td>Fecha fin de postulación </td>";
echo "		<td>Revisar comentarios </td>";
echo "	</tr>";

for ($i=1; $i <=$numFilas ; $i++) {

  $registro = mysqli_fetch_row($resultado);
  echo "	<tr>";
  echo "		<td>",$registro[0],"</td>";
  echo "		<td>",$registro[1],"</td>";
  echo "		<td>",$registro[2],"</td>";
  echo "		<td>",$registro[3],"</td>";
  echo "		<td>",$registro[4],"</td>";
  echo "		<td>",$registro[5],"</td>";
  echo "		<td>",$registro[6],"</td>";
  echo "		<td> <a href='ver_comentarios.php?codpostulacion=$registro[0]'>Ver </a> </td>";
  echo "	</tr>";
}

}


?>
