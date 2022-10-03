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
    $dias["1"]="Lunes";
    $dias["2"]="Martes";
    $dias["3"]="Miercoles";
    $dias["4"]="Jueves";
    $dias["5"]="Viernes";
    $dias["6"]="Sabado";
    $dias["7"]="Domingo";
    echo "<p>For normal: </p></br>";
    for($i=1;$i<=count($dias);$i++){
        echo "<p>",$i,":",$dias[$i],"</p>";
    }
    echo "</br><p>ForEach: </p></br>";
    foreach ($dias as $num=>$dia){
        echo "<p>",$num,":",$dia,"</p>";
    }


    ?>
</body>
</html>