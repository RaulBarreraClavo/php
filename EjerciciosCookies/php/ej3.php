<?php
setcookie("contador","1",time()+3600);

 $cont=0;   
if(isset($_COOKIE["contador"])){
    $cont=$_COOKIE["contador"];
    $cont++;
    setcookie("contador",$cont,time()+3600);
    echo"<p>$cont</p>";
}

$listaColores=["blue","red","pink","white","green"];
echo "<style>
        body{
            background-color:".$listaColores[$cont%5]."
        }
</style>
";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
