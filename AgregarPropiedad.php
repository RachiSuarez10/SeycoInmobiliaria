<?php include("cabecera.php");?>   
        <?php
         
        if(isset($_POST["enviar"])) {
            
            $direccion=$_POST['direccion'];
            $tipo_propiedad=$_POST['tipo_propiedad'];
            $precio=$_POST['precio'];
            $estado = $_POST['estado'];

            include("Conexion.php");
            
            $sql="INSERT INTO propiedades(direccion,tipo_propiedad, precio, estado)
            VALUES('$direccion', '$tipo_propiedad', '$precio', '$estado')";

            $reultado=mysqli_query($conexion, $sql);
            if ($reultado) {

                echo "<script language='JavaScript'>
            alert('La propiedad se agrego con éxito');
            window.location.assign('Propiedades.php'); // Corregido location.assign
            </script>";
            
                
        
            }else{
                
                echo "<script language='JavaScript'>
            alert('La propiedad no se agrego con éxito');
            window.location.assign('Propiedades.php'); // Corregido location.assign
            </script>";
            
            }

            mysqli_close($conexion);

} else{
    
    ?>

    <h1>Agregar propiedad</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <label>Direccion</label>
    <input type="text" name="direccion"><br><br>

    <label>Tipo de propiedad</label>
    <input type="text" name="tipo_propiedad"><br><br>

    <label>Precio</label>
    <input type="text" name="precio"><br><br>

    <label for="estado">Selecciona un estado:</label>
        <select name="estado" id="estado">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

    <button type="submit" name="enviar"> agregar</button>

    <a href="Cliente.php">regresar</a>

    </form>

    <?php
        }
    ?>
    </form>



<?php
include("piePagina.php");
?>
