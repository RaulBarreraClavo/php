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
   
    if (isset(($_REQUEST["sexo"] )) ){
        $sexo=($_REQUEST["sexo"] );
       
       echo"<p>Es un ",$sexo,"</p>";
         
        
    }else{
        echo "<p style='color:red;'>Tiene que rellenar el campo</p>";
    }
    
    
    
    ?>
</body>
</html>