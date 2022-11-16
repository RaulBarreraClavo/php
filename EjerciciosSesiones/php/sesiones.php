<?php
session_start();
function sanear(){
    foreach($_REQUEST as $key=>$valor){
        if(!is_array($_REQUEST[$key])){
            $_REQUEST[$key]=trim(htmlspecialchars(strip_tags($_REQUEST[$key]),ENT_QUOTES,"utf-8"));
        }else{
            foreach($_REQUEST[$key] as $indice=>$valor){
                $_REQUEST[$key][$indice]=trim(htmlspecialchars(strip_tags($_REQUEST[$key][$indice]),ENT_QUOTES,"utf-8"));
            }
        }
    }
}
sanear();
$contfallos=0;

    if(isset($_REQUEST["enviar"])){
        if(isset($_REQUEST["nombre"])){
            $nombre=$_REQUEST["nombre"];
        }else{
            echo "<p>El nombre es incorrecto</p>";
            $contfallos++;
        }
        if(isset($_REQUEST["clave"])){
            $clave=$_REQUEST["clave"];
        }else{
            echo "<p>La clave es incorrecta</p>";
            $contfallos++;
        }
        if($contfallos==0){
            $_SESSION["autorizacion"]="Si";
            $_SESSION["nombre"]=$nombre;
            $_SESSION["clave"]=$clave;
            header("Location:./sesionesb.php");
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
    
    <form method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Clave: <input type="password" name="clave"></p>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>