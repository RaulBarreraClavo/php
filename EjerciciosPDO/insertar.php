<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
   $conexion= crearBD();
    define("maximoRegistros",10);
    $consulta=$conexion->prepare("SELECT * FROM PERSONAS;");
    if($consulta->rowCount()<maximoRegistros){
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
        $arrayColumnas=[];
        $columnas=$conexion->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'agenda' and TABLE_NAME = 'personas' order by ORDINAL_POSITION");
        $columnas->setFetchMode(PDO::FETCH_ASSOC);
        $columnas->execute();
        if($columnas->rowCount()>0){
        
       
         while ($row = $columnas->fetch()){
            array_push($arrayColumnas,$row["COLUMN_NAME"]) ;
         }
         }
        if (isset($_REQUEST["anadir"])) {
            $contfallos = 0;
            $listavalores=[];
            foreach ($arrayColumnas as $key => $valor) {
                if (validar("$valor", "/^([[:alnum:]]|| ||-)+$/")) {
                    array_push($listavalores,["$valor", $_REQUEST["$valor"]]) ;
                } else {
                    echo "<p style='color:red;'>$valor no válido</p>";
                    $contfallos++;
                }
              
            }
         
          
          
            if($contfallos==0){
                $contlista=0;
                $consultaTexto="SELECT * from personas where ";
                foreach($listavalores as $key=>$value){
                  
                    // foreach($value as $indice=>$valor){
                        if($contlista==0){
                            $consultaTexto=$consultaTexto." $value[0]=:$value[0] ";
                        }else{
                            $consultaTexto=$consultaTexto."and $value[0]=:$value[0] ";
                        }
                      
                    // }
                 $contlista++;
                }
            
                $consulta=$conexion->prepare($consultaTexto);
                foreach($listavalores as $key=>$value){
                
                        $consulta->bindParam(":$value[0]",$value["1"]);
                    
                 
                }
             
                // $consulta->bindParam(":apellidos",$apellidos);
                $consulta->execute();
                if($consulta->rowCount()==0){
                    $continserccion=0;
                    $consultaInsertar="Insert into personas values(";
                    foreach($listavalores as $key=>$value){
                   
                      
                            if($continserccion==0){
                                $consultaInsertar=$consultaInsertar." :$value[0] ";
                        }else{
                            $consultaInsertar=$consultaInsertar.", :$value[0] ";
                        }
             
                    
                    $continserccion++;
                }
                    $consultaInsertar=$consultaInsertar.")";
                   echo $consultaInsertar;
                    $inserccion=$conexion->prepare($consultaInsertar);
                    foreach($listavalores as $key=>$value){
                     
                         
                            $inserccion->bindValue(":$value[0]",$value["1"]);

                    
                }
                  
                  
                    $inserccion->execute();
                    echo "<p style='color:green;'>Datos insertados en la BD</p>";
                }else{
                    echo "<p style='color:red;'>El registro ya existe</p>";
                }
              
            }
        }

  

    }else{
        echo "<p style='color:red;'>No se pueden insertar más registros</p>";
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
        <?php
        $form="";
       foreach ($arrayColumnas as $key => $valor) {
        $form=$form."    <p>$valor: <input type='text' name='$valor'></p>";
    }
    echo "$form";
   
        ?>
        <!-- <p>Nombre: <input type="text" name="nombre"></p>
        <p>Apellidos: <input type="text" name="apellidos"></p> -->
        <button type="submit" name="anadir">Añadir</button>
    </form>
</body>
</html>