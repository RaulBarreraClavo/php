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
$dado1 = rand(1, 6);
$dado2 = rand(1, 6);
$dado3 = rand(1, 6);
$dado4 = rand(1, 6);


switch ($dado1) {
    case 1:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/1.svg'></div>";
        break;
    case 2:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/2.svg'></div>";
        break;
    case 3:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/3.svg'></div>";
        
        break;
    case 4:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/4.svg'></div>";
        break;
    case 5:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/5.svg'></div>";
        break;
    case 6:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/6.svg'></div>";
        break;
}
switch ($dado2) {
    case 1:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/1.svg'></div>";
        break;
    case 2:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/2.svg'></div>";
        break;
    case 3:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/3.svg'></div>";
        
        break;
    case 4:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/4.svg'></div>";
        break;
    case 5:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/5.svg'></div>";
        break;
    case 6:
        echo"<div style='background-color:red;float:left;'><img src='../imagenes/6.svg'></div>";
        break;
}
switch ($dado3) {
    case 1:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/1.svg'></div>";
        break;
    case 2:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/2.svg'></div>";
        break;
    case 3:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/3.svg'></div>";
        
        break;
    case 4:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/4.svg'></div>";
        break;
    case 5:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/5.svg'></div>";
        break;
    case 6:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/6.svg'></div>";
        break;
}
switch ($dado4) {
    case 1:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/1.svg'></div>";
        break;
    case 2:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/2.svg'></div>";
        break;
    case 3:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/3.svg'></div>";
        
        break;
    case 4:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/4.svg'></div>";
        break;
    case 5:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/5.svg'></div>";
        break;
    case 6:
        echo"<div style='background-color:blue;float:left;'><img src='../imagenes/6.svg'></div>";
        break;
}
echo "<br>";
if ($dado1==$dado2 and $dado3!=$dado4){
    echo "<p>Ha ganado el jugador uno</p>";
}elseif ($dado1!=$dado2 and $dado3==$dado4){
    echo "<p>Ha ganado el jugador dos</p>";
}elseif ($dado1==$dado2 and $dado3==$dado4){
    if ($dado1>$dado3){
        echo "<p>Ha ganado el jugador uno</p>"; 
    }elseif ($dado1<$dado3){
        echo "<p>Ha ganado el jugador dos</p>"; 
    }else{
        echo "<p>Han empatado</p>"; 
    }
}else{
    $suma1=$dado1+$dado2;
    $suma2=$dado3+$dado4;
    if ($suma1>$suma2){
        echo "<p>Ha ganado el jugador uno</p>"; 
    }elseif ($suma1<$suma2){


        echo "<p>Ha ganado el jugador dos</p>"; 
    }else{
        echo "<p>Han empatado</p>"; 
    }
}




?>
    
</body>
</html>