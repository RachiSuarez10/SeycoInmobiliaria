<?php
include("Conexion.php");

// Obtiene la fecha actual
$fechaActual = date("Y-m-d");

// Consulta las propiedades que han alcanzado la fecha de finalización
$sql = "SELECT id_contrato FROM contratos WHERE estado = 'Activo' AND fecha_finalizacion <= '$fechaActual'";
$result = mysqli_query($conexion, $sql);

// Actualiza el estado de las propiedades a 'Inactivo'
while ($row = mysqli_fetch_assoc($result)) {
    $idPropiedad = $row['id_contrato'];
    $sqlUpdate = "UPDATE contratos SET estado = 'Inactivo' WHERE contratos = $idPropiedad";
    mysqli_query($conexion, $sqlUpdate);
}

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
