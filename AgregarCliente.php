<?php include("cabecera.php");?>
        <?php
         
        if(isset($_POST["enviar"])) {
            
            $nombre=$_POST['nombre'];
            $mail=$_POST['email'];
            $telefono=$_POST['telefono'];

            include("Conexion.php");
            
            $sql="INSERT INTO cliente(nombre_completo_cliente,email,telefono)
            VALUES('$nombre', '$mail', '$telefono')";

            $reultado=mysqli_query($conexion, $sql);
            if ($reultado) {

                echo "<script language='JavaScript'>
            alert('El cliente se agrego con éxito');
            window.location.assign('Cliente.php'); // Corregido location.assign
            </script>";
            
                
        
            }else{
                
                echo "<script language='JavaScript'>
            alert('El cliente no se agrego con éxito');
            window.location.assign('Cliente.php'); // Corregido location.assign
            </script>";
            
            }

            mysqli_close($conexion);

} else{
    
    ?>

    <h1>Agregar cliente</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <label>Nombre completo</label>
    <input type="text" name="nombre"><br><br>

    <label>email</label>
    <input type="text" name="email"><br><br>

    <label>telefono</label>
    <input type="text" name="telefono"><br><br>

    <button type="submit" name="enviar" >Agregar</button>

    <a href="Cliente.php">regresar</a>

    </form>

    <?php
        }
    ?>
    </form>


<?php
include("piePagina.php");
?>
