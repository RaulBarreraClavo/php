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
$numdados = rand(1, 10);
echo "<p>",$numdados," dados</p>";
$contpares=0;
$contimpares=0;

for($i=0;$i<$numdados;$i++){
    $dado = rand(1, 6);
    if($dado%2==0){
        $contpares++;
    }else{
        $contimpares++;
    }

    
switch ($dado) {
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
}
echo "<p>Hay ",$contpares," numeros pares, y ",$contimpares," numeros impares</p>";




?>
</body>
</html>