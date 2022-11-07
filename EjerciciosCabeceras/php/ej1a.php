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
        echo "<p style='color:red;'>La direccion es incorrecta</p>";
    }
    ?>
    <form action="../php/ej1.php" method="post">
        <p>Introduzca una direccion web</p>
        <p>Direccion(ej: https:/www.google.com):<input type="text" name="direccion"></p>
        <button type="submit">Redireccionar</button>
    </form>
</body>
</html>