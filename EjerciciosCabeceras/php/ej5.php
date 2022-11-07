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
                return 0;
            }else{
                return 2;
            }
        }else{
            return 1;
        }

    }else{
        return 3;
    }
}
$contfallos=0;
$fallos=[];
if(validar("edad","/^[0-9]*$/")==0){
  $edad=$_REQUEST["edad"];
  if($edad>=18 && $edad<=130){
   
  }else{
    $contfallos++;
    array_push($fallos,"edadlimites");
   
  }
   
}elseif(validar("edad","/^[0-9]*$/")==2){
    $contfallos++;
    array_push($fallos,"edadNoEntero");
   
}else{
    $contfallos++;
    array_push($fallos,"edad");
}
if(validar("nombre","/^([[:alpha:]]|| )*$/")==0){
    $nombre=$_REQUEST["nombre"];
   
  }elseif (validar("nombre","/^([[:alpha:]]|| )*$/")==2){
    $contfallos++;
    array_push($fallos,"nombreNoPatron");
   
  }else{
    $contfallos++;
    array_push($fallos,"nombre");
  }
  if($contfallos==0){

    echo"<p>Nombre: $nombre</p>";
    echo"<p>Edad: $edad</p>";
  }else{
    $textoFallo="";
    $cont=0;
    foreach($fallos as $fallo){
        if($cont==0){
            $textoFallo=$textoFallo."$fallo=1 ";
        }else{
            $textoFallo=$textoFallo."& $fallo=1";
        }
 
        $cont++;
    }
 
    header("Location: ./ej5a.php?$textoFallo");

  }
?>