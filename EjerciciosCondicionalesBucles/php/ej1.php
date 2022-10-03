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



switch ($dado1) {
    case 1:
        echo"<img src='../imagenes/1.svg'>";
        break;
    case 2:
        echo"<img src='../imagenes/2.svg'>";
        break;
    case 3:
        echo"<img src='../imagenes/3.svg'>";
        
        break;
    case 4:
        echo"<img src='../imagenes/4.svg'>";
        break;
    case 5:
        echo"<img src='../imagenes/5.svg'>";
        break;
    case 6:
        echo"<img src='../imagenes/6.svg'>";
        break;
}
switch ($dado2) {
    case 1:
        echo"<img src='../imagenes/1.svg'>";
        break;
    case 2:
        echo"<img src='../imagenes/2.svg'>";
        break;
    case 3:
        echo"<img src='../imagenes/3.svg'>";
        
        break;
    case 4:
        echo"<img src='../imagenes/4.svg'>";
        break;
    case 5:
        echo"<img src='../imagenes/5.svg'>";
        break;
    case 6:
        echo"<img src='../imagenes/6.svg'>";
        break;
}

if ($dado1==$dado2){
    echo "<p>Son iguales</p>";
}elseif ($dado1>$dado2){
    echo "<p>No ha sacado pareja. El valor más alto es ",$dado1,"</p>";


}else{
    echo "<p>No ha sacado pareja. El valor más alto es ",$dado2,"</p>";
}


?>
    
</body>
</html>
