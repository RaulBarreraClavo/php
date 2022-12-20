<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
   $conexion= crearBD();
    define("maximoRegistros",10);
    $consulta=$conexion->prepare("SELECT * FROM PERSONAS;");
    $consulta->execute();
    if($consulta->rowCount()>0){
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
        if (isset($_REQUEST["buscar"])) {
            $contfallos = 0;
            if (validar("nombre", "/^([[:alpha:]]|| )+$/")) {
                $nombre = $_REQUEST["nombre"];
            } else {
                echo "<p style='color:red;'>Nombre no válido</p>";
                $contfallos++;
            }
            if (validar("apellidos", "/^([[:alpha:]]|| ||-)+$/")) {
                $apellidos = $_REQUEST["apellidos"];
            } else {
                echo "<p style='color:red;'>Apellido no válido</p>";
                $contfallos++;
            }
            if($contfallos==0){
                $consulta=$conexion->prepare("SELECT * FROM personas WHERE nombre=:nombre and apellidos=:apellidos");
                $consulta->bindParam(":nombre",$nombre);
                $consulta->bindParam(":apellidos",$apellidos);
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                $consulta->execute();
                if($consulta->rowCount()>0){
                    $datosAMostrar="<table><thead><td style='border:1px solid black;'>Nombre</td><td style='border:1px solid black;'>Apellidos</td></thead><tbody>";
                    while ($row = $consulta->fetch()){
                        $datosAMostrar=$datosAMostrar."<tr><td style='border:1px solid black;'>$row[nombre]</td><td style='border:1px solid black;'>$row[apellidos]</td></tr>";
                   
                    }
                    $datosAMostrar=$datosAMostrar."</tbody></table>";
                    echo $datosAMostrar;
                }else{
                    echo "<p style='color:red;'>No se ha encontrado</p>";
                }
              
            }
        }

  

    }else{
        echo "<p style='color:red;'>No hay registros</p>";
    }
    
}catch(PDOException $e){
    echo $e->getMessage();
}
    
 }else{
     header("Location:./login.php");
 
 }

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
    <p><a href="./aplicacion.php">Pagina principal</a></p>
    <form method="POST">
        <p>Nombre: <input type="text" name="nombre"></p>
        <p>Apellidos: <input type="text" name="apellidos"></p>
        <button type="submit" name="buscar">Buscar</button>
    </form>
</body>
</html>