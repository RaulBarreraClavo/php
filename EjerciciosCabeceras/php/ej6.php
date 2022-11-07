<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_REQUEST("enviar")){
        function sanear(){
            foreach($_REQUEST as $key=>$valor){
                if(!is_array($_REQUEST[$key])){
                    $_REQUEST[$key]=trim(htmlspecialchars(strip_tags($_REQUEST[$key]),ENT_QUOTES,"utf-8"));
                }else{
                    foreach($_REQUEST[$key] as $posicion=>$dato){
                        $_REQUEST[$key][$posicion]=trim(htmlspecialchars(strip_tags($_REQUEST[$key][$posicion]),ENT_QUOTES,"utf-8"));
                    }
                }
            }
        }
        sanear();
        function validar($variable,$patron){
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
    }
    ?>
<form  method="post">
      
        <p>Introduzca el nombre del circuito:<input type="text" name="nombre"></p>
        <p>Introduzca el destino:<input type="text" name="destino"></p>
        <p>Introduzca la duracion:<input type="text" name="duracion"></p>
        <p>Introduzca los dias de salida:<input type="text" name="salida"></p>
        <button type="enviar">Enviar</button>
    </form>
</body>
</html>