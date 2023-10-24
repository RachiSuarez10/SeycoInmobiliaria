<?php

$hostname = 'localhost';
$database = 'id18660309_seycolnmobiliaria';
$username = 'root';
$password = '';

$conexion = new mysqli($hostname,$username,$password,$database);

if($conexion->connect_errno){
    echo "error al conectar";
    
}else{

}
?>