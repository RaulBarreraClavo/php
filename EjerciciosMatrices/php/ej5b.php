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
    if(isset(($_REQUEST["ordenacion"] ))){
        $ordenacion=($_REQUEST["ordenacion"] );
    }else{
        $ordenacion="";
    }
    $valorMax=($_REQUEST["valmax"] );
 
    $valores=rand($minValores,$maxValores);
    $valor=[];
    echo "<p> Numero de valores: ",$valores,"</p>";

   for($i=0;$i<$valores;$i++){
    array_push($valor,rand($valorMin,$valorMax));
  
  
   }
   if ($ordenacion=="directa"){
    sort($valor,SORT_NUMERIC);
   }elseif ($ordenacion=="inversa"){
    rsort($valor,SORT_NUMERIC);
   }
   foreach( $valor as $indice=>$num){
    echo "<p>Numero ",$indice+1," :",$num,"</p>";

   }

  
   ?>
    
</body>
</html>