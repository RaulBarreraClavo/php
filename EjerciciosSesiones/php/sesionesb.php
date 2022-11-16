<?php
    session_start();
    if($_SESSION["autorizacion"]=="Si"){
        echo"<p>Nombre: ".$_SESSION["nombre"]." Clave:".$_SESSION["clave"]."</p>";
        unset($_SESSION["nombre"]);
        unset($_SESSION["clave"]);
        unset($_SESSION["autorizacion"]);
        echo"<p><a href='./sesionesc.php'>Pulse aqui</a></p>";
    }
?>