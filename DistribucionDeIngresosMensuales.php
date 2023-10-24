<?php include("cabecera.php");?>
<?php


$fecha=$_GET['mes'];



include("Conexion.php");
$sql="SELECT pa.id_contrato, cl.nombre_completo_cliente,pro.direccion, pa.monto_pago, pa.fecha_registro
FROM pagos as pa
JOIN contratos as c 
ON pa.id_contrato = c.id_contrato
JOIN cliente as cl 
ON pa.id_cliente = cl.id_cliente
JOIN propiedades as pro
ON pa.id_propiedades = pro.id_propiedades
WHERE DATE_FORMAT(pa.fecha_registro, '%m-%Y') ='".$fecha."'
ORDER BY monto_pago ASC ";

$resultado = mysqli_query($conexion, $sql);

?>


<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">seycolnmobiliaria</h1>
        <p class="lead"> Ingresos mensuales</p>
        <hr classmy-2>
       

    </div>

</div>
    

    <table>
        <thead>
            <tr>
                <th>N° de contrato</th>
                <th>Nombre del cliente</th>
                <th>direccion</th>
                <th>Monto del pago</th>
                <th>Fecha de pago</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($fila = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $fila['id_contrato']?></td>
                <td><?php echo $fila['nombre_completo_cliente']?></td>
                <td><?php echo $fila['direccion']?></td>
                <td><?php echo $fila['monto_pago']?></td>
                <td><?php echo $fila['fecha_registro']?></td>
                
            </tr>
            <?php

            }

            ?>
        </tbody>
    </table>

<?php
mysqli_close($conexion);
?>
<a href="index.php">Refresar</a>
<?php
include("piePagina.php");
?>