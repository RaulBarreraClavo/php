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
    $colores["ColoresFuertes"][0]="ff0000";
    $colores["ColoresFuertes"][1]="ffe800";
    $colores["ColoresFuertes"][2]="003eff";
    $colores["ColoresSuaves"][0]="00ffe4";
    $colores["ColoresSuaves"][1]="e400ff";
    $colores["ColoresSuaves"][2]="83183f";
   $cont=0;
    echo "<table>";

foreach ($colores as $tipo) {
    echo "<tr>";
    if($cont==0){
        echo "<th>Colores Fuertes:</th>";
    }else{
        echo "<th>Colores Suaves:</th>";
    }
  
    foreach ($tipo as $color) {

      
        
        echo "<td style='width=20px; border:1px solid black;'><div style='background-color:#",$color,";' class=circulo><p class=numero>",$color,"</p></div></td>";
       
    }

    echo "</tr>";
    $cont++;
}



echo "</table>";
   
    // for($i=1;$i<=count($dias);$i++){
    //     echo "<p>",$dias[$i],"</p>";
    // }
   
    // foreach ($dias as $dia){
    //     echo "<p>",$dia,"</p>";
    // }


    ?>
</body>
</html>