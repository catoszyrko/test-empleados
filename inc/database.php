<?php

$host = 'localhost';
$user = 'tu_usuario';
$password = 'tu_contraseña';
$database = 'empleadosdb';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>