<meta charset="8"> <html>
<head>
<title>Consultar Alumnos</title>
<link rel="stylesheet" type="text/css" href="CSS.csSespecificamos el archivo CSS a coupe
<meta charset="utf-8"/>
<style type="text/css"></style>
</head>
<body> <center>
<?php
$con=mysqli_connect("localhost","root","", "alumnos");// se crea la conexión al servidor Sresultado tabla datos mysqli_query(Scon, "select from datos"); //consultamos el contenido de la
if (Sresultado === FALSE) {
echo "fallo";
die(mysqli_error()); // Muestra el error que ocurrió
}
echo "<center><font face="Arial>";
echo "<a href='consulta_alumnos.php'>Actualizar tabla</a>;
echo "<h1>Consulta de la tabla Datos</h1>";
echo "<table border='1'>
<th>Matricula</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Edad</th>
<tr>
</tr>";
 
while($row=mysqli_fetch_array($resultado)) //Muestra el contenido de cada alumno
{
echo "<tr>";
echo "<td align=center>".$row['id_matricula']."</td>";
echo "<td>".$row['nombre']."</td>";
echo "<td>".$row['apellidos']."</td>";
echo "<td align=center>".$row['edad']."</td>";
echo "</tr>";
}
echo "</table>";
$registros=mysqli_num_rows($resultado); echo "<br>Registros: ".$registros;
mysqli_close($con); //cerramos la conexión a la BD
?>
</center></body></html>