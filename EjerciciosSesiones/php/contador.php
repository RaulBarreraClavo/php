<?php
session_start();
function sanear(){
    foreach($_REQUEST as $key=>$valor){
        if(!is_array($_REQUEST[$key])){
            $_REQUEST[$key]=trim(htmlspecialchars(strip_tags($_REQUEST[$key]),ENT_QUOTES,"utf-8"));
        }else{
            foreach($_REQUEST[$key] as $posicion=>$dato){
                $_REQUEST[$key][$posicion]=trim(htmlspecialchars(strip_tags($dato),ENT_QUOTES,"utf-8"));
            }
        }
    }
   
}
sanear();

if(isset($_SESSION["contador"])){
    $_SESSION["contador"]=$_SESSION["contador"]+1;
}else{
    $_SESSION["contador"]=1;
}
if(isset($_REQUEST["enviar"])){
    if(isset($_REQUEST["check"])){
        $_SESSION["contador"]=1;
    }
}
echo"<p>Numero de paginas recorridas o recargadas ".$_SESSION["contador"]."</p>";
echo"<p>Recarga la pagina <a href='./contador.php'>aqui</a></p>";




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
    <h2>Reiniciar el contador</h2>
    <form method="POST">
        <p>  <input type="checkbox" name="check">Elige esta opcion y pulsa en enviar</p>
        <button type="submit" name="enviar">Enviar</button>
    
    </form>
    <p>Otras paginas</p>
    <p>Pagina2<a href="./formulario.php">Pulse aqui</a></p>
    <p>Pagina3<a href="./datos.php">Pulse aqui</a></p>
  

</body>
</html>