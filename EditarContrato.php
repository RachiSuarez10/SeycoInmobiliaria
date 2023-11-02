<?php include("cabecera.php");
include("Conexion.php"); ?>

<?php

if (isset($_POST['enviar'])) {
    //aqui entra cuando preciona el voton enviar
    $id_contrato = $_POST['id_contrato'];
    $id_propiedad = $_POST['seleccionarPropiedad'];
    $id_cliente = $_POST['seleccionarCliente'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $monto_contrato = $_POST['monto_contrato'];
    $estado = $_POST['estado'];




    $ConsultarEstadoContrato = "SELECT  id_propiedades,estado_contrato FROM contratos WHERE id_contrato='" . $id_contrato . "'";
    $resultadoEstadoContrato = mysqli_query($conexion, $ConsultarEstadoContrato);
    $filaEstadoContrato = mysqli_fetch_assoc($resultadoEstadoContrato);

    $estado_contrato = $filaEstadoContrato['estado_contrato'];
    $id_propiedadActual = $filaEstadoContrato['id_propiedades'];


    if ($estado_contrato == $estado) {

        $actualizarContrato = "UPDATE contratos SET id_propiedades='" . $id_propiedad . "' ,id_cliente='" . $id_cliente . "',fecha_inicio='" . $fecha_inicio . "',fecha_finalizacion='" . $fecha_fin . "',monto_contrato='" . $monto_contrato . "' WHERE id_contrato ='" . $id_contrato . "'";

        $resultadoContrato = mysqli_query($conexion, $actualizarContrato);
        $reultado = mysqli_query($conexion, $sql);

        if ($resultadoContrato) {




            $ActualizarEstado = "UPDATE propiedades SET estado='Activo' WHERE id_propiedades ='" . $id_propiedadActual . "'";
            $Actualizado = mysqli_query($conexion, $ActualizarEstado);
            if ($Actualizado) {

            } else {
                echo "<script language='JavaScript'>
                    alert('Ocurrio un error al altualizar el estado a Activo de la propiedad id'.$propiedad);
                    window.location.assign('Contratos.php'); // Corregido location.assign
                    </script>";
            }

            $ActualizarEstado = "UPDATE propiedades SET estado='Inactivo' WHERE id_propiedades ='" . $id_propiedad . "'";
            $Actualizado = mysqli_query($conexion, $ActualizarEstado);
            if ($Actualizado) {

            } else {
                echo "<script language='JavaScript'>
                        alert('Ocurrio un error al altualizar el estado a Inactivo de la propiedad id'.$id_propiedad);
                        window.location.assign('Contratos.php'); // Corregido location.assign
                        </script>";
            }


            echo "<script language='JavaScript'>
                    alert('El contrato se actualizo con éxito');
                    window.location.assign('Contratos.php'); // Corregido location.assign
                    </script>";


        } else {



            echo "<script language='JavaScript'>
            alert('El contrato no se actualizo con éxito');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";

        }


        mysqli_close($conexion);
    } else {

        if ($estado == "Activo") {


            $sqlidPropiedad = "SELECT  id_propiedades FROM contratos WHERE id_contrato='" . $id_contrato . "'";

            $resultadoidPropiedad = mysqli_query($conexion, $sqlidPropiedad);

            $filaresultadoidPropiedad = mysqli_fetch_assoc($resultadoidPropiedad);
            $propiedad = $filaresultadoidPropiedad['id_propiedades'];

            $consultarEstadoPropiedad = "SELECT estado FROM propiedades WHERE id_propiedades ='" . $propiedad . "'";

            $resultadoEstadoPropiedad = mysqli_query($conexion, $consultarEstadoPropiedad);

            $resulEstadoPropiedad = mysqli_fetch_assoc($resultadoEstadoPropiedad);
            $estadoPropiedad = $resulEstadoPropiedad['estado'];

            if ($estadoPropiedad == 'Activo') {

                $actualizarContratoActivo = "UPDATE contratos SET id_propiedades='" . $id_propiedad . "' ,id_cliente='" . $id_cliente . "',fecha_inicio='" . $fecha_inicio . "',fecha_finalizacion='" . $fecha_fin . "',monto_contrato='" . $monto_contrato . "',estado_contrato='" . $estado . "' WHERE id_contrato ='" . $id_contrato . "'";

                $reultadoContratoActivo = mysqli_query($conexion, $actualizarContratoActivo);

                if ($reultadoContratoActivo) {

                    $sql2 = "UPDATE propiedades SET estado='Inactivo' WHERE id_propiedades ='" . $id_propiedad . "'";
                    $resultado2 = mysqli_query($conexion, $sql2);
                    if ($resultado2) {
                        echo "<script language='JavaScript'>
                            alert('el estado de propiedad cambio a inactivo');
                            window.location.assign('Contratos.php'); // Corregido location.assign
                            </script>";
                    } else {
                        echo "<script language='JavaScript'>
                        alert('el estado de propiedad  no cambio cambio a inactivo');
                        window.location.assign('Contratos.php'); // Corregido location.assign
                        </script>";
                    }


                    echo "<script language='JavaScript'>
                alert('se actualizar cliente en la validacion 2');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";

                } else {

                    echo "<script language='JavaScript'>
                alert('Error al actualizar cliente ');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";
                }


                mysqli_close($conexion);

            } else if ($estadoPropiedad == "Inactivo") {

                echo "<script language='JavaScript'>
                alert('No se puede realizar el contrato por que la propiedad esta inactiva');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";


            }

            mysqli_close($conexion);

        } else {

            $actualizarContratoInactivo = "UPDATE contratos SET id_propiedades='" . $id_propiedad . "' ,id_cliente='" . $id_cliente . "',fecha_inicio='" . $fecha_inicio . "',fecha_finalizacion='" . $fecha_fin . "',monto_contrato='" . $monto_contrato . "',estado_contrato='" . $estado . "' WHERE id_contrato ='" . $id_contrato . "'";

            $reultadoContratoInactivo = mysqli_query($conexion, $actualizarContratoInactivo);
            if ($reultadoContratoInactivo) {

                $sql3 = "UPDATE propiedades SET estado='Activo' WHERE id_propiedades ='" . $id_propiedad . "'";
                $resultado3 = mysqli_query($conexion, $sql3);
                if ($resultado3) {
                    echo "<script language='JavaScript'>
                    alert('el estado de propiedad cambio a activo');
                    window.location.assign('Contratos.php'); // Corregido location.assign
                    </script>";
                } else {
                    echo "<script language='JavaScript'>
                alert('el estado de propiedad  no cambio cambio a activo');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";
                }


                echo "<script language='JavaScript'>
                alert('El cliente se actualizo con éxito');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";

            } else {

                echo "<script language='JavaScript'>
                alert('Error al actualizar cliente en la validacion 2');
                window.location.assign('Contratos.php'); // Corregido location.assign
                </script>";
            }

            mysqli_close($conexion);

        }

        mysqli_close($conexion);


    }

} else {

    $id_contrato = $_GET['id_contrato'];
    echo ".$id.";
    $sql = "SELECT  id_propiedades, fecha_inicio, fecha_finalizacion, monto_contrato, estado_contrato FROM contratos WHERE id_contrato='" . $id_contrato . "'";
    $resultado = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($resultado);
    $idPropiedades = $fil['id_propiedades'];
    $fecha_inicio = $fila['fecha_inicio'];
    $fecha_fin = $fila['fecha_finalizacion'];
    $monto_contrato = $fila['monto_contrato'];
    $estado_contrato = $fila['estado_contrato'];

    echo "$idPropiedades";

    //para mostrar en combobox
    $sql1 = "SELECT id_propiedades, direccion FROM propiedades";
    $resultado1 = mysqli_query($conexion, $sql1);

    $sql2 = "SELECT id_cliente, nombre_completo_cliente FROM cliente";
    $resultado2 = mysqli_query($conexion, $sql2);

    mysqli_close($conexion);
    ?>
    <h1>Editar contrato</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">


        <br><br>

        <label>Cliente</label>
        <select name="seleccionarCliente" id="cliente">
            <?php
            // Conecta a la base de datos
            include("Conexion.php");

            // Reemplaza con el ID del contrato que estás editando
            $id_contrato = $_GET['id_contrato'];

            // Recupera el ID del cliente actualmente asociado al contrato
            $consultaContrato = $conexion->prepare("SELECT id_cliente FROM contratos WHERE id_contrato = ?");
            $consultaContrato->bind_param("i", $id_contrato);
            $consultaContrato->execute();
            $resultadoContrato = $consultaContrato->get_result();
            $filaContrato = $resultadoContrato->fetch_assoc();
            $id_cliente_actual = $filaContrato['id_cliente'];

            // Recupera todos los nombres de los clientes
            $consultaClientes = $conexion->query("SELECT id_cliente, nombre_completo_cliente FROM cliente");

            // Itera a través de los resultados y agrega opciones al combo box
            while ($fila = $consultaClientes->fetch_assoc()) {
                $id_cliente = $fila['id_cliente'];
                $nombre_cliente = $fila['nombre_completo_cliente'];
                $seleccionado = ($id_cliente == $id_cliente_actual) ? 'selected' : '';

                echo "<option value='$id_cliente' $seleccionado>$nombre_cliente</option>";
            }
            ?>
        </select>
        <br><br>

        <label>propiedades</label>

        <select name="seleccionarPropiedad">
            <?php
            // Conecta a la base de datos
            include("Conexion.php");

            // Reemplaza con el ID del contrato que estás editando
            $id_contrato = $_GET['id_contrato'];

            // Recupera el ID del cliente actualmente asociado al contrato
            $consultaContrato = $conexion->prepare("SELECT id_propiedades FROM contratos WHERE id_contrato = ?");
            $consultaContrato->bind_param("i", $id_contrato);
            $consultaContrato->execute();
            $resultadoContrato = $consultaContrato->get_result();
            $filaContrato = $resultadoContrato->fetch_assoc();
            $id_propiedad_actual = $filaContrato['id_propiedades'];

            // Recupera todos los nombres de los clientes
            $idDireccion = $fil['id_propiedades'];
            $consultaClientes = $conexion->query("SELECT id_propiedades, direccion FROM propiedades  WHERE estado = 'Activo'  OR id_propiedades ='" . $id_propiedad_actual . "'");

            // Itera a través de los resultados y agrega opciones al combo box
            while ($fila = $consultaClientes->fetch_assoc()) {
                $id_propiedades = $fila['id_propiedades'];
                $direccion = $fila['direccion'];
                $seleccionado = ($id_propiedades == $id_propiedad_actual) ? 'selected' : '';

                echo "<option value='$id_propiedades' $seleccionado>$direccion</option>";
            }
            ?>
        </select>



        <br><br>



        <label>Fecha inicio</label>
        <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>"><br><br>

        <label>Fecha finalización</label>
        <input type="date" name="fecha_fin" value="<?php echo $fecha_fin; ?>"><br><br>

        <label>Monto de contrato</label>
        <input type="text" name="monto_contrato" value="<?php echo $monto_contrato; ?>"><br><br>

        <label for="estado">Estado:</label>
        <select name="estado">
            <option value="Activo" <?php if ($estado_contrato == 'Activo')
                echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if ($estado_contrato == 'Inactivo')
                echo 'selected'; ?>>Inactivo</option>
        </select>
        <br><br>


        <input type="hidden" name="id_contrato" value="<?php echo $id_contrato; ?>"><br><br>


        <button type="submit" name="enviar">Actualizar</button>

        <a href="Contratos.php">regresar</a>

    </form>

    <?php
}
?>


<?php
include("piePagina.php");
?>