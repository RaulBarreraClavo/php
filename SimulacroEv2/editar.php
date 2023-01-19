
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
        $id=$_GET["id"];
        include "./crearBD.php";
        $conexion=crearBD();
        $consulta=$conexion->prepare("Select * from personas where id=:id");
        $consulta->bindParam(":id",$id);
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
      
        if($consulta->rowCount()>0){
        
       
         while ($row = $consulta->fetch()){
        $nombreantiguo=$row["nombre"];
        $apellidosantiguo=$row["apellidos"];
        $generoantiguo=$row["sexo"];
         }
        }

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
              
                $insertar=$conexion->prepare("UPDATE personas set nombre=:nombre , apellidos=:apellidos, sexo=:genero WHERE id=:id; ");
                 $insertar->bindParam(":nombre",$nombre);
                 $insertar->bindParam(":apellidos",$apellidos);
                 $insertar->bindParam(":genero",$genero);
                $insertar->execute();
                header("Location:./listar.php");
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
<h1>Editar</h1>
    <p><a href="./aplicacion.php">Volver</a></p>
    <form method="POST">
        <p>Nombre:<input type="text" placeholder=<?php
           echo $nombreantiguo;
           
        ?> name="nombre"></p>
        <p>Apellidos:<input type="text" placeholder=<?php
           echo $apellidosantiguo;
           
        ?> name="apellidos"></p>
        <p>Genero:<select name="genero">
     
            <option <?php
            if($generoantiguo=="F"){
                echo "selected";
            }
            ?> value="F">Femenino</option>
            <option <?php
            if($generoantiguo=="M"){
                echo "selected";
            }
            ?> value="M">Masculino</option>
        </select></p>
        <button type="submit" name="enviar">Insertar</button>
    </form>
    
</body>
</html>