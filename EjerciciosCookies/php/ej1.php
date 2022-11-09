<?php
setcookie("prueba","true",time()+3600);
if(isset($_REQUEST["reiniciar"])){
    
if(isset($_COOKIE["prueba"])){
    echo"<p>Si admite cookies</p>";
}else{
    echo"<p>No admite cookies</p>";
}
}


?>
<form action="">
<button name="reiniciar" type="submit">Comprobar</button>
</form>

