<?php
$id_cliente = $_GET['id_cliente'];
include("Conexion.php");

$sql = "DELETE FROM cliente WHERE id_cliente = '" . $id_cliente . "'";
$resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query

if ($resultado) {
    echo "<script language='JavaScript'>
        alert('El cliente se eliminó con éxito');
        window.location.assign('Cliente.php'); // Corregido location.assign
        </script>";
} else {
    echo "<script language='JavaScript'>
        alert('El cliente no se eliminó');
        window.location.assign('Cliente.php'); // Corregido location.assign
        </script>";
}
?>
