<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "extrascolares";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];

    // Preparar y ejecutar la consulta SQL para insertar datos
    $sql = "INSERT INTO administrad (nombre, apellido) VALUES ('$nombre', '$apellido')";

    if ($conn->query($sql) === TRUE) {
        echo "Datos ingresados correctamente en la base de datos.";
    } else {
        echo "Error al ingresar datos: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>