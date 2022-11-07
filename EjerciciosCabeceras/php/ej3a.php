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
    if(isset($_GET["error"])){
        echo "<p style='color:red;'>El nombre es incorrecto</p>";
    }
    ?>
    <form action="../php/ej3.php" method="post">
        <p>Introduzca un nombre</p>
        <p>Nombre:<input type="text" name="nombre"></p>
        <button type="submit">Redireccionar</button>
    </form>
</body>
</html>