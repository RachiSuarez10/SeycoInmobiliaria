<?php include("cabecera.php");?>
<?php

include("Conexion.php");
$sql="SELECT * FROM ingresos_mensuales ORDER BY mes ASC ";

$resultado = mysqli_query($conexion, $sql);

?>
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">seycolnmobiliaria</h1>
        <p class="lead"> Ingresos mensuales</p>
        <hr classmy-2>
       

    </div>

</div>

<h1>Lista de ingresos mensuales</h1>

<table>
    <thead>
        <tr>
            <th>mes y año</th>
            <th>ingresos</th>
            <th></th>
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

<?php
include("piePagina.php");
?>
