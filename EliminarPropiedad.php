<?php
$id_propiedad = $_GET['id_propiedad'];
include("Conexion.php");

$sql = "DELETE FROM propiedades WHERE id_propiedades = '" . $id_propiedad . "'";
$resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query

if ($resultado) {
    echo "<script language='JavaScript'>
        alert('La propiedad se eliminó con éxito');
        window.location.assign('Propiedades.php'); // Corregido location.assign
        </script>";
} else {
    echo "<script language='JavaScript'>
        alert('La propiedad no se eliminó');
        window.location.assign('Propiedades.php'); // Corregido location.assign
        </script>";
}
?>
