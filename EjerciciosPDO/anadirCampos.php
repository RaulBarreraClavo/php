<?php
session_start();

if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
      $conexion= crearBD();
    if(isset($_REQUEST["anadir"])){
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
        $contfallos=0;
        if(validar("nombre","/^([[:alpha:]])+$/")){
            $nombre=$_REQUEST["nombre"];
        }else{
            $contfallos++;
            echo "<p style='color:red;'>Nombre no válido</p>";
        }

        if(validar("tipo","/^([[:alnum:]]||\(||\))+$/")){
            $tipo=$_REQUEST["tipo"];
        }else{
            $contfallos++;
            echo "<p style='color:red;'>Tipo no válido</p>";
        }
        if($contfallos==0){
          
    $anadirColumna=$conexion->prepare("ALTER TABLE personas ADD $nombre $tipo ;");
  
   
   
    $anadirColumna->execute();
    echo "<p style='color:green;'>Columna añadida correctamente</p>";
        }
        
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
    <form method="POST">
        <p>Nombre:<input type="text" name="nombre"></p>
        <p>Tipo de datos:<input type="text" name="tipo"></p>
        <p><button type="submit" name="anadir">Añadir</button></p>
    </form>
</body>
</html>