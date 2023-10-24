<?php
include("Conexion.php");

// Recibir datos de Android (por ejemplo, mediante POST)
$nombre_us = $_POST['nombre'];
$nombre_usuario = $_POST['nombre_usuario'];
$pass = $_POST['pass'];
$tipo_usuario = $_POST['tipo_usuario'];


// Consulta SQL de inserción
$sql = "INSERT INTO usuarios (nombre_us, nombre_usuario, pass, tipo_usuario) VALUES ('$nombre_us', '$nombre_usuario', '$pass', '$tipo_usuario')";


// Ejecutar la consulta de inserción
if ($conexion->query($sql) === TRUE) {
    echo "Registro insertado exitosamente.";
} else {
    echo "Error al insertar registro: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();

?>