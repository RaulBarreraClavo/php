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
        if($texto==""){
            $respuesta= $respuesta."La cadena esta vacia <br>";
        }else{
            $respuesta=$respuesta."La cadena no esta vacia <br>";
        }

        if(preg_match("/^([a-z]||[A-Z])+$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una unica palabra <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una unica palabra <br>";
        }
        if(preg_match("/^([a-z]||[A-Z])+[\s]+([a-z]||[A-Z])+$/",$texto)){
            $respuesta=$respuesta."La cadena contiene dos palabras <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene dos palabras <br>";
        }
        if(preg_match("/^[[:alpha:]]+$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una única palabra que tenga solamente letras inglesas <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una única palabra que tenga solamente letras inglesas <br>";
        }
        if(preg_match("/^a*e*i*o*u*$/",$texto)){
            $respuesta=$respuesta."La cadena contiene una cadena de vocales minúsculas sin acentuar <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene una cadena de vocales minúsculas sin acentuar <br>";
        }
        if(preg_match("/^[0-9]+$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número  <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único número  <br>";
        }
        if(preg_match("/^[0-9]*[0||2||4||6||8]$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número par <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único número par <br>";
        }
        if(preg_match("/^[6||9][0-9]{8}$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número de teléfono <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único número de teléfono <br>";
        }
        if(preg_match("/^[0-9]{8}[A-Z]?$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único número del DNI <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un  único número del DNI <br>";
        }
        if(preg_match("/^[0||1||2||3||4][0-9]{4}$/",$texto)){
            $respuesta=$respuesta."La cadena contiene un único código postal <br>";
        }else{
            $respuesta=$respuesta."La cadena no contiene un único código postal <br>";
        }




        return $respuesta;
    }
   
    $texto=($_REQUEST["texto"] );
    echo"<p>",$texto,"</p>";
    echo "<p>",validar($texto),"</p>";
    
    ?>
</body>
</html>