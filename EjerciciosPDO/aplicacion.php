<?php
session_start();

    if($_SESSION["autorizado"]==true){
    //    include "./crearBd.php";
    //    crearBD();
            echo "Bienvenido";
            echo "<p><a href='./anadirCampos.php'>Añadir Campos</a></p>";
          
            echo "<p><a href='./insertar.php'>Insertar</a></p>";
            echo "<p><a href='./listar.php'>Listar</a></p>";
            echo "<p><a href='./borrar.php'>Borrar</a></p>";
            echo "<p><a href='./buscar.php'>Buscar</a></p>";
            echo "<p><a href='./modificar.php'>Modificar</a></p>";
            echo "<p><a href='./borrarTodo.php'>Borrar Todo</a></p>";
            echo "<p><a href='./cerrarSesion.php'>Cerrar Sesion</a></p>";
        
        
       
    }else{
        header("Location:./login.php");
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>