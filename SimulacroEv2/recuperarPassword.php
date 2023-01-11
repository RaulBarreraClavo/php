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
    include "./crearBD.php";
    $conexion=crearBD();
    // $dsn="mysql:host=localhost;dbname=usuarios";
    // $dbh=new PDO($dsn,"root","");
    if (isset($_REQUEST["enviar"])) {
        $contfallos = 0;
        if (validar("usuario", "/^([[:alnum:]]|| )+$/")) {
            $usuario = $_REQUEST["usuario"];
        } else {
            $contfallos++;
        }
        if (validar("login", "/^([[:alnum:]])+$/")) {
            $login = $_REQUEST["login"];
        } else {
            $contfallos++;
        }
        if (validar("mail", "/^([[:alnum:]]||@||.)+$/")) {
            $mail = $_REQUEST["mail"];
        } else {
            $contfallos++;
        }

        if ($contfallos == 0) {
           
            $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE login=:login and nombre=:nombre;");
            $consulta->bindParam(":login",$login);
            $consulta->bindParam(":nombre",$usuario);
            $consulta->execute();
            

            if ($consulta->rowCount() != 0) {
               $resultado= $consulta->fetch();
                $password=$resultado["password"];
                echo $password;
                $headers="MIME-Version:1.0\r\n";
                $headers.="Content-type:text/html;charset=utf-8\r\n";
                $headers.="From:raulbarreraphp@gmail.com\r\n";
                $para = $mail;
                $asunto = "Recuperacion Contraseña";
                $descripcion = "Su contraseña es: $password";
           
                if (mail($para, $asunto, $descripcion, $headers)) {
                    header("Location:./login.php");
                } else {
                    echo "<p>error</p>";
                }
           
               
            } else {
                echo "<p style='color:red;'>Datos incorrectos</p>";
            }
        } else {
            echo "<p style='color:red;'>Datos incorrectos</p>";
        }
    }
    ?>
    <form method="POST">
        <p>Nombre del Usuario:<input type="text" name="usuario"></p>
        <p>Mail de destino:<input type="text" name="mail"></p>
        <p>Login:<input type="text" name="login"></p>
        
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>