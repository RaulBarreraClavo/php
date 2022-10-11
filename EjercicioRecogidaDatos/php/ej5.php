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
    function mostrarEdad($edad)
    {
        switch ($edad) {
            case "...":
                echo "<p style='color:red;'>Tiene que marcar alguna opcion</p>";
                break;
            case "menos20":
                echo "<p>Edad: Menos de 20 años</p>";
                break;
            case "20-39":
                echo "<p>Edad: Entre 20 y 39 años</p>";
                break;
            case "40-59":
                echo "<p>Edad: Entre 40 y 59 años</p>";
                break;
            case "mas60":
                echo "<p>Edad: 60 años o más</p>";
                break;
        }
    }



    if (isset($_REQUEST["edad"])) {
        $edad = ($_REQUEST["edad"]);
        mostrarEdad($edad);
    } else {

        echo "<p style='color:red;'>Tiene que marcar alguna opcion</p>";
    }





    ?>
</body>

</html>