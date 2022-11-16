<?php
session_start();
$contfallos=0;
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
function validar($patron,$variable){
    if(isset($_REQUEST[$variable])){
        $valor=$_REQUEST[$variable];
        if(!empty($valor)){
            if(preg_match($patron,$valor)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }else{
        return false;
    }
}
if(isset($_SESSION["contador"])){
    $_SESSION["contador"]=$_SESSION["contador"]+1;
}else{
    $_SESSION["contador"]=1;
}
if(isset($_REQUEST["enviar"])){
    if(validar("/^[[:alpha:]]*$/","nombre")){
     $nombre=$_REQUEST["nombre"];
    }else{
        echo"<p>Nombre incorrectos</p>";
        $contfallos++;
    }
    if(validar("/^[[:alpha:]]+$/","ciudad")){
        $ciudad=$_REQUEST["ciudad"];
       }else{
        echo"<p>Ciudad incorrectos</p>";
           $contfallos++;
       }
       if(validar("/^[[:digit:]]+$/","telefono")){
        $telefono=$_REQUEST["telefono"];
       }else{
        echo"<p>Telefono incorrectos</p>";
           $contfallos++;
       }
       if(validar("/^([[:alnum:]]||@||.)+$/","email")){
        $email=$_REQUEST["email"];
       }else{
        echo"<p>Email incorrectos</p>";
           $contfallos++;
       }
       if(validar("/^[[:alpha:]]+$/","signo")){
        $signo=$_REQUEST["signo"];
       }else{
        echo"<p>Signo incorrectos</p>";
           $contfallos++;
       }
       if($contfallos==0){
        $_SESSION["nombre"]=$nombre;
        $_SESSION["ciudad"]=$ciudad;
        $_SESSION["email"]=$email;
        $_SESSION["telefono"]=$telefono;
        $_SESSION["signo"]=$signo;
       }else{
        echo"<p>Datos incorrectos</p>";
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
  <form method="POST">
    <p>Nombre: <input type="text" name="nombre"></p>
    <p>Ciudad: <input type="text" name="ciudad"></p>
    <p>Email: <input type="email" name="email"></p>
    <p>Telefono: <input type="number" name="telefono"></p>
    <p>Signo del zodiaco: <select name="signo">
    <option value="">...</option>
    <option value="libra">Libra</option>
        <option value="escorpio">Escorpio</option>
    </select> </p>
    <button type="submit" name="enviar">Enviar</button>
  </form>
    <p>Otras paginas</p>
    <p>Pagina1<a href="./contador.php">Pulse aqui</a></p>
    <p>Pagina3<a href="./datos.php">Pulse aqui</a></p>
  

</body>
</html>