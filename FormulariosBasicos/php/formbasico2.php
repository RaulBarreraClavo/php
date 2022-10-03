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
    $peso=($_REQUEST["peso"] );
    $altura=($_REQUEST["altura"] );
    $alturaenm=$altura/100;
   
    if ($peso>=0 && $altura>=0){
        $imc=$peso/($alturaenm*$alturaenm);
        echo "Con una altura de ",$altura," cm, y un peso de ",$peso," kg su indice de masa corporal es de: ",$imc;
    }else{
        echo "El peso y la altura no pueden ser negativos";
    }
   
    ?>
    
</body>
</html>