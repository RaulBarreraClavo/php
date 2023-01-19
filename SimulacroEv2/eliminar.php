
<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            include "./crearBD.php";
            $conexion=crearBD();
            $consulta=$conexion->prepare("Delete from personas where id=:id");
            $consulta->bindParam(":id",$id);
            $consulta->execute();
           
        }
        header("Location:./listar.php");
       
 
   
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}
       
else{
    header("Location:./login.php");
}
?>