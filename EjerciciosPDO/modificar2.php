<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
   $conexion= crearBD();
    define("maximoRegistros",10);
   if(isset($_REQUEST["modificar"])){
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
        if($nombre!=$_SESSION["nombreModificar"]||$apellidos!=$_SESSION["apellidosModificar"]){
            $consulta=$conexion->prepare("Select * from personas where nombre=:nombre and apellidos=:apellidos");
            $consulta->bindParam(":nombre",$nombre);
            $consulta->bindParam(":apellidos",$apellidos);
            $consulta->execute();
            if($consulta->rowCount()<1){
                $modificacion=$conexion->prepare("UPDATE personas set nombre=:nombre , apellidos=:apellidos WHERE id=:id; ");
                $modificacion->bindParam(":nombre",$nombre);
                $modificacion->bindParam(":apellidos",$apellidos);
                $modificacion->bindParam(":id",$_SESSION["idModificar"]);
                $modificacion->execute();
                header("Location:./modificar.php");
    
            }else{
                echo "<p style='color:red;'>El registro al que intentas cambiar ya existe</p>";
            }
        }else{
            echo "<p style='color:red;'>Los nombres y apellidos son iguales a los anteriores</p>";
        }
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
    <p><a href="./aplicacion.php">Pagina principal</a></p>
    <form method="POST">
        <p>Nombre: <input type="text" name="nombre" placeholder="<?php
       echo  $_SESSION["nombreModificar"];
        ?>"></p>
        <p>Apellidos: <input type="text" name="apellidos" placeholder="<?php
       echo  $_SESSION["apellidosModificar"];
        ?>"></p>
        <button type="submit" name="modificar">Modificar</button>
    </form>
</body>
</html>