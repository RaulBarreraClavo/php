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
    function validar($texto){
        $respuesta="";
        
        if(preg_match("/^[[:alpha:]]( +[[:alpha:]])*$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una o más letras sueltas separadas por espacios <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una o más letras sueltas separadas por espacios <br>";
        }
        if(preg_match("/^[[:alpha:]]+( +[[:alpha:]]+)*$/",$texto)){
            $respuesta=$respuesta."La cadena contiene dos o más letras sueltas separadas por espacios <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene dos o más letras sueltas separadas por espacios <br>";
        }
        if(preg_match("/^[a-z]+( +[a-z]+)*$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una o más palabras <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una o más palabras <br>";
        }
        if(preg_match("/^([A-Z])+$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una unica palabra en mayúsculas <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una unica palabra en mayúsculas <br>";
        }
        if(preg_match("/^[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una fecha de nacimiento <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una fecha de nacimiento <br>";
        }
        if(preg_match("/^[0-9]+([\.||,][0-9]{1,2})?$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número sin signo y con como mucho dos
            decimales<br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único número sin signo y con como mucho dos
            decimales <br>";
        }
        if(preg_match("/^[\+||-][0-9]+([\.||,][0-9]+)?$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número con signo (más o menos) y con
            decimales<br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único número con signo (más o menos) y con
            decimales <br>";
        }

        if(preg_match("/^([[:alnum:]||\*||\+||\-||\.||_]){6,}$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una contraseña <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una contraseña  <br>";
        }




        return $respuesta;
    }
   
    $texto=($_REQUEST["texto"] );
    echo"<p>",$texto,"</p>";
    echo "<p>",validar($texto),"</p>";
    
    ?>
</body>
</html>