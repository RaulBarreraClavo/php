<?php
session_start();

if(isset($_SESSION["contador"])){
    $_SESSION["contador"]=$_SESSION["contador"]+1;
}else{
    $_SESSION["contador"]=1;
}

echo"<p>Numero de paginas recorridas o recargadas ".$_SESSION["contador"]."</p>";
echo"<p>Recarga la pagina <a href='./contador.php'>aqui</a></p>";
echo"<p>Name:".session_name()."</p>";
echo"<p>ID:".session_name()."</p>";
echo"<p>Save Path:".session_save_path()."</p>";
foreach($_SESSION as $key=>$valor){
    echo"<p>$key:$valor</p>";
}
if(isset($_REQUEST["enviar"])){
    if(isset($_REQUEST["eliminarDatos"])){
        session_unset();
        echo"<p>Datos eliminados</p>";
    }
    if(isset($_REQUEST["eliminarSesion"])){
        session_destroy();
        echo"<p>Sesion eliminados</p>";
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
       <p>Eliminar Datos<input type="checkbox" name="eliminarDatos" value="eliminar" ></p>
       <p>Eliminar Sesion<input type="checkbox" name="eliminarSesion" value="eliminar" ></p>
       <button type="submit" name="enviar">Enviar</button>
    </form>
<p>Otras paginas</p>
    <p>Pagina1<a href="./contador.php">Pulse aqui</a></p>
    <p>Pagina2<a href="./formulario.php">Pulse aqui</a></p>
  
</body>
</html>
