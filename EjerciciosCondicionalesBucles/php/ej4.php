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

switch ($dado3) {
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

if ($dado1==$dado2 || $dado2==$dado3 || $dado3==$dado1){
    if (($dado1==$dado2) and( $dado1==$dado3)){
        echo "<p>Es un trio de ",$dado1,"</p>";
    }elseif (($dado1==$dado2)||($dado1==$dado3)){
        echo "<p>Es una pareja de ",$dado1,"</p>";
    }else{
        echo "<p>Es una pareja de ",$dado2,"</p>";
    }
    
}else{
   if ($dado1>$dado2){
        if($dado1>$dado3){
            echo "Son numeros diferentes. El mayor valor es ", $dado1;
        }else{
            echo "Son numeros diferentes. El mayor valor es ", $dado3;
        }
   }else{
    if($dado2>$dado3){
        echo "Son numeros diferentes. El mayor valor es ", $dado2;
    }else{
        echo "Son numeros diferentes. El mayor valor es ", $dado3;
    }

   }

}
?>
    
</body>
</html>