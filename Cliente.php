<?php include("cabecera.php");?>

    <?php
   
    include("Conexion.php");
    $sql="SELECT id_cliente, nombre_completo_cliente,email, telefono FROM cliente";

    $resultado = mysqli_query($conexion, $sql);

    ?>
    


    <h1>Lista de clientes</h1>
    <a href="AgregarCliente.php">agregar nuevo cliente</a>

    

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>email</th>
                <th>telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($fila = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $fila['id_cliente']?></td>
                <td><?php echo $fila['nombre_completo_cliente']?></td>
                <td><?php echo $fila['email']?></td>
                <td><?php echo $fila['telefono']?></td><td>

                    <?php echo "<a href='EditarCliente.php?id_cliente=".$fila['id_cliente']."'>Editar</a>"; ?>
                    -
                    <?php echo "<a href='EliminarCliente.php?id_cliente=".$fila['id_cliente']."'>Eliminar</a>"; ?>
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
</ht