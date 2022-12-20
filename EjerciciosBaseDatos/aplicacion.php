<?php
session_start();
if(isset($_GET["cerrada"])){
   
        echo "Sesion Cerrada";
        echo "<p><a href='./login.php'>Volver al login</a></p>";
        echo "<img src=./trebol.png>";
    
}else{
    if($_SESSION["autorizado"]==true){
       
            echo "Bienvenido";
            echo "<p><a href='./cerrar.php'>Cerrar Sesion</a></p>";
            echo "<img src=./trebol.png>";
        
       
    }else{
        header("Location:./login.php");
    
    }
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