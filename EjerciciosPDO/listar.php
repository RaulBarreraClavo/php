<p><a href="./aplicacion.php">Pagina principal</a></p>
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
    $arrayColumnas=[];
   $conexion= crearBD();
   $columnas=$conexion->prepare("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_SCHEMA = 'agenda' and TABLE_NAME = 'personas' order by ORDINAL_POSITION");
   $columnas->setFetchMode(PDO::FETCH_ASSOC);
   $columnas->execute();
   if($columnas->rowCount()>0){
   
  
    while ($row = $columnas->fetch()){
       array_push($arrayColumnas,$row["COLUMN_NAME"]) ;
    }
    }
    if(isset($_GET["tipo"])){
        $tipo=$_GET["tipo"];
        $arraytipo=explode("-",$tipo);
        $consulta=$conexion->prepare("SELECT * FROM personas order by $arraytipo[1] $arraytipo[0];");
    }else{
        $consulta=$conexion->prepare("SELECT * FROM personas;");
    }
 
   $consulta->setFetchMode(PDO::FETCH_ASSOC);
   $consulta->execute();
   if($consulta->rowCount()>0){
    $tabla= "<table >
    <thead >";
    foreach ($arrayColumnas as $key => $valor) {
        $tabla=$tabla." <td style='border:1px solid black;'>$valor<a href='./listar.php?tipo=asc-$valor'><img src='./arriba.png' width='20' height='20'></a><a href='./listar.php?tipo=desc-$valor'><img src='./abajo.png' width='20' height='20'></a></td>";
    }
   
   $tabla=$tabla." <tbody >";
      
  
    while ($row = $consulta->fetch()){
       $tabla=$tabla."  <tr >";
       foreach ($arrayColumnas as $key => $valor) {
        $tabla=$tabla." <td style='border:1px solid black;'>{$row[$valor]}</td>";
    }
    //    <td style='border:1px solid black;'>{$row["nombre"]}</td>
    //    <td style='border:1px solid black;'>{$row["apellidos"]}</td>
       $tabla=$tabla."  </tr >";
        }
        $tabla=$tabla."  </tbody>
        </table>";
        echo "$tabla";
   }else{
    echo "<p style='color:red;'>No hay registros</p>";
   }
}catch(PDOException $e){
    echo $e->getMessage();
}
}else{
    header("Location:./login.php");

}
?>

