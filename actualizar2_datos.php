<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "maestros");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the input from the form (Actualizar2_datos.php)
    $matricula = mysqli_real_escape_string($conn, $_POST['id']);

    // Prepare and execute the SQL query
    $stmt = mysqli_prepare($conn, "SELECT * FROM datos WHERE Matricula = ?");
    mysqli_stmt_bind_param($stmt, "i", $matricula);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Display the edit form with pre-filled data
        echo "<h2>Editar Alumno</h2>";
        echo "<form action='actualizar.php' method='post'>";
        echo "<input type='hidden' name='matricula' value='" . $row['Matricula'] . "'>";
        echo "Nombre: <input type='text' name='nombre' value='" . $row['Nombre'] . "'><br>";
        echo "Apellidos: <input type='text' name='apellidos' value='" . $row['Apellidos'] . "'><br>";
        echo "Edad: <input type='number' name='edad' value='" . $row['Edad'] . "'><br>";
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";
    } else {
        echo "Alumno no encontrado.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
</body>
</html>