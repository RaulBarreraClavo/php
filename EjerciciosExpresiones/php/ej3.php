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
    function validar($patron,$texto){
        $respuesta="";
        
        if(preg_match($patron,$texto)){
            $respuesta=$respuesta."La cadena contiene el patron ";
        }else{
            $respuesta=$respuesta."La cadena no contiene el patron ";
        }
       


        return $respuesta;
    }
    function fecha($fecha){
       $respuesta= validar("/^[0-9]{2}[\/][0-9]{2}[\/][0-9]{4}$/",$fecha);

        return $respuesta." fecha valida<br>";
    }
    function numero($numero){
        $respuesta= validar("/^[6||9][0-9]{8}$/",$numero);

        return $respuesta." numero valido<br>";
    }
   
    $texto=($_REQUEST["texto"] );
    echo"<p>",$texto,"</p>";
    echo "<p>",fecha($texto),"</p>";
    echo "<p>",numero($texto),"</p>";
    
    ?>
</body>
</html>