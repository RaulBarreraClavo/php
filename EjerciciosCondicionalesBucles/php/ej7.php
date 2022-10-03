<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .circulo{
       
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }
    </style>
<body>
<?php
$circulos = rand(1, 10);
echo $circulos," Circulos <br>";

echo "<table>";
echo "<tr>";
for( $i=0;$i<$circulos;$i++){
    $col1 =rand(0,255);
    $col2 =rand(0,255);
    $col3 =rand(0,255);
    echo "<td style='width=20px; border:1px solid black;'><div style='background-color:rgb(",$col1,",",$col2,",",$col3,");' class=circulo></div></td>";
}

echo "</tr>";

echo "</table>";
?>
</body>
</html>