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
    $valores=rand(5,15);
   $numeros=[];
   echo "<p>Numero de valores: ",$valores,"</p>";
   for($i=0;$i<$valores;$i++){
        $numero=rand(1,10);
        array_push($numeros,$numero);
   }

   foreach($numeros as $valor){
    echo "<p>Numero: ",$valor,"</p>";
   }



   
    // for($i=1;$i<=count($dias);$i++){
    //     echo "<p>",$dias[$i],"</p>";
    // }
   
    // foreach ($dias as $dia){
    //     echo "<p>",$dia,"</p>";
    // }


    ?>
</body>
</html>