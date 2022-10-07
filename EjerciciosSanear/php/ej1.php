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
   function mostrarNombre($nombre){
        echo "<p>Su nombre es ",$nombre,"</p>";
   }
   function mostrarFallo(){
    echo "<p style='color:red;'>Tiene que rellenar los dos campos</p>";
}
   
    if (isset($_REQUEST["nombre"] )){
        $nombre=($_REQUEST["nombre"] );
       
        if (!empty($nombre )){
            mostrarNombre($nombre);
        }else{
            mostrarFallo();
        }
        
    }
    
    
    
    ?>
</body>
<form  method="post" >
        <p>Validacion</p>
        <br>
        <p>Nombre:  <input type="text"  name="nombre"></p>
        <p>Telefono:  <input type="number"  name="telefono"></p>
        <p>Correo:  <input type="email"  name="email"></p>
      
       <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="borrar" value="Borrar">


    </form>      
</html>