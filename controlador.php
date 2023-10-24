<?php
if(!empty($_POST["btnIngresar"])){
    if(empty($_POST["usuario"])and empty(trim($_POST["password"]))){
        echo"los campos esta vacios";

    }else{
        include("Conexion.php");
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];

        $sql=$conexion->query("SELECT nombre_usuario, pass FROM usuarios WHERE nombre_usuario ='$usuario' AND pass ='$password'");
        
        
        if($$datos=$sql->fetch_object()){
           
            header("Location:Index.php");
            exit;
           
        }else{
            echo"usuario y contraseña mo sol validos";
        }
    }
}else{
    
}
?>