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

if (isset($_REQUEST["enviar"])) {
    $mensaje = $_REQUEST["mensaje"];
sanear();
    $contfallos = 0;
    if (validar("nombre", "/^[[:alpha:]|| ]+$/")) {
        $nombre = $_REQUEST["nombre"];
    } else {
        echo "<p style='color:red;'>Nombre inválido</p>";
        $contfallos++;
    }
   
    if (validar("email", "/^[[:alnum:]||@||\.]+$/")) {
        $email = $_REQUEST["email"];
    } else {
        echo "<p style='color:red;'>email inválido</p>";
        $contfallos++;
    }
   

  
    if ($contfallos == 0) {
        $headers="MIME-Version:1.0\r\n";
        $headers.="Content-type:text/plain;charset=utf-8\r\n";
        $headers.="From:raulbarreraphp@gmail.com\r\n";
        $para = $email;
        $asunto = "";
        $descripcion = $mensaje;
   
        if (mail($para, $asunto, $descripcion, $headers)) {
            echo "<p style='color:green;'>exito</p>";
            echo "<p>Nombre:$nombre</p>";
 
            echo "<p>Email:$email</p>";
       
            echo "<p>Mensaje:$mensaje</p>";
        } else {
            echo "<p>error <a href='./ej2.php'>Pulsa</a></p>";
            header("refresh:5;url=./ej2.php");
        }
    }
}else{


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
        <p>Nombre: <input type="text" name="nombre"></p>
       
        <p>Email: <input type="text" name="email"></p>
     
        <textarea name="mensaje"></textarea>
        <button type="submit" name="enviar">Enviar</button>
    </form>
</body>

</html>
<?php
}
?>