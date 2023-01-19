<h1>Listado</h1>
    <p><a href="./aplicacion.php">Volver</a></p>
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    $tabla="<table>";
    include "./crearBD.php";
    $conexion=crearBD();
    $columnas=$conexion->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'pruebas' and TABLE_NAME = 'personas' order by ORDINAL_POSITION");
    $columnas->setFetchMode(PDO::FETCH_ASSOC);
    $columnas->execute();
   $arrayColumnas=[];
    if($columnas->rowCount()>0){
    
   
     while ($row = $columnas->fetch()){
        array_push($arrayColumnas,$row["COLUMN_NAME"]) ;
     }
    }
     $tabla.="<thead>";
     foreach($arrayColumnas as $columna){
        $tabla.="<td style='border:1px solid black'>$columna</td>";
     }
     $tabla.="<td style='border:1px solid black'>Editar</td>";
     $tabla.="<td style='border:1px solid black'>Eliminar</td>";
     
    $tabla.="</thead><tbody>";

     $consulta=$conexion->prepare("Select * from personas");
     $consulta->setFetchMode(PDO::FETCH_ASSOC);
     $consulta->execute();

     if($consulta->rowCount()>0){
     
    
      while ($row = $consulta->fetch()){
        $tabla=$tabla."  <tr >";
       foreach ($arrayColumnas as $key => $valor) {
        $tabla.=" <td style='border:1px solid black;'>$row[$valor]</td>";
    }
    $tabla.=" <td style='border:1px solid black;'><a href='./editar.php?id=".$row["id"]."'>Editar</a></td>";
    $tabla.=" <td style='border:1px solid black;'><a href='./eliminar.php?id=".$row["id"]."'>Eliminar</a></td>";
  
       $tabla.="  </tr >";
       
      }
     }


    $tabla.="</tbody></table>";
     echo $tabla; 
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
       
else{
    header("Location:./login.php");
}
?>