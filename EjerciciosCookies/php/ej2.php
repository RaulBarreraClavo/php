<?php
setcookie("contador","1",time()+3600);

    
if(isset($_COOKIE["contador"])){
    $cont=$_COOKIE["contador"];
    $cont++;
    setcookie("contador",$cont,time()+3600);
    echo"<p>$cont</p>";
}



?>

