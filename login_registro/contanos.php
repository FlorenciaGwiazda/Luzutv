<?php
// Conectar a la base de datos (cambia las credenciales según tu configuración)
$conexion = new mysqli("localhost", "flor", "segui2323", "florbasededatos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario de registro
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$edad = $_POST["edad"];
$programa = $_POST["programa"];
$contanos = $_POST["contanos"];

// Insertar datos en la base de datos
$insertar = "INSERT INTO participar (nombre,email,edad, programa,contanos) VALUES ('$nombre','$email', '$edad','$programa','$contanos')";
if ($conexion->query($insertar) === TRUE) {
    echo "Envio exitoso.";
    header("Location: http://localhost/luzutv");
    return;
} else {
    echo "Error: " . $insertar . "<br>" . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
