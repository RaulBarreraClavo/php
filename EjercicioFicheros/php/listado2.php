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
    $directorio = opendir(".");
    print "El directorio actual es:";
    echo getcwd();
    print " <h1> Su contenido es </h1>";
    while ($archivo = readdir($directorio)) {
        if (!is_dir($archivo)) {
            echo $archivo . "-con un tamaño de :" . filesize($archivo) . "bytes
<br/>";
        }
    }
    Closedir($directorio);
    ?>

</body>

</html>