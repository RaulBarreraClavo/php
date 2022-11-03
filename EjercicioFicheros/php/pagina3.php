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






    $texto = "";

    $fichero = fopen("../datos.txt", 'r');
    if ($fichero) {
        while (!feof($fichero)) {
            $texto = fgets($fichero);
            echo "$texto <br>";
        }



        fclose($fichero);
    }




    ?>

</body>


</html>