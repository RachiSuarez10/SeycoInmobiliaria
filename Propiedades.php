<?php include("cabecera.php");?>



    <?php
    

    include("Conexion.php");
    $sql="SELECT id_propiedades, direccion,tipo_propiedad, precio, estado FROM propiedades";

    $resultado = mysqli_query($conexion, $sql);

    ?>

    <h1>Lista de propiedades</h1>
    <a href="AgregarPropiedad.php">agregar nueva propiedad</a>

    

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>direccion</th>
                <th>tipo de propiedad</th>
                <th>precio</th>
                <th>estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($fila = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo $fila['id_propiedades']?></td>
                <td><?php echo $fila['direccion']?></td>
                <td><?php echo $fila['tipo_propiedad']?></td>
                <td><?php echo $fila['precio']?></td>
                <td><?php echo $fila['estado']?></td><td>

                    <?php echo "<a href='EditarPropiedad.php?id_propiedades=".$fila['id_propiedades']."'>Editar</a>"; ?>
                    -
                    <?php echo "<a href='EliminarPropiedad.php?id_propiedad=".$fila['id_propiedades']."'>Eliminar</a>"; ?>
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