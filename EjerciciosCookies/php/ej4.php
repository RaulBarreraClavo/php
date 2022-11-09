<?php
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
if(isset($_REQUEST["Crear"])){
    $mensaje="";
    if(isset($_REQUEST["segundos"])){
        $segundos=$_REQUEST["segundos"];
        if(!empty($segundos)){
            if(preg_match("/^[0-9]+$/",$segundos)){
                if($segundos<=60 and $segundos>=1){
                    setcookie("cookie","1",time()+$segundos);
                    $mensaje="La cookie se ha creado correctamente, se destruira en $segundos segundos";
                }else{
                    $mensaje="Los segundos no estan entre 1 y 60";
                }
            }else{
                $mensaje="Los segundos no son un número";
            }
        }else{
            $mensaje="Tienes que poner los segundos";
        }
       
      
    }else{
        $mensaje="Tienes que poner los segundos";
    }
   echo"<h1>$mensaje</h1>";
}
if(isset($_REQUEST["Comprobar"])){
    $tiempo=$_COOKIE["cookie"];
    echo"<h1>La cookie se destruira en $tiempo segundos</h1>";
}
if(isset($_REQUEST["Destruir"])){
    setcookie("cookie","1",time()-60);
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
    <form action="" method="POST">
     <p>Crear una cookie con una duracion de<input type="text" name="segundos"> segundos(entre 1 y 60)  <button type="submit" name="Crear">Crear</button></p>   
       <p>Comprobar Cookie <button type="submit" name="Comprobar">Comprobar</button></p>
       <p>Destruir Cookie <button type="submit" name="Destruir">Destruir</button></p>
    </form>
</body>
</html>