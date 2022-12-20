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
    <?php
    include "./ej1.php";
    function sanear()
    {
        foreach ($_REQUEST as $key => $valor) {
            if (!is_array($_REQUEST[$key])) {
                $_REQUEST[$key] = trim(htmlspecialchars(strip_tags($_REQUEST[$key]), ENT_QUOTES, "utf-8"));
            } else {
                foreach ($_REQUEST[$key] as $posicion => $dato) {
                    $_REQUEST[$key][$posicion] = trim(htmlspecialchars(strip_tags($dato), ENT_QUOTES, "utf-8"));
                }
            }
        }
    }
    sanear();
    function validar($variable, $patron)
    {
        if (isset($_REQUEST[$variable])) {
            $valor = $_REQUEST[$variable];
            if (!empty($valor)) {
                if (preg_match($patron, $valor)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    $dbh = crearBD();
    if (isset($_REQUEST["enviar"])) {
        $contfallos = 0;
        if (validar("usuario", "/^([[:alnum:]]|| )+$/")) {
            $usuario = $_REQUEST["usuario"];
        } else {
            $contfallos++;
        }
        if (validar("password", "/^([[:alnum:]]|| )+$/")) {
            $password = $_REQUEST["password"];
        } else {
            $contfallos++;
        }

        if ($contfallos == 0) {
            echo "aaa";
            $resultados = $dbh->query("SELECT * FROM usuarios WHERE login='$usuario' and password='$password';");
      
            if ($resultados->rowCount() != 0) {


                $_SESSION["autorizado"] = true;
                 header("Location:aplicacion.php");
            } else {
                echo "<p>Contraseña incorrecta</p>";
            }
        } else {
            echo "<p style='color:red;'>Datos incorrectos</p>";
        }
    }
    ?>
    <form method="POST">
        <p>Usuario:<input type="text" name="usuario"></p>
        <p>Password:<input type="password" name="password"></p>
        <button type="submit" name="enviar">Loguearse</button>
    </form>
</body>

</html>