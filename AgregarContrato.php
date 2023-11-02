<?php include("cabecera.php");?>

   
        <?php
      
        include("Conexion.php");
        if(isset($_POST["enviar"])) {
            
            $id_propiedad=$_POST['seleccionarPropiedad'];
            $id_cliente=$_POST['seleccionarCliente'];
            $fecha_inicio=$_POST['fecha_inicio'];
            $fecha_fin=$_POST['fecha_fin'];
            $monto_contrato=$_POST['monto_contrato'];
            $estado=$_POST['estado'];

            
            $sql3="INSERT INTO contratos(id_propiedades, id_cliente, fecha_inicio, fecha_finalizacion, monto_contrato, estado_contrato)
            VALUES('$id_propiedad', '$id_cliente', '$fecha_inicio','$fecha_fin','$monto_contrato','$estado')";

            $reultado3=mysqli_query($conexion, $sql3);
            if ($reultado3) {

                if($estado == "Activo") {

                    $sql="UPDATE propiedades SET estado='Inactivo' WHERE id_propiedades ='".$id_propiedad."'";
                    $reultado=mysqli_query($conexion, $sql);
                
                }

                
                echo "<script language='JavaScript'>
            alert('El contrato se agrego con éxito');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";
            
                
        
            }else{
                
                echo "<script language='JavaScript'>
            alert('El contrato no se agrego con éxito');
            window.location.assign('Contratos.php'); // Corregido location.assign
            </script>";
            
            }

            mysqli_close($conexion);



} else{

    $sql= "SELECT id_propiedades, direccion FROM propiedades WHERE estado = 'Activo'";
    $resultado = mysqli_query($conexion,$sql);

    $sql2= "SELECT id_cliente, nombre_completo_cliente FROM cliente";
    $resultado2 = mysqli_query($conexion,$sql2);

   
    
    ?>

    <h1>Agregar contrato</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">


    <label>Cliente</label>
    <select name="seleccionarCliente">
        <?php
        while($row = $resultado2->fetch_assoc()) {
            echo "<option value='".$row['id_cliente']."'>".$row['nombre_completo_cliente']. "</option>";
            
        }
        ?>
    </select><br><br>
    
    <label>Propiedad</label>
    <select name="seleccionarPropiedad">
        <?php
        while($row = $resultado->fetch_assoc()) {
            echo "<option value='".$row['id_propiedades']."'>".$row['direccion']. "</option>";
            
        }
        ?>
    </select><br><br>

    <label>Fecha inicio</label>
    <input type="date" name="fecha_inicio"><br><br>

    <label>Fecha finalización</label>
    <input type="date" name="fecha_fin"><br><br>

    <label>Monto de contrato</label>
    <input type="text" name="monto_contrato"><br><br>

    <label>Estado</label>
    <label for="estado">Selecciona un estado:</label>
        <select name="estado" id="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

   
    <button type="submit" name="enviar"> agregar</button>

    <a href="Contratos.php">regresar</a>

    </form>

    <?php
        }
    ?>
    <?php
    $conexion->close();
    ?>

    </form>




    </body>
</html>

