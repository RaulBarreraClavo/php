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






    $cont = 0;

    $fichero = fopen("../contador.txt", 'r');
    if ($fichero) {

        $cont = fgets($fichero);
        $cont++;


        fclose($fichero);
    }

    $fichero = fopen("../contador.txt", 'w+');
    if ($fichero) {


        fwrite($fichero, $cont);

        fclose($fichero);
    }


    ?>

</body>


</html>