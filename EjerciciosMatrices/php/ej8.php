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
    $paises[0]["Nombre"]="España";
    $paises[0]["Moneda"]="Peseta";
    $paises[0]["Lengua"]="Castellano";
    $paises[1]["Nombre"]="Francia";
    $paises[1]["Moneda"]="Franco";
    $paises[1]["Lengua"]="Frances";
    $paises[2]["Nombre"]="Italia";
    $paises[2]["Moneda"]="Lira";
    $paises[2]["Lengua"]="Italiano";
    $paises[3]["Nombre"]="Reino Unido";
    $paises[3]["Moneda"]="Libra";
    $paises[3]["Lengua"]="Ingles";
    $paises[4]["Nombre"]="Alemania";
    $paises[4]["Moneda"]="Marco";
    $paises[4]["Lengua"]="Aleman";
   
// print "<pre>/n";print_r($paises);print"</pre>/n";



echo "<table>";
echo "<th>Nombre</th>";
    echo "<th>Moneda</th>";
    echo "<th>Lengua</th>";

foreach ($paises as $pais) {
    
    echo "<tr>";
   
    foreach ($pais as $datos) {

      
       
        echo "<td style='width=20px; border:1px solid black;'><div ><p >",$datos,"</p></div></td>";
       
    }

    echo "</tr>";
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