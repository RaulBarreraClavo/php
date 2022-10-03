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
    $paises["España"]="Madrid";
    $paises["Italia"]="Roma";
    $paises["Alemania"]="Berlin";
    $paises["Belgica"]="Bruselas";
    $paises["Francia"]="Paris";
    $paises["Dinamarca"]="Copenhage";
   
   

foreach ($paises as $pais=>$capital) {
   echo"<p>La capital de ",$pais," es ",$capital,"</p>";
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