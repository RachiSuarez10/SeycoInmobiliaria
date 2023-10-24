<?php include("cabecera.php");?>
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

        
        $sql="UPDATE contratos SET id_propiedades='".$id_propiedad."' ,id_cliente='".$id_cliente."',fecha_inicio='".$fecha_inicio."',fecha_finalizacion='".$fecha_fin."',monto_contrato='".$monto_contrato."',estado_contrato='".$estado."' WHERE id_contrato ='".$id_contrato."'";

        $reultado=mysqli_query($conexion, $sql);
        if ($reultado) {

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

    <label>Propiedad</label>
    <select name="seleccionarPropiedad">
        <?php
        while($row = $resultado1->fetch_assoc()) {
            echo "<option value='".$row['id_propiedades']."'>".$row['direccion']. "</option>";
            
        }
        ?>
    </select><br><br>

    <label>Cliente</label>
    <select name="seleccionarCliente">
        <?php
        while($row = $resultado2->fetch_assoc()) {
            echo "<option value='".$row['id_cliente']."'>".$row['nombre_completo_cliente']. "</option>";
            
        }
        ?>
    </select><br><br>

    <label>Fecha inicio</label>
    <input type="date" name="fecha_inicio" value="<?php echo $fecha_inicio; ?>"><br><br>

    <label>Fecha finalización</label>
    <input type="date" name="fecha_fin" value="<?php echo $fecha_fin; ?>"><br><br>

    <label>Monto de contrato</label>
    <input type="text" name="monto_contrato" value="<?php echo $monto_contrato; ?>"><br><br>

    <label>Estado</label>
    <input type="text" name="estado" value="<?php echo $estado_contrato; ?>"><br><br>


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

