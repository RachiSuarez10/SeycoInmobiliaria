<?php include("cabecera.php");?>
<?php

include("Conexion.php");
?>
    <?php
    if(isset($_POST['enviar'])){
        //aqui entra cuando preciona el voton enviar

        $id_cliente=$_POST['idcliente'];
        $nombre=$_POST['nombre'];
        $mail=$_POST['email'];
        $telefono=$_POST['telefono'];

        
        $sql="UPDATE cliente SET nombre_completo_cliente='".$nombre."' ,email='".$mail."',telefono='".$telefono."' WHERE id_cliente ='".$id_cliente."'";

        $reultado=mysqli_query($conexion, $sql);
        if ($reultado) {

            echo "<script language='JavaScript'>
            alert('El cliente se actualizo con éxito');
            window.location.assign('Cliente.php'); // Corregido location.assign
            </script>";
            
    
        }else{
            
            echo "<script language='JavaScript'>
            alert('EError al actualizar cliente');
            window.location.assign('Cliente.php'); // Corregido location.assign
            </script>";
        }

        mysqli_close($conexion);

    }else{
     $id_cliente=$_GET['id_cliente'];
     echo ".$id.";
     $sql= "SELECT  nombre_completo_cliente, email, telefono FROM cliente WHERE id_cliente='".$id_cliente."'";
     $resultado = mysqli_query($conexion,$sql);

     $fila=mysqli_fetch_assoc($resultado);
     $nombre=$fila['nombre_completo_cliente'];
     $email=$fila['email'];
     $telefono=$fila['telefono'];
    
    
    ?>
<h1>Editar usuario</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <label>Nombre completo</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br><br>

    <label>email</label>
    <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

    <label>telefono</label>
    <input type="text" name="telefono" value="<?php echo $telefono; ?>"><br><br>

    <input type="hidden" name="idcliente" value="<?php echo $id_cliente; ?>"><br><br>
    

    <button type="submit" name="enviar">Actualizar</button>

    <a href="Cliente.php">regresar</a>

    </form>

    <?php
    }
    ?>


<?php
include("piePagina.php");
?>
