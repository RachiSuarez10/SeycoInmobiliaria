<?php include("cabecera.php");
include("Conexion.php"); ?>

<?php
if (isset($_POST['enviar'])) {

    $idPago = $_POST['idPago'];
    $cmb_cliente = $_POST['seleccionarCliente'];
    $cmb_propiedad = $_POST['seleccionarPropiedad'];
    $monto_nuevo = $_POST['monto'];

    $actualizarPago = "UPDATE pagos SET id_cliente = '" . $cmb_cliente . "',
                            id_propiedades = '" . $cmb_propiedad . "',
                            monto_pago = '" . $monto_nuevo . "'
                            WHERE id_pago = '" . $idPago . "'";

    $resultadoActualizarPago = mysqli_query($conexion, $actualizarPago);

    if ($resultadoActualizarPago) {

        echo "<script language='JavaScript'>
            alert('El pago se actualizo con éxito');
            window.location.assign('Pagos.php'); // Corregido location.assign
            </script>";
    } else {

        echo "<script language='JavaScript'>
            alert('El pago no se actualizo con éxito');
            window.location.assign('Pagos.php'); // Corregido location.assign
            </script>";
    }



} else {

    $id_pago = $_GET['id_pago'];
    $monto = "SELECT monto_pago FROM pagos WHERE id_pago='" . $id_pago . "'";

    $resultadoMont = mysqli_query($conexion, $monto);

    $filaMonto = mysqli_fetch_assoc($resultadoMont);

    $montoPago = $filaMonto['monto_pago'];


    ?>
    <h1>Editar Pago</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">


        <label>Cliente</label>
        <select name="seleccionarCliente" id="cliente">
            <?php
            // Conecta a la base de datos
        

            // Reemplaza con el ID del contrato que estás editando
        

            // Recupera el ID del cliente actualmente asociado al contrato
            $consultaContrato = $conexion->prepare("SELECT id_cliente FROM pagos WHERE id_pago=?");
            $consultaContrato->bind_param("i", $id_pago);
            $consultaContrato->execute();
            $resultadoContrato = $consultaContrato->get_result();
            $filaContrato = $resultadoContrato->fetch_assoc();
            $id_cliente_actual = $filaContrato['id_cliente'];

            // Recupera todos los nombres de los clientes
            $consultaClientes = $conexion->query("SELECT id_cliente , nombre_completo_cliente FROM cliente");

            // Itera a través de los resultados y agrega opciones al combo box
            while ($fila = $consultaClientes->fetch_assoc()) {
                $id_cliente = $fila['id_cliente'];
                $nombre_cliente = $fila['nombre_completo_cliente'];
                $seleccionado = ($id_cliente == $id_cliente_actual) ? 'selected' : '';

                echo "<option value='$id_cliente' $seleccionado>$nombre_cliente</option>";
            }
            ?>
        </select>


        <label>propiedades</label>

        <select name="seleccionarPropiedad" id="propiedad">
            <?php
            // Conecta a la base de datos
        

            // Reemplaza con el ID del contrato que estás editando
        

            // Recupera el ID del cliente actualmente asociado al contrato
            // Recupera el ID del cliente actualmente asociado al contrato
            $consultaContrato = $conexion->prepare("SELECT id_propiedades FROM pagos WHERE id_pago = ?");
            $consultaContrato->bind_param("i", $id_pago);
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
        <label>Monto</label>
        <input type="text" name="monto" value="<?php echo $montoPago; ?>"><br><br>

        <input type="hidden" name="idPago" value="<?php echo $id_pago; ?>"><br><br>


        <button type="submit" name="enviar">Actualizar</button>

        <a href="Pagos.php">regresar</a>

    </form>

    <?php
}
?>


<?php
include("piePagina.php");
?>