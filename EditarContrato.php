<?php include("cabecera.php");
    include("Conexion.php"); ?>

    <?php
    

    include("Conexion.php");
    if(isset($_POST['enviar'])){
        //aqui entra cuando preciona el voton enviar
        $id_contrato=$_POST['id_contrato'];
        $id_propiedad=$_POST['seleccionarPropiedad'];
        $id_cliente=$_POST['seleccionarCliente'];
        $fecha_inicio=$_POST['fecha_inicio'];
        $fecha_fin=$_POST['fecha_fin'];
        $monto_contrato=$_POST['monto_contrato'];
        $estado=$_POST['estado'];

        if ($estado == 'Activo') {
            # code...
        }else if ($estado == 'Inactivo') {
            # code...
        }
        $consultarEstadoPropiedad = "SELECT estado FROM propiedades WHERE id_propiedades ='".$id_propiedad."'";

        $resultadoEstadoPropiedad = mysqli_query($conexion,$consultarEstadoPropiedad);
        
        $resulEstadoPropiedad=mysqli_fetch_assoc($resultadoEstadoPropiedad);
        $estadoPropiedad=$resulEstadoPropiedad['estado'];
        
        if($estadoPropiedad == 'Inactivo'){
            echo "<script language='JavaScript'>
            alert('No se puede realizar el contrato por que la propiedad esta inactiva');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";
            /*
            lo que tengo que hacer es validar si el usuario que quiere activar y desactivar sea 
            el mismo que tenga asignado la propiead para que le permita activar y desactivar 
             */
        }else if($estadoPropiedad == 'Activo'){

        $sql="UPDATE contratos SET id_propiedades='".$id_propiedad."' ,id_cliente='".$id_cliente."',fecha_inicio='".$fecha_inicio."',fecha_finalizacion='".$fecha_fin."',monto_contrato='".$monto_contrato."',estado_contrato='".$estado."' WHERE id_contrato ='".$id_contrato."'";


        $reultado=mysqli_query($conexion, $sql);
        if ($reultado) {
            

            
        if ($estado == "Inactivo") {

            $sql2="UPDATE propiedades SET estado='Activo' WHERE id_propiedades ='".$id_propiedad."'";
            $reultado2=mysqli_query($conexion, $sql2);
            

        }else if(($estado == "Activo")){
            $sql2="UPDATE propiedades SET estado='Inactivo' WHERE id_propiedades ='".$id_propiedad."'";
            $reultado2=mysqli_query($conexion, $sql2);

           
        }
        

            echo "<script language='JavaScript'>
            alert('El cliente se actualizo con éxito');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";
            
    
        }else{
            
            echo "<script language='JavaScript'>
            alert('EError al actualizar cliente');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";
        }

        mysqli_close($conexion);
    }
    }else{
     $id_contrato=$_GET['id_contrato'];
     echo ".$id.";
     $sql= "SELECT  fecha_inicio, fecha_finalizacion, monto_contrato, estado_contrato FROM contratos WHERE id_contrato='".$id_contrato."'";
     $resultado = mysqli_query($conexion,$sql);

     $fila=mysqli_fetch_assoc($resultado);
     $fecha_inicio=$fila['fecha_inicio'];
     $fecha_fin=$fila['fecha_finalizacion'];
     $monto_contrato=$fila['monto_contrato'];
     $estado_contrato=$fila['estado_contrato'];


     //para mostrar en combobox
    $sql1= "SELECT id_propiedades, direccion FROM propiedades";
    $resultado1 = mysqli_query($conexion,$sql1);

    $sql2= "SELECT id_cliente, nombre_completo_cliente FROM cliente";
    $resultado2 = mysqli_query($conexion,$sql2);
    
    
    ?>
<h1>Editar contrato</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    

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

<select name="seleccionarPropiedad" >
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
    $consultaClientes = $conexion->query("SELECT id_propiedades, direccion FROM propiedades");

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
        <option value="Activo" <?php if ($estado_contrato == 'Activo') echo 'selected'; ?>>Activo</option>
        <option value="Inactivo" <?php if ($estado_contrato == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
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