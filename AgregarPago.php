<?php include("cabecera.php");?>
        <?php
       
        include("Conexion.php");
        if(isset($_POST["enviar"])) {
            
            $id_cliente=$_POST['cliente'];
            $id_propiedad=$_POST['propiedad'];
            $monto_pago=$_POST['monto_pago'];

            echo "$id_cliente";
            echo "$id_propiedad";
            echo "$monto_pago";

            $contrato = "SELECT c.id_contrato
            FROM contratos AS c
            WHERE c.id_cliente = " . $id_cliente . " AND c.id_propiedades = " . $id_propiedad;

            $reultadoc=mysqli_query($conexion, $contrato);

            $fila=mysqli_fetch_assoc($reultadoc);
            $id_contrato=$fila['id_contrato'];
          


            
            $sql1="INSERT INTO pagos(id_cliente,id_propiedades, id_contrato, monto_pago)
            VALUES('$id_cliente', '$id_propiedad','$id_contrato','$monto_pago')";

            $reultado1=mysqli_query($conexion, $sql1);

            if ($reultado1) {

                echo "<script language='JavaScript'>
            alert('El pago se agrego con éxito');
            window.location.assign('Pagos.php'); // Corregido location.assign
            </script>";
            
                
        
            }else{
                
    
                
                echo "<script language='JavaScript'>
            alert('El pago no se agrego con éxito');
            window.location.assign('Pagos.php'); // Corregido location.assign
            </script>";
            
            }
        

            mysqli_close($conexion);

} else{


    $sql = "SELECT id_cliente, nombre_completo_cliente FROM cliente ORDER BY nombre_completo_cliente ASC";
    $resultado = mysqli_query($conexion, $sql);




    
    ?>

    <h1>Agregar pago</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <label>Cliente</label>
    <select name="cliente" id="cliente">
        <option value="0">seleccionar cliente</option>
        <?php
            while ($row = $resultado->fetch_assoc()) { ?>

                <option value="<?php echo $row['id_cliente'];?>"><?php echo $row['nombre_completo_cliente'];?></option>



            <?php } ?>
    </select><br><br>


    <label>Propiedad</label>
    <select name="propiedad" id="propiedad"></select><br><br>



    <label>Monto</label>
    <input type="text" name="monto_pago"><br><br>

    
    <button type="submit" name="enviar"> agregar</button>

    <a href="Cliente.php">regresar</a>

    </form>

    <?php
        }
    ?>
    </form>

  


    </body>
</html