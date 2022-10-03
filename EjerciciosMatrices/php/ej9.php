
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
    $clubes=["Barcelona-Nou Camp", "Real Madrid-Santiago Bernabeu", "Valencia-Mestalla", "Real Sociedad-Anoeta"];
   $indices=[];
// print "<pre>/n";print_r($paises);print"</pre>/n";
    foreach($clubes as $indice=>$club){
        $datos=explode("-",$club);
        echo "<p>",$indice,". El club ",$datos[0]," tiene de estadio el ",$datos[1],"</p>";
        if($datos[0]=="Real Madrid"){
            array_push($indices,$indice);
        }
    }
   
    foreach( $indices as $indice){
        unset($clubes[$indice]);
       
       }
       sort($clubes);
    foreach($clubes as $indice=>$club){
        
        $datos=explode("-",$club);
        
        echo "<p>",$indice,". El club ",$datos[0]," tiene de estadio el ",$datos[1],"</p>";
       
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