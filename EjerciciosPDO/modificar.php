<p><a href="./aplicacion.php">Pagina principal</a></p>


<form method="POST" id="formulario">
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
    <thead ><td style='border:1px solid black;'>Modificar</td><td style='border:1px solid black;'>Nombre</td><td style='border:1px solid black;'>Apellidos</td></thead>
    <tbody >";
      
  
    while ($row = $consulta->fetch()){
       $tabla=$tabla." <tr >
       <td style='border:1px solid black;'><input type='radio' name='radioModificar' value='{$row["id"]}'></td>
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
   if(isset($_REQUEST["modificar"])){
   
    if(isset($_REQUEST["radioModificar"])){
       
       $idModificar=$_REQUEST["radioModificar"];
       $consulta=$conexion->prepare("SELECT * FROM personas where id=:id;");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $consulta->bindParam(":id",$idModificar);
       $consulta->execute();
     
       while ($row = $consulta->fetch()){
        $_SESSION["idModificar"]=$row["id"]; 
       $_SESSION["nombreModificar"]=$row["nombre"];
       $_SESSION["apellidosModificar"]= $row["apellidos"];
      header("Location:./modificar2.php");
  
       }
   if(isset($_REQUEST["cambiarDatos"])){

   }
       
        
        // header("Location:./borrar.php");
    }else{
        echo "<p style='color:red;'>No se ha seleccionado nada para modificar</p>";
    }

   }
}catch(PDOException $e){
    echo $e->getMessage();
}
}else{
    header("Location:./login.php");

}
?>
        <button type="submit" name="modificar">Modificar</button>
        
    </form>
