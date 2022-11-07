<?php
function sanear(){
    foreach($_REQUEST as $key=>$valor){
        if(!is_array($_REQUEST[$key])){
            $_REQUEST[$key]=trim(htmlspecialchars(strip_tags($_REQUEST[$key]),ENT_QUOTES,"utf-8"));
        }else{
            foreach($_REQUEST[$key] as $posicion=>$dato){
                $_REQUEST[$key][$posicion]=trim(htmlspecialchars(strip_tags($dato),ENT_QUOTES,"utf-8"));
            }
        }
    }
   
}
sanear();
function validar($variable,$patron){
    if(isset($_REQUEST[$variable])){
        $valor=$_REQUEST[$variable];
        if(!empty($valor)){
            if(preg_match($patron,$valor)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }else{
        return false;
    }
}
if(validar("nombre","/^([[:alpha:]]|| )*$/")){
  $nombre=$_REQUEST["nombre"];
   echo"<p>Nombre: $nombre</p>";
}else{
    header("Location: ./ej3a.php?error=1");
}
?>