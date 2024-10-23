<?php
// Agregar los datos de conexión a nuestra Base De Datos
$servername = "servidor";
$username = "Usuario";
$password = "Password";
$dbname = "NombreBBDD";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
