<?php include("cabecera.php");?>
    <?php

    include("Conexion.php");
    $sql="SELECT pa.id_contrato, cl.nombre_completo_cliente,pro.direccion, pa.monto_pago, pa.fecha_registro
    FROM pagos as pa
    JOIN contratos as c 
    ON pa.id_contrato = c.id_contrato
    JOIN cliente as cl 
    ON pa.id_cliente = cl.id_cliente
    JOIN propiedades as pro
    ON pa.id_propiedades = pro.id_propiedades
    ";

    $resultado = mysqli_query($conexion, $sql);

    ?>

    <h1>Lista de pagos</h1>
    <a href="AgregarPago.php">agregar nuevo pago</a>

    

    <table>
        <thead>
            <tr>
                <th>N° de contrato</th>
                <th>Nombre del cliente</th>
                <th>direccion</th>
                <th>Monto del pago</th>
                <th>Fecha de pago</th>
                <th>Acciones</th>
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
                <td>
                    <?php echo "<a href='EditarPago.php?id_contrato=".$fila['id_contrato']."'>Editar</a>"; ?>
                    -
                    <?php echo "<a href='EliminarPago.php?id_contrato=".$fila['id_contrato']."'>Eliminar</a>"; ?>
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
</htm