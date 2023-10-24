<?php include("cabecera.php");?>
<?php
    include("Conexion.php");


?>

    <?php
    if(isset($_POST['enviar'])){
        //aqui entra cuando preciona el voton enviar

        $id_propiedades=$_POST['idpropiedades'];
        $direccion=$_POST['direccion'];
        $tipo_propiedad=$_POST['tipo_propiedad'];
        $precio=$_POST['precio'];

        
        $sql="UPDATE propiedades SET direccion='".$direccion."' ,tipo_propiedad='".$tipo_propiedad."',precio='".$precio."' WHERE id_propiedades ='".$id_propiedades."'";

        $reultado=mysqli_query($conexion, $sql);
        if ($reultado) {

            echo "<script language='JavaScript'>
            alert('El cliente se actualizo con éxito');
            window.location.assign('Propiedades.php'); // Corregido location.assign
            </script>";
            
    
        }else{
            
            echo "<script language='JavaScript'>
            alert('EError al actualizar cliente');
            window.location.assign('Propiedades.php'); // Corregido location.assign
            </script>";
        }

        mysqli_close($conexion);

    }else{
     $id_propiedades=$_GET['id_propiedades'];
     echo ".$id.";
     $sql= "SELECT direccion,tipo_propiedad, precio FROM propiedades WHERE id_propiedades='".$id_propiedades."'";
     $resultado = mysqli_query($conexion,$sql);

     $fila=mysqli_fetch_assoc($resultado);
     $direccion=$fila['direccion'];
     $tipo_propiedad=$fila['tipo_propiedad'];
     $precio=$fila['precio'];
    
    
    ?>
<h1>Editar propiedad</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <label>Direccion</label>
    <input type="text" name="direccion" value="<?php echo $direccion; ?>"><br><br>

    <label>Tipo de propiedad</label>
    <input type="text" name="tipo_propiedad" value="<?php echo $tipo_propiedad; ?>"><br><br>

    <label>Precio</label>
    <input type="text" name="precio" value="<?php echo $precio; ?>"><br><br>

    <input type="hidden" name="idpropiedades" value="<?php echo $id_propiedades; ?>"><br><br>
    

    <button type="submit" name="enviar">Actualizar</button>

    <a href="Propiedades.php">regresar</a>

    </form>

    <?php
    }
    ?>

<?php
include("piePagina.php");
?>

