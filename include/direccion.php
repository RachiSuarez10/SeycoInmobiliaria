<?php
include('../Conexion.php');

$id_cliente = $_POST['id_cliente'];

$sql = "SELECT  c.id_propiedades, p.direccion
FROM contratos as c
JOIN propiedades as p ON c.id_propiedades = p.id_propiedades
JOIN cliente as cl ON c.id_cliente = cl.id_cliente
WHERE cl.id_cliente ='$id_cliente.' ORDER BY nombre_completo_cliente ASC ";

$resultado = mysqli_query($conexion, $sql);

$html = "<option value='0'>selecciona</option>";

while ($row = $resultado->fetch_assoc()) {
    $html .= "<option value='".$row['id_propiedades']."'>".$row['direccion']."</option>";
 
}

echo $html;



echo $dato;


?>