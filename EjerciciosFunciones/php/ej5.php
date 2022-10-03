
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
    function cargarMatriz($filas,$columnas){
      echo "<form action='ej5b.php' method='post' > <p>Introduzca los elemento de una matriz</p><br>";
      $contfilas=0;
     
      for ($i=0;$i<$filas;$i++){
        $contcolumnas=0;
        $contfilas++;
            echo "<p>";
        for ($j=0;$j<$columnas;$j++){
            $contcolumnas++;
            echo "<input  name='fila",$contfilas,"num",$contcolumnas,"' style='width: 40px;'>";
        }
        echo "</p>";
      }

      echo " <p hidden>Filas:  <input  name='numfilas' value='",$filas,"'></p>
      <p hidden>Columnas:  <input  name='numcolumnas' value='",$columnas,"'></p>";
      
      echo "<input type='submit' name='enviar' value='Enviar'>
        <input type='reset' name='borrar' value='Borrar'>";
    }
    $numFilas=($_REQUEST["numfilas"] );
    $numColumnas=($_REQUEST["numcolumnas"] );

    cargarMatriz($numFilas,$numColumnas);
    ?>
  


    </form>  
</body>
</html>