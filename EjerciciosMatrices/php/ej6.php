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
    $minValores=($_REQUEST["numminval"] );
    $maxValores=($_REQUEST["nummaxval"] );
    $valorMin=($_REQUEST["valmin"] );
 
    $valorMin=($_REQUEST["valmin"] );
    $valorMax=($_REQUEST["valmax"] );
    $valorEliminar=($_REQUEST["valeliminar"] );
 
    $valores=rand($minValores,$maxValores);
    $valor=[];
    echo "<p> Numero de valores: ",$valores,"</p>";
   

   for($i=0;$i<$valores;$i++){
    array_push($valor,rand($valorMin,$valorMax));
  
  
   }
   foreach( $valor as $indice=>$num){
    echo "<p>Numero ",$indice+1," :",$num,"</p>";

   }
   echo "<p>Valor a eliminar: ",$valorEliminar,"</p>";
  $indiceseliminar= array_keys($valor,$valorEliminar);
   foreach( $indiceseliminar as $indice){
    unset($valor[$indice]);

   }
   sort($valor);
   foreach( $valor as $indice=>$num){
    echo "<p>Numero ",$indice+1," :",$num,"</p>";

   }

  
   ?>
    
</body>
</html>