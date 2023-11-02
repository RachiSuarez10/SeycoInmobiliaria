<?php
$id_pago = $_GET['id_pago'];
include("Conexion.php");

$sql = "DELETE FROM pagos WHERE id_pago = '" . $id_pago . "'";
$resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query

if ($resultado) {
    echo "<script language='JavaScript'>
        alert('El pago se eliminó con éxito');
        window.location.assign('Pagos.php'); // Corregido location.assign
        </script>";
} else {
    echo "<script language='JavaScript'>
        alert('El pago no se eliminó');
        window.location.assign('Pagos.php'); // Corregido location.assign
        </script>";
}
?>
