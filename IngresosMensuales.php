<?php include("cabecera.php");?>
<?php



include("Conexion.php");
$sql="SELECT * FROM ingresos_mensuales ORDER BY mes ASC ";

$resultado = mysqli_query($conexion, $sql);

?>

<h1>Lista de ingresos mensuales</h1>



<table>
    <thead>
        <tr>
            <th>mes y año</th>
            <th>ingresos</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($fila = mysqli_fetch_assoc($resultado)){
        ?>
        <tr>
            <td><?php echo $fila['mes']?></td>
            <td><?php echo $fila['ingresos_mensuales']?></td>
            <td>
            <?php echo "<a href='DistribucionDeIngresosMensuales.php?mes=".$fila['mes']."'>Distribuir</a>"; ?>
            </td>
        
        </tr>
        <?php

        }

        ?>
    </tbody>
</table>

<?php
mysqli_close($conexion);
?>
<a href="index.php">Refresar</a>
<?php
include("piePagina.php");
?>