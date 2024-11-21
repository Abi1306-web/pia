<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css.css">
    <meta charset="utf-8"/>
    <title>Actualizar Datos</title> </head>
<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "Escuela"); // Conexión a la base de datos

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $resultado = mysqli_query($con, "SELECT * FROM alumnos");
    if ($resultado) {
        echo "<center><h1>Actualizar Datos</h1></center>";
        echo "<table border='1'>
            <tr>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
            </tr>";

            while ($row = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['Matricula'] . "</td>";
                echo "<td>" . (isset($row['Nombre']) ? $row['Nombre'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['Apellidos']) ? $row['Apellidos'] : 'N/A') . "</td>";
                echo "<td>" . (isset($row['Edad']) ? $row['Edad'] : 'N/A') . "</td>";
                echo "</tr>";
        }

        echo "</table>";
        echo "<br>El número de registros son: " . mysqli_num_rows($resultado);

        echo "<h3>Escribe la MATRÍCULA del Registro a editar</h3>";
        echo "<form action='actualizar2_datos.php' method='post'>";
        echo "Matricula: <input type='text' name='id' />";
        echo "<input type='submit' value='Editar' />";
        echo "</form>";
    } else {
        echo "Error en la consulta: " . mysqli_error($con);
    }

    mysqli_close($con);
    ?>
</body>
</html>