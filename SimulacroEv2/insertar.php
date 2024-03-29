
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
        if(isset($_REQUEST["enviar"])){
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
            if(validar("nombre","/^([[:alpha:]]|| )+$/")){
                $nombre=$_REQUEST["nombre"];

            }else{
                echo "<p style='color:red;'>Nombre invalido</p>";
                $contfallos++;
            }
            if(validar("apellidos","/^([[:alpha:]]|| ||-)+$/")){
                $apellidos=$_REQUEST["apellidos"];

            }else{
                echo "<p style='color:red;'>Apellidos invalidos</p>";
                $contfallos++;
            }
            $genero=$_REQUEST["genero"];
            if($genero=="..."){
                echo "<p style='color:red;'>Tienes que seleccionar un genero</p>";
                $contfallos++;
            }

            if($contfallos==0){
                include "./crearBD.php";
                $conexion=crearBD();
                $insertar=$conexion->prepare("INSERT INTO `personas`  VALUES (NULL, :nombre, :apellidos, :genero); 
                ");
                 $insertar->bindParam(":nombre",$nombre);
                 $insertar->bindParam(":apellidos",$apellidos);
                 $insertar->bindParam(":genero",$genero);
                $insertar->execute();
            }
      
          

       
        }
   
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
       
else{
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
<h1>Insertado</h1>
    <p><a href="./aplicacion.php">Volver</a></p>
    <form method="POST">
        <p>Nombre:<input type="text" name="nombre"></p>
        <p>Apellidos:<input type="text" name="apellidos"></p>
        <p>Genero:<select name="genero">
        <option selected value="...">...</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
        </select></p>
        <button type="submit" name="enviar">Insertar</button>
    </form>
    
</body>
</html>