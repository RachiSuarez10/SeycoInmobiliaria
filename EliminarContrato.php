<?php
$id_contrato = $_GET['id_contrato'];
include("Conexion.php");

$sql = "DELETE FROM contratos WHERE id_contrato = '" . $id_contrato . "'";
$resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query

if ($resultado) {
    echo "<script language='JavaScript'>
        alert('El contrato se eliminó con éxito');
        window.location.assign('Contratos.php'); // Corregido location.assign
        </script>";
} else {
    echo "<script language='JavaScript'>
        alert('El contrato no se eliminó');
        window.location.assign('Contratos.php'); // Corregido location.assign
        </script>";
}
?>
