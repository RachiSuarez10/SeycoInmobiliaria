<?php
session_start();


if ($_SESSION['usuario'] !== true) {
    header("location:Login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seycolnmobiliaria</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script language="javascript" src="js/jquery-3.7.1.min.js"></script>

    <script language="javascript">
    $(document).ready(function(){
        $("#cliente").change(function() {
            var id_cliente = $(this).val();
            $.post("include/direccion.php", { id_cliente: id_cliente }, function(data) {
                $("#propiedad").html(data);

        
            
            });
        });
    });
</script>

</head>
<body>
    

<div class="container">
<a href="index.php">Inicio</a> |
<a href="Cliente.php">Cliente</a> |
<a href="Propiedades.php">Propiedades</a> |
<a href="Contratos.php">Contratos</a> |
<a href="Pagos.php">Pagos</a>
<a class="cerrar" href="cerrar.php">Cerrar sesión</a>
<br>




