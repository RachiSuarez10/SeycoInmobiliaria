<?php
$id_contrato = $_GET['id_contrato'];
include("Conexion.php");




$consultarIdPropiedad = "SELECT estado_contrato, id_propiedades FROM contratos WHERE id_contrato='" . $id_contrato . "'";
$resultadoIdPropiedad = mysqli_query($conexion, $consultarIdPropiedad);
$idPropiedad = mysqli_fetch_assoc($resultadoIdPropiedad);

$id_propiedadActual = $idPropiedad['id_propiedades'];
$estadoCotrato = $idPropiedad['estado_contrato'];

if ($estadoCotrato == 'Activo') {

    echo "<script language='JavaScript'>
    alert('El contrato no se puede eliminar por que esta activo');
    window.location.assign('Contratos.php'); // Corregido location.assign
    </script>";
} else {

    $sql = "DELETE FROM contratos WHERE id_contrato = '" . $id_contrato . "'";
    $resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query




    if ($resultado) {


        echo "<script language='JavaScript'>
        alert('El contrato se eliminó con éxito');
        window.location.assign('Contratos.php'); // Corregido location.assign
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('El contrato no se puede eliminar por que tiene datos en pagos');
        window.location.assign('Contratos.php'); // Corregido location.assign
        </script>";
    }
}
?>