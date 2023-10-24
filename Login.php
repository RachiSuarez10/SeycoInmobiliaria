<?php
session_start();

if (isset($_POST["iniciar"])) {
  $usuario = $_POST['usuario'];
  $pass = $_POST['pass'];

  // Verificar si los campos están vacíos
  if (empty($usuario) || empty($pass)) {
    echo "<script language='JavaScript'>
    alert('Por favor, ingrese usuario y contraseña'); // Mostrar mensaje de error
    </script>";
  } else {
    include("Conexion.php");

    $sql = "SELECT nombre_usuario, pass, tipo_usuario 
    from usuarios
    WHERE nombre_usuario ='$usuario' AND pass='$pass'";

    $resultado = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($resultado);

    $user = $fila['nombre_usuario'];
    $passs = $fila['pass'];
    $tipouser = $fila['tipo_usuario'];

    if (($usuario == $user) && ($pass == $passs)) {
      $_SESSION['usuario'] = true;
      header("location:index.php");
    } else {
      echo "<script language='JavaScript'>
      alert('Datos de usuario incorrecto'); // Mostrar mensaje de error
      </script>";
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <title>seycolnmobiliaria</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <div class="container">

      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <br/>
        <br/>
        
          <div class="card">
            
            <div class="card-header">
              Iniciar sesión
            </div>
            <div class="card-body">

            <form action="Login.php" method="post">



              usuario: <input class="form-control" type="text" name="usuario" id="">
              <br/>
              contraseña:<input  class="form-control" type="password" name="pass" id="">
              <br/>
              <button class="btn btn-success"  type="submit" name="iniciar">Entrar</button>

              </form>
            </div>
            
          </div>

          
        </div>
        <div class="col-md-4"></div>
      </div>
   
  </div>
 
</body>

</htm