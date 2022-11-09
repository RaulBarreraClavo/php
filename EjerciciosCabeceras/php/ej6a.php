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
    $file = fopen("../viajes.txt", "a+");
    $datos = "";
    if ($file) {
        while (!feof($file)) {
            $datos = $datos . fgets($file);
        }
        $viajes = explode(";", $datos);
        $tabla = " <table style='border:1px solid black;'>
     <thead style='background-color:pink;'>
         <td>Nombre</td>
         <td>Destino</td>
         <td>Duracion</td>
         <td>Salida</td>
     </thead>
     <tbody >";
        foreach ($viajes as $viaje) {
            $datosViaje = explode(":", $viaje);
            $tabla = $tabla . "<tr >";
            $cont=0;
            foreach ($datosViaje as $valor) {
                if($cont==2){
                    $tabla = $tabla . "<td>$valor dias</td>";
                }else{
                    $tabla = $tabla . "<td>$valor</td>";
                }
               
                $cont++;
            }
            $tabla = $tabla . "</tr>";
        }
        $tabla = $tabla . " </tbody>
     </table>";
        echo "$tabla";
        fclose($file);
    }
   
    ?>
    <form action="./ej6.php" method="post">


        <p>Introduzca el nombre del circuito:<input type="text" name="nombre">
    <?php
     if(isset($_GET["nombre"])){
        echo "<b style='color:red;'>Nombre incorrecto</b>";
    }
    ?>
    </p>
        <p>Introduzca el destino:<input type="text" name="destino">
        <?php
     if(isset($_GET["destino"])){
        echo "<b style='color:red;'>Destino incorrecto</b>";
    }
    ?></p>
        <p>Introduzca la duracion:<input type="text" name="duracion">
        <?php
     if(isset($_GET["duracion"])){
        echo "<b style='color:red;'>Duracion incorrecta</b>";
    }
    ?></p>
        <p>Introduzca los dias de salida:<input type="text" name="salida">
        <?php
     if(isset($_GET["salida"])){
        echo "<b style='color:red;'>Salida incorrecta</b>";
    }
    ?></p>
        <button type="enviar">Enviar</button>
    </form>
</body>

</html>