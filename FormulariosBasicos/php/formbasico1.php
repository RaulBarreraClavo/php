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
    $segundosenviados=($_REQUEST["seg"] );
    $minutos= floor($segundosenviados/60);
    $segundos=$segundosenviados%60;
    if ($segundosenviados>=0){
        echo $segundosenviados," segundos son ",$minutos," minutos y ",$segundos," segundos";
    }else{
        echo "Los segundos enviados no pueden ser negativos";
    }
   
    ?>
    
</body>
</html>