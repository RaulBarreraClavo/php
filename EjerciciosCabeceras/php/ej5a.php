<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="../php/ej5.php" method="post">
        <p>Introduzca un nombre y una edad entre 18 y 130</p>
        <p>Nombre:<input type="text" name="nombre">
    <?php
      if(isset($_GET["nombre"])){
        echo"<b style='color:red;'>No ha escrito su nombre</b>";
      }
      if(isset($_GET["nombreNoPatron"])){
        echo"<b style='color:red;'>El nombre  tiene  caracteres invalidos </b>";
      }
    ?>
    </p>
        <p>Edad:<input type="text" name="edad">
    <?php
     if(isset($_GET["edad"])){
        echo"<b style='color:red;'>No ha escrito su edad</b>";
      
      }
      if(isset($_GET["edadlimites"])){
          echo"<b style='color:red;'>La edad no esta entre 18 y 130</b>";
        }
        if(isset($_GET["edadNoEntero"])){
          echo"<b style='color:red;'>La edad no es un numero entero</b>";
        }
    ?>
    </p>
        <button type="submit">Redireccionar</button>
    </form>
</body>
</html>