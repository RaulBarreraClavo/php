<p><a href="./aplicacion.php">Pagina principal</a></p>


<form method="POST">
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
   $conexion= crearBD();
   $consulta=$conexion->prepare("SELECT * FROM personas;");
   $consulta->setFetchMode(PDO::FETCH_ASSOC);
   $consulta->execute();
   if($consulta->rowCount()>0){
    $tabla= "<table >
    <thead ><td style='border:1px solid black;'>Borrar</td><td style='border:1px solid black;'>Nombre</td><td style='border:1px solid black;'>Apellidos</td></thead>
    <tbody >";
      
  
    while ($row = $consulta->fetch()){
       $tabla=$tabla." <tr >
       <td style='border:1px solid black;'><input type='checkbox' name='checksborrar[]' value='{$row["id"]}'></td>
       <td style='border:1px solid black;'>{$row["nombre"]}</td>
       <td style='border:1px solid black;'>{$row["apellidos"]}</td>
   </tr>";
        }
        $tabla=$tabla."  </tbody>
        </table>";
        echo "$tabla";
   }else{
    echo "<p style='color:red;'>No hay registros</p>";
   }
   if(isset($_REQUEST["borrar"])){
   
    if(isset($_REQUEST["checksborrar"])){
       
        $listaborrar=$_REQUEST["checksborrar"];
        $borrado=$conexion->prepare("DELETE FROM personas where id=:id");
        foreach($listaborrar as $valor){
          $borrado->bindParam(":id",$valor);
          $borrado->execute();
        }
        header("Location:./borrar.php");
    }else{
        echo "<p style='color:red;'>No se ha seleccionado nada para borrar</p>";
    }

   }
}catch(PDOException $e){
    echo $e->getMessage();
}
}else{
    header("Location:./login.php");

}
?>
        <button type="submit" name="borrar">Borrar</button>
    </form>
