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
        echo "<p style='color:red;'>La edad no esta entre 18 y 130 años</p>";
    }
    ?>
    <form action="../php/ej4.php" method="post">
        <p>Introduzca una edad entre 18 y 130</p>
        <p>Edad:<input type="text" name="edad"></p>
        <button type="submit">Redireccionar</button>
    </form>
</body>
</html>