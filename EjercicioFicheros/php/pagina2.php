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


    if (isset(($_REQUEST["nombre"]))) {
        $nombre = $_REQUEST["nombre"];
    }
    if (isset(($_REQUEST["comentario"]))) {
        $comentario = $_REQUEST["comentario"];
    }

    $fichero = fopen("../datos.txt", 'a');
    if ($fichero) {
        $texto = "\n " . $nombre . "\n " . $comentario . "\n-------------------------";


        fwrite($fichero, $texto);

        fclose($fichero);
    }

    echo "<p>Los datos se cargaron correctamente</p>";
    echo "<p>Pulse <a href='./pagina3.php'>aqui</a> para ver todo el contenido del fichero</p>";


    ?>

</body>


</html>