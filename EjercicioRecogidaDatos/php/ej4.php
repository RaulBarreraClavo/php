
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
 if (isset(($_REQUEST["enviar"] )) ){
 
    
$contcolor=0;

   
if (isset(($_REQUEST["fondo"] )) ){
    $fondo=($_REQUEST["fondo"] );
   
   $contcolor++;
  
}
 if (isset(($_REQUEST["letra"] )) ){
    $letra=($_REQUEST["letra"] );
   
    $contcolor++;
 }

if ($contcolor<2){
    echo "<p style='color:red;'>Tiene que marcar algun checkbox</p>";
}else{
    cambiarColor($fondo,$letra);
}
 }
   function cambiarcolor($fondo,$letra){
    print "<style>";
        print"body{";
            print "background-color:".$fondo;
            print"color:".$letra;
        print"}";
    print"<style>";
   }
   
    
    
    
    
    ?>

     <form action=""  method="post">
        <p>Elige los colores a cambiar: </p>
        <br>

       



        <p>Elige el color de fondo de la pagina:  <input type="color"  name="fondo"></p>
        <p>Elige el color de la letra de la pagina:  <input type="color"  name="letra"></p>
      
       <input type="submit" name="enviar" value="Enviar">
        <input type="reset" name="borrar" value="Borrar">

    </form>
</body>
</html>
