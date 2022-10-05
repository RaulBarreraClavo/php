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
   function mostrarNombre($nombre,$apellidos){
        echo "<p>Su nombre es ",$nombre," ",$apellidos,"</p>";
   }
   function mostrarFallo(){
    echo "<p style='color:red;'>Tiene que rellenar los dos campos</p>";
}
   
    if (isset(($_REQUEST["nombre"] )) && isset(($_REQUEST["apellidos"] ))){
        $nombre=($_REQUEST["nombre"] );
        $apellidos=($_REQUEST["apellidos"] );
        if (!empty($nombre ) && !empty($apellidos )){
            mostrarNombre($nombre,$apellidos);
        }else{
            mostrarFallo();
        }
        
    }
    
    
    
    ?>
</body>
</html>