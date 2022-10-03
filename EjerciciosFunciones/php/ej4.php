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



    function filaMasAlta($numeros){
        $sumafila1=0;
        $sumafila2=0;
        $sumafila3=0;
        $filaalta="";
        foreach ($numeros as $indice=>$numero){
            if($indice<3){
                $sumafila1+=$numero;
            }else if($indice<6){
                $sumafila2+=$numero;
            }else{
                $sumafila3+=$numero;
            }
        }
        if($sumafila1>$sumafila2){
            if($sumafila1>$sumafila3){
                $filaalta="La fila mas alta es la 1 y con un total de {$sumafila1}";
            }else{
                $filaalta="La fila mas alta es la 3 y con un total de {$sumafila3}";
            }
        }else{
            if($sumafila2>$sumafila3){
                $filaalta="La fila mas alta es la 2 y con un total de {$sumafila2}";
            }else{
                $filaalta="La fila mas alta es la 3 y con un total de {$sumafila3}";
            }
        }
        return "La suma de la fila 1 es {$sumafila1}</br>La suma de la fila 2 es {$sumafila2}</br>La suma de la fila 3 es {$sumafila3}</br>{$filaalta}";
    }
    $fila1num1=($_REQUEST["fila1num1"] );
    $fila1num2=($_REQUEST["fila1num2"] );
    $fila1num3=($_REQUEST["fila1num3"] );
    $fila2num1=($_REQUEST["fila2num1"] );
    $fila2num2=($_REQUEST["fila2num2"] );
    $fila2num3=($_REQUEST["fila2num3"] );
    $fila3num1=($_REQUEST["fila3num1"] );
    $fila3num2=($_REQUEST["fila3num2"] );
    $fila3num3=($_REQUEST["fila3num3"] );
    $numeros=[$fila1num1,$fila1num2,$fila1num3,$fila2num1,$fila2num2,$fila2num3,$fila3num1,$fila3num2,$fila3num3];
    
    echo "<p>",filaMasAlta($numeros),"</p>";
    ?>
</body>
</html>