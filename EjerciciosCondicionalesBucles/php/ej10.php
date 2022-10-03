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
    $valorInicial=($_REQUEST["valInicial"] );
    $incremento=($_REQUEST["incremento"] );
    $numValores=($_REQUEST["numValores"] );
    $valor=$valorInicial;
   for($i=0;$i<$numValores;$i++){
    $valor+=$incremento;
    echo "<p>",$valor,"</p>";
   }
   ?>
    
</body>
</html>