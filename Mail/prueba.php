<?php
$para='raulbarreraphp@gmail.com';
$asunto='prueba';
$descripcion='dios por favor haz que funcione';
$de='From:raulbarreraphp@gmail.com';
if(mail($para,$asunto,$descripcion,$de)){
    echo "<p>exito</p>";
}else{
    echo "<p>error</p>";
}

?>