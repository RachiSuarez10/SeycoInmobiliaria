<?php
$id_contrato = $_GET['id_contrato'];
include("Conexion.php");




$consultarIdPropiedad= "SELECT id_propiedades FROM contratos WHERE id_contrato='".$id_contrato."'";
$resultadoIdPropiedad = mysqli_query($conexion,$consultarIdPropiedad);
$idPropiedad=mysqli_fetch_assoc($resultadoIdPropiedad);

$id_propiedadActual=$idPropiedad['id_propiedades'];

$sql = "DELETE FROM contratos WHERE id_contrato = '" . $id_contrato . "'";
$resultado = mysqli_query($conexion, $sql); // Utilizamos mysqli_query en lugar de mysql_query




if ($resultado) {

    $ActualizarEstado="UPDATE propiedades SET estado='Activo' WHERE id_propiedades ='".$id_propiedadActual."'";
    $Actualizado=mysqli_query($conexion, $ActualizarEstado);

    if ($Actualizado) {
      
    }else
    {
        echo "<script language='JavaScript'>
    alert('Ocurrio un error al altualizar el estado a Activo de la propiedad id'.$propiedad);
    window.location.assign('Contratos.php'); // Corregido location.assign
    </script>";
    }
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
?>
