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
    if( isset($_REQUEST["enviar"])){
    $contfallos=0;

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
        function validar($variable,$patron){
            if(isset($_REQUEST[$variable])){
                $dato=$_REQUEST[$variable];
                if(!empty($dato)){
                    if(preg_match($patron,$dato)){
                        return true; 
                    }
                    return false;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    
    function cargarImagenes($nombre){
       if(!is_dir("../img")){
        mkdir("../img");
       }
        
        if(is_uploaded_file($_FILES[$nombre]["tmp_name"])){
            $nombreDirectorio="../img/";
            $nombreFichero=$_FILES[$nombre]["name"];
            $nombreCompleto=$nombreDirectorio.$nombreFichero;
            if(is_file($nombreCompleto)){
                $idunico=time();
                $nombreFichero=$idunico."-".$nombreFichero;
                $nombreCompleto=$nombreDirectorio.$nombreFichero;
            }
    
            if(move_uploaded_file($_FILES[$nombre]["tmp_name"],$nombreCompleto)){
                echo "<p>Fichero subido con el nombre: <a href='$nombreCompleto'> ",$nombreFichero,"</a></p>";
               
                if(!is_dir("../archivo")){
                    mkdir("../archivo");
                   }
                $file= fopen("../archivo/imagenes.txt","a+");

            if($file){
             $texto="".$nombreFichero."  Tamaño:".$_FILES[$nombre]["size"]."\n";
              fwrite($file,$texto);
              fclose($file);
             
          }

                
            }else{
                echo"<p style='color:red;'>El archivo es invalido</p>";
            }
          
            
        }else{
            echo"<p style='color:red;'>El archivo es invalido</p>";
        }
    }
        sanear();

        if(validar("nombre","/^[[:alpha:]|| ]*$/")){
            $nombre=$_REQUEST["nombre"];
            echo "<p>Nombre: $nombre</p>";
        }else{
            $contfallos++;
            echo "<p class='rojo'>Nombre:Invalido</p>";
        }

        if(validar("apellidos","/^[[:alpha:]|| ]*$/")){
            $apellidos=$_REQUEST["apellidos"];
            echo "<p>Apellidos: $apellidos</p>";
        }else{
            $contfallos++;
            echo "<p class='rojo'>Apellidos:Invalido</p>";
        }

        if(validar("edad","/^[0-9]*$/")){
            $edad=$_REQUEST["edad"];
            echo "<p>Edad: $edad</p>";
        }else{
            $contfallos++;
            echo "<p class='rojo'>Edad:Invalido</p>";
        }

        if(validar("telefono","/^[0-9]{9}$/")){
            $telefono=$_REQUEST["telefono"];
            echo "<p>Telefono: $telefono</p>";
        }else{
            $contfallos++;
            echo "<p class='rojo'>Telefono:Invalido</p>";
        }

        if(validar("email","/^[[:alnum:]||@||.]*$/")){
            $email=$_REQUEST["email"];
            echo "<p>Email: $email</p>";
        }else{
            $contfallos++;
            echo "<p class='rojo'>Email:Invalido</p>";
        }

      


        if($contfallos==0){
            cargarImagenes("foto");
            $file= fopen("../datos.txt","a+");

            if($file){
             $texto="\n".$nombre."\n".$apellidos."\n".$edad."\n".$email."\n".$telefono."\n-------------------------";
              fwrite($file,$texto);
              fclose($file);
             
          }

         
           
        
        }else{
            echo"<p>No se sube foto ni se genera txt</p>";
        }
      

        print '<style>
        .form{
            visibility:hidden;
        }
        .rojo{
            color:red;
        }
    </style>';


    }
    ?>
    <form id="form" class="form" method="POST" enctype="multipart/form-data">
        <p>
            Nombre<input type="text" name="nombre"> 
            Apellidos<input type="text" name="apellidos">
        </p>
        <p>
            Edad<input type="number" name="edad">
        </p>
        <p>
            Telefono<input type="number" name="telefono">
        </p>
        <p>
            Email<input type="text" name="email">
        </p>
        <p>
            Foto<input type="file" id="foto" name="foto">
        </p>


    <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>