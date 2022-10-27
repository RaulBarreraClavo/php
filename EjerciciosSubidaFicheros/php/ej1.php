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
if(isset($_REQUEST['enviar'])){

// function inicializarFormulario($tipo){
//     if($tipo=="inicio"){
//         echo '<div class="inicio"><form  method="post"  >
//     <p>Validacion</p>
//     <br>
//     <p id="nombre" class="nombre" >Nombre:  <input type="text" name="nombre"></p>
//     <p id="telefono" class="telefono">Telefono:  <input type="number" id="telefono" name="telefono"></p>
//     <p id="email" class="email">Correo:  <input type="email" id="email"  name="email"></p>
  
//    <input type="submit" name="enviar" value="Enviar">
//     <input type="reset" name="borrar" value="Borrar">


// </form> </div>     ';
//     }
    // elseif($tipo=="fallo"){
    //     echo '<form  method="post" >
    //     <p>Validacion</p>
    //     <br>
    //     <p id="nombre" style="color:red;" >Nombreaaaaa:  <input type="text" name="nombre"></p>
    //     <p id="telefono" style="color:red;">Telefono:  <input type="number" id="telefono" name="telefono"></p>
    //     <p id="email" style="color:red;">Correo:  <input type="email" id="email"  name="email"></p>
      
    //    <input type="submit" name="enviar" value="Enviar">
    //     <input type="reset" name="borrar" value="Borrar">
    
    
    // </form>      ';
    // }
    
// }
// inicializarFormulario("inicio");


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
    
    if(is_uploaded_file($_FILES[$nombre]["tmp_name"])){
        $nombreDirectorio="../img/";
        $nombreFichero=$_FILES["archivo"]["name"];
        $nombreCompleto=$nombreDirectorio.$nombreFichero;
        if(is_file($nombreCompleto)){
            $idunico=time();
            $nombreFichero=$idunico."-".$nombreFichero;
            $nombreCompleto=$nombreDirectorio.$nombreFichero;
        }

        if(move_uploaded_file($_FILES[$nombre]["tmp_name"],$nombreCompleto)){
            echo "<p>Fichero subido con el nombre: ",$nombreFichero,"</p>";
            echo "<p><img src=$nombreCompleto></p>";
        }else{
            echo"<p style='color:red;'>El archivo es invalido</p>";
        }
      
        
    }else{
        echo"<p style='color:red;'>El archivo es invalido</p>";
    }
}

sanear();

  
 




if (validacion("nombre")){
    $nombre=($_REQUEST["nombre"] );
   
   
        echo "<p>Nombre: ",$nombre,"</p>";
    
    
}else{
   
    echo"<p style='color:red;'>El nombre es invalido</p>";
}

if (validacion("apellidos")){
    $apellidos=($_REQUEST["apellidos"] );
    
 
   
        echo "<p>Apellidos: ",$apellidos,"</p>";
    
    
}else{
    
    echo"<p style='color:red;'>El apellido es invalido</p>";
}

   
   
    
    if (validacion("telefono")){
        $telefono=($_REQUEST["telefono"] );
        if(preg_match("/^[6||9][0-9]{8}$/",$telefono)){
            echo"<p>Telefono: ",$telefono,"</p>";
        }else{
          
            echo"<p style='color:red;'>El telefono: ",$telefono," es invalido</p>";
        }
     
       
          
        
        
    }else{
        
        echo"<p style='color:red;'>El telefono  es invalido</p>";
    }
    if (validacion("edad")){
        $edad=($_REQUEST["edad"] );
        
       
       
            echo "<p>Edad: ",$edad,"</p>";
        
        
    }else{
        echo"<p style='color:red;'>La edad es invalida</p>";
    }
    if (validacion("email")){
        $email=($_REQUEST["email"] );
        
       
       
            echo "<p>Email: ",$email,"</p>";
        
        
    
            
        }else{
          
         
            echo"<p style='color:red;'>El email es invalido</p>";
           
        }

        cargarImagenes("archivo");

        
    

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
    <p >Edad:  <input type="number" name="edad"></p>
    <p >Telefono:  <input type="number" id="telefono" name="telefono"></p>
    <p >Correo:  <input type="email" id="email"  name="email"></p>
    <p >Archivo:  <input type="file" id="archivo"  name="archivo"></p>

   <input type="submit" name="enviar" value="Enviar">
    <input type="reset" name="borrar" value="Borrar">


</form> </div>   

</body>

</html>