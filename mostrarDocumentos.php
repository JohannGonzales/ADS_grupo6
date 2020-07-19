<html>
	<head>
		
	</head>

	<body>
		
		<h1>Relación de documentos</h1>
		<br><br>
		<form action = "nuevoCliente.html" method="POST">
			<?php
				/*La funcion de enlace necesita: Servidor de BD, usuario de BD, Contraseña BD, nombre BD*/
				$enlace = mysqli_connect("localhost","root","","help"); 
				
				/*Sentencia de consulta - SELECT*/
				$sentencia = "select tipoDoc,nroDoc,nombres,apellidos,genero from cliente order by tipoDoc,nombres;";
				
				/*La funcion de ejecucion de query necesita: el enlace a BD, la sentencia (query)*/
				$resultado = mysqli_query($enlace,$sentencia);
				/*Cuenta los registros que hay en la tabla */
				$numFilas = mysqli_num_rows($resultado);
				
				if ($numFilas == 0) {
					echo "No existen clientes registrados <br>";
				}
				else {
					echo "<table border=1>";
					echo "	<tr>";
					echo "		<td>Documento</td>";
					echo "		<td>Acciones</td>";
					echo "	</tr>";
			
					/*Estoy definiendo una iteración*/
					for ($i=1; $i <= $numFilas; $i++){
						/*Esta función permite obtener un registro (fila) del resultado de un query*/
						$registro = mysqli_fetch_row($resultado);
						echo "	<tr>";
						echo "		<td>",$registro[0],"</td>";
						echo "		<td><a href='editarCliente.php?nroDoc=$registro[0]'>Editar</a> <a href='eliminarCliente.php?nroDoc=$registro[0]'>Eliminar</a></td>";
					/*a href... permite que actue como link  */
					/*para editar necesito saber el dato que me pasará el sistema ¿como sabra q registro editar?.....*/
						echo "	</tr>";					
					}
					echo "</table>";
				}
			?>
			<br><br>
			<input type="submit" value="Nuevo">
		</form>
	</body>
</html>