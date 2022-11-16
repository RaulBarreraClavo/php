<?php
session_start();

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
    <form method="POST">
        <p>Usuario:<input type="text" name="nombre"></p>
        <p>Contraseña:<input type="password" name="contraseña"></p>
        <input type="submit" value="enviar">
    </form>
    <p>Para entrar debes escribir "usuario" en el primer campo y "123" en el segundo</p>
</body>
</html>