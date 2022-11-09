<?php


$file=fopen("../infoImagenes.txt","a+");
if($file){
    if(is_dir("../imagenes")){
        $manejador=opendir("../imagenes");
        while($archivo= readdir($manejador)){
           if(!is_dir($archivo)){
            $texto="$archivo : ".filesize("../imagenes/$archivo")."\n";
                fwrite($file,$texto);
                if(!is_dir("../imagenCopia")){
                    mkdir("../imagenCopia");
                }
              
                copy("../imagenes/$archivo","../imagenCopia/$archivo");
           }
        }
        closedir($manejador);
    }
}
?>