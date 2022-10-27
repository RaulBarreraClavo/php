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
            echo "<p>Imagen :<a href=$nombreCompleto>$nombreFichero</a></p>";
            // echo "<p><img src=$nombreCompleto></p>";
        }else{
            echo"<p style='color:red;'>El archivo es invalido</p>";
        }
      
        
    }else{
        echo"<p style='color:red;'>El archivo es invalido</p>";
    }
}

sanear();

  
 




if (validacion("titulo")){
    $titulo=($_REQUEST["titulo"] );
   
   
        echo "<p>Titulo: ",$titulo,"</p>";
    
    
}else{
   
    echo"<p style='color:red;'>El titulo es invalido</p>";
}

if (validacion("texto")){
    $texto=($_REQUEST["texto"] );
    
 
   
        echo "<p>Texto: ",$texto,"</p>";
    
    
}else{
    
    echo"<p style='color:red;'>El texto es invalido</p>";
}

if (validacion("categoria")){
    $categoria=($_REQUEST["categoria"] );
    
 
   
        echo "<p>Categoria: ",$categoria,"</p>";
    
    
}else{
    
    echo"<p style='color:red;'>La categoria es invalida</p>";
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
    <p  >Titulo:  <input type="text" name="titulo"></p>
    <p  >Texto: <textarea name="texto"></textarea></p>
    <p >Categoria:  <SELECT name="categoria">
              
                <OPTION value="costas" selected>Costas
                <OPTION value="montañas">Montañas
                <OPTION value="bosques">Bosques
               

            </SELECT></p>
  
    <p >Imagen:  <input type="file" id="archivo"  name="archivo"></p>

   <input type="submit" name="enviar" value="Enviar">
    <input type="reset" name="borrar" value="Borrar">


</form> </div>   

</body>

</html>