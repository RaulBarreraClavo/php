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
                    $_REQUEST[$key][$posicion] = trim(htmlspecialchars(strip_tags($_REQUEST[$key][$posicion]), ENT_QUOTES, "utf-8"));
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
    $contfallos = 0;
    $fallos = [];

    if (validar("nombre", "/^([[:alpha:]]|| )*$/")) {
        $nombre = $_REQUEST["nombre"];
    } else {
        $contfallos++;
        array_push($fallos, "nombre");
    }
    if (validar("destino", "/^([[:alpha:]]|| )*$/")) {
        $destino = $_REQUEST["destino"];
    } else {
        $contfallos++;
        array_push($fallos, "destino");
    }
    if (validar("duracion", "/^[0-9]+$/")) {
        $duracion = $_REQUEST["duracion"];
    } else {
        $contfallos++;
        array_push($fallos, "duracion");
    }
    if (validar("salida", "/^([[:alpha:]]|| ||,)*$/")) {
        $salida = $_REQUEST["salida"];
    } else {
        $contfallos++;
        array_push($fallos, "salida");
    }

    $textoFallo = "";

    if ($contfallos == 0) {
        $escritura = $nombre . ":" . $destino . ":" . $duracion . ":" . $salida . ";";
        $fichero = fopen("../viajes.txt", "a+");
        if ($fichero) {

            fwrite($fichero, $escritura);
            fclose($fichero);
        }
    } else {
       
        $cont = 0;
        foreach ($fallos as $fallo) {
            if ($cont == 0) {
                $textoFallo = $textoFallo . "$fallo=1 ";
            } else {
                $textoFallo = $textoFallo . "& $fallo=1";
            }

            $cont++;
        }

    
    }
    header("Location: ./ej6a.php?$textoFallo");

    ?>

</body>

</html>