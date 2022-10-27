<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$max_file_size=1000;
if(isset($_REQUEST['enviar'])){


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
function validacion($variable){
    if (isset($_REQUEST[$variable] ) ){
        $variable=($_REQUEST[$variable] );
       
        if (!empty($variable )){
           return true;
        
        }else{
            return false;
        }
        
    }else{
        return false;
    }
}
function cargarImagenes($nombre){
    
    if(isset($_FILES[$nombre])){
        $nombreDirectorio="../img/";
        $nombres=$_FILES[$nombre]["name"];
        $temporales=$_FILES[$nombre]["tmp_name"];
        $tipos=$_FILES[$nombre]["type"];
        $errores=$_FILES[$nombre]["error"];
        for($i=0;$i<count($temporales);$i++){
            $nombreFichero = $nombres[$i];
            $nombreCompleto = $nombreDirectorio . $nombreFichero;
            if(is_file($nombreCompleto)){
                $idunico=time();
                $nombreFichero=$idunico."-".$nombreFichero;
                $nombreCompleto=$nombreDirectorio.$nombreFichero;
            }
            if ((strpos($_FILES[$nombre]["name"][$i],".jpg"))||(strpos($_FILES[$nombre]["name"][$i],".png"))){
    
            if(move_uploaded_file($temporales[$i],$nombreCompleto)){
             
                    echo "<p>Fichero subido con el nombre: ",$nombreFichero,"</p>";
                    echo "<p><img src=$nombreCompleto></p>";
                
               
            }else{
                echo"<p style='color:red;'>El archivo es invalido</p>";
            }
        }else{
            echo"<p style='color:red;'>El archivo es invalido</p>";
        }
          
        }
       
        
    }else{
        echo"<p style='color:red;'>El archivo es invalido</p>";
    }
}

sanear();

  
 




if (validacion("nombre")){
    $nombre=($_REQUEST["nombre"] );
    if(preg_match("/^([[:alnum:]]||\s){0,18}$/",$nombre)){
   
        echo "<p>Nombre: ",$nombre,"</p>";
    }else{
        echo"<p style='color:red;'>El nombre es invalido</p>";
    }
    
}else{
   
    echo"<p style='color:red;'>El nombre es invalido</p>";
}

if (validacion("apellidos")){
    $apellidos=($_REQUEST["apellidos"] );
    
    if(preg_match("/^([[:alnum:]]||\s||-){0,18}$/",$apellidos)){
   
        echo "<p>Apellidos: ",$apellidos,"</p>";
    }else{
        echo"<p style='color:red;'>El apellido es invalido</p>";
    }
    
}else{
    
    echo"<p style='color:red;'>El apellido es invalido</p>";
}

if (validacion("direccion")){
    $direccion=($_REQUEST["direccion"] );
    
    if(preg_match("/^Calle|Plaza|Avenida([[:alnum:]]||\s)*$/",$direccion)){
 
   
        echo "<p>Direccion: ",$direccion,"</p>";
    }else{
        echo"<p style='color:red;'>La direccion es invalida</p>";
    }
    
    
}else{
    
    echo"<p style='color:red;'>La direccion es invalida</p>";
}
   
   
    
   
        cargarImagenes("archivos");

        
    

        print "<style>";
        print".inicio{";
           
            print"visibility:hidden;";
            print"widht:1px;";
            print"heigth:1px;";
        print"}";
    print"</style>";
        
    
    
    
}
    
    
    ?>

    <div class="inicio"><form  method="post" enctype="multipart/form-data" >
    <p>Validacion</p>
    <br>
    <p  >Nombre:  <input type="text" name="nombre"></p>
    <p  >Apellidos:  <input type="text" name="apellidos"></p>
    <p >Direccion:  <input type="text" name="direccion"></p>
  
    <p >Archivo:
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size;?>">
          <input type="file" multiple="multiple" id="archivos[]"  name="archivos[]"></p>

   <input type="submit" name="enviar" value="Enviar">
    <input type="reset" name="borrar" value="Borrar">


</form> </div>   

</body>

</html>