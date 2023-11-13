<?php
session_start();
// Conectar a la base de datos (cambia las credenciales según tu configuración)
$conexion = new mysqli("localhost", "flor", "segui2323", "florbasededatos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario de inicio de sesión
$nombre = $_POST["nombre"];
$password = $_POST["password"];

// Buscar al usuario en la base de datos
$consulta = "SELECT id, nombre, password FROM usuario WHERE nombre = '$nombre'";
$resultado = $conexion->query($consulta);

if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($password, $fila["password"])) {
        // Inicio de sesión exitoso
        $_SESSION["usuario"] = $nombre;
        header("Location: http://localhost/luzutv"); // Redirige a una página de panel o dashboard
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Nombre de usuario no encontrado.";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
