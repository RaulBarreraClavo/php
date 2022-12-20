<p><a href="./aplicacion.php">Pagina principal</a></p>



<?php
session_start();
if($_SESSION["autorizado"]==true){
    try{
    include "./crearBd.php";
   $conexion= crearBD();
   $borrado=$conexion->prepare("DROP TABLE personas; ");
    $borrado->execute();
    $dsn="mysql:host=localhost;";
    $dbh=new PDO($dsn,"root","");
   $borrado= $dbh->prepare("Drop Database agenda");
   $borrado->execute();
        echo "<p style='color:green;'>Borrado completado</p>";

   
}catch(PDOException $e){
    echo $e->getMessage();
}
}else{
    header("Location:./login.php");

}
?>
      