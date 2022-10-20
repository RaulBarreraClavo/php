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
function sanear(){
    foreach($_REQUEST as $key=>$valor){
        if(!is_array($_REQUEST[$key])){
            $_REQUEST[$key]=trim(htmlspecialchars(strip_tags($_REQUEST[$key]),ENT_QUOTES,"utf-8"));
           
        }else{
            foreach($_REQUEST[$key] as $posicion=>$dato){
                $_REQUEST[$key][$posicion]=trim(htmlspecialchars(strip_tags($dato),ENT_QUOTES,"utf-8"));
            }
        }
    }
}
function validacion($variable){
    if (isset($_REQUEST[$variable] ) ){
        $variable=($_REQUEST[$variable] );
       
        if (!empty($variable )){
           return true;
        
        }else{
            return false;
        }
        
    }else{
        return false;
    }
}

sanear();
  
   



if (validacion("nombre")){
    $nombre=($_REQUEST["nombre"] );
    if(preg_match("/^[A-Z]{1}[A-Z||a-z|| ]{2,11}$/",$nombre)){
   
        echo "<p>Nombre: ",$nombre,"</p>";
    }
    
}

if (validacion("apellido")){
    $apellido=($_REQUEST["apellido"] );
    
    if(preg_match("/^[A-Z]{1}[A-Z||a-z|| ]{2,11}$/",$apellido)){
   
        echo "<p>Apellido: ",$apellido,"</p>";
    }
    
}

if (validacion("direccion")){
    $direccion=($_REQUEST["direccion"] );
    
    if(preg_match("/^[[:alnum:]|| ]{3,12}$/",$direccion)){
   
        echo "<p>Direccion: ",$direccion,"</p>";
    }
    
}


if (validacion("fecha_nac")){
    $fecha_nac=($_REQUEST["fecha_nac"] );
    
    
   
        echo "<p>Fecha_nac: ",$fecha_nac,"</p>";
    
    
}


if (validacion("edad")){
    $edad=($_REQUEST["edad"] );
    
   
   
        echo "<p>Edad: ",$edad,"</p>";
    
    
}

if (validacion("genero")){
    $genero=($_REQUEST["genero"] );
    
   
   
        echo "<p>Genero: ",$genero,"</p>";
    
    
}

if (validacion("idiomas")){
   
    $idiomas=($_REQUEST["idiomas"] );
    
    echo "<p>Idiomas:";
   foreach($idiomas as $idioma)
        echo $idioma." ";
    
    echo "</p>";
}

if (validacion("email")){
    $email=($_REQUEST["email"] );
    
   
   
        echo "<p>Email: ",$email,"</p>";
    
    
}

if (validacion("estudios")){
    $estudios=($_REQUEST["estudios"] );
    
   
   
        echo "<p>Estudios: ",$estudios,"</p>";
    
    
}


    
    
    
    ?>

</body>


</html>