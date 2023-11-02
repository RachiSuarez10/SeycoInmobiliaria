<?php include("cabecera.php"); ?>


<?php



include("Conexion.php");






$sql = "SELECT id_contrato, direccion,nombre_completo_cliente, fecha_inicio, fecha_finalizacion, monto_contrato, estado_contrato 
    FROM contratos as c 
    JOIN propiedades as p on c.id_propiedades = p.id_propiedades
    JOIN cliente as cl on c.id_cliente = cl.id_cliente";

$resultado = mysqli_query($conexion, $sql);

?>

<h1>Lista de contratos</h1>
<a href="AgregarContrato.php">agregar nuevo contrato</a>



<table>
    <thead>
        <tr>
            <th>id</th>
            <th>direccion</th>
            <th>Nombre del cliente</th>
            <th>Fecha de inicio</th>
            <th>Fecha de fin</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($fila = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
                <td>
                    <?php echo $fila['id_contrato'] ?>
                </td>
                <td>
                    <?php echo $fila['direccion'] ?>
                </td>
                <td>
                    <?php echo $fila['nombre_completo_cliente'] ?>
                </td>
                <td>
                    <?php echo $fila['fecha_inicio'] ?>
                </td>
                <td>
                    <?php echo $fila['fecha_finalizacion'] ?>
                </td>
                <td>
                    <?php echo $fila['monto_contrato'] ?>
                </td>
                <td>
                    <?php echo $fila['estado_contrato'] ?>
                </td>
                <td>

                    <?php echo "<a href='EditarContrato.php?id_contrato=" . $fila['id_contrato'] . "'>Editar</a>"; ?>
                    -
                    <?php echo "<a href='EliminarContrato.php?id_contrato=" . $fila['id_contrato'] . "'>Eliminar</a>"; ?>
                </td>
            </tr>
            <?php

        }

        ?>
    </tbody>
</table>

<?php
mysqli_close($conexion);
?>
<a href="index.php">Regresar</a>
</body>
</html>