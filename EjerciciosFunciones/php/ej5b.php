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
    function ordenarMatriz($filas,$columnas,$matriz){
   
      $contfilas=0;
      $contmatriz=0;
     
      for ($i=0;$i<$filas;$i++){
        $contcolumnas=0;
        $contfilas++;
            echo "<p>";
        for ($j=0;$j<$columnas;$j++){
            $contcolumnas++;
            echo "<input value='",$matriz[$contmatriz],"'  name='fila",$contfilas,"num",$contcolumnas,"' style='width: 40px;'>";
            $contmatriz++;
        }
        echo "</p>";
      }
    

      
      
    }
   
    
    $numFilas=($_REQUEST["numfilas"] );
    $numColumnas=($_REQUEST["numcolumnas"] );
    $matrizinversa=[];
    for($i=$numFilas;$i>0;$i--){

        for($j=0;$j<=$numColumnas;$j++){
            $nombreVariable="fila{$i}num{$j}";

            if(isset($_REQUEST[$nombreVariable] )){
                array_push($matrizinversa,($_REQUEST[$nombreVariable] ));
            }

        }
       
    }
   
    echo "Matriz reversa:";
    ordenarMatriz($numFilas,$numColumnas,$matrizinversa);
    ?>
  


    </form>  
</body>
</html>