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
sanear();

   function mostrarTexto($texto){
        echo "<p>Su texto es ",$texto,"</p>";
   }
   function mostrarFallo($fallos){
    if( in_array("texto",$fallos)){
        
    }else{
        echo "bbb";
    }
   
}

$fallos=["1"];
$contfallos=0;
   
    if (isset($_REQUEST["texto"] )){
        $texto=($_REQUEST["texto"] );
       
        if (!empty($texto )){
            if(preg_match("/^[[:alpha:]]+$/",$texto)){
             
            }else{
            array_push($fallos,"texto");
            $contfallos++;
            }
            
        }else{
            array_push($fallos,"texto");
            $contfallos++;
            print "<style>";
        print".texto{";
           
            print"color:red;";
        print"}";
    print"</style>";
        }
        
    }
    if (isset(($_REQUEST["buscar"] )) ){
        $buscar=($_REQUEST["buscar"] );
        if (!empty($buscar )){
      
        }else{
            array_push($fallos,"buscar");
            $contfallos++;
            print "<style>";
            print".buscar{";
               
                print"color:red;";
            print"}";
        print"</style>";
        }
        
    }

    if (isset(($_REQUEST["genero"] )) ){
        $genero=($_REQUEST["genero"] );
        if (!empty($genero )){
       
     
        }else{
            array_push($fallos,"genero");
            $contfallos++;
            print "<style>";
            print".genero{";
               
                print"color:red;";
            print"}";
        print"</style>";
        }
        
    }else{
        array_push($fallos,"genero");
        $contfallos++;
        print "<style>";
        print".genero{";
           
            print"color:red;";
        print"}";
    print"</style>";
    }
    
    
   
    if($contfallos==0){
        mostrarTexto($texto);
        echo"<p>Buscar: ",$buscar,"</p>";
        echo"<p>Genero: ",$genero,"</p>";
        print "<style>";
        print".inicio{";
           
            print"visibility:hidden;";
            print"widht:1px;";
            print"heigth:1px;";
        print"}";
    print"</style>";
        
    }
    
    
}
    
    
    ?>

    <div class="inicio"><form  method="post"  >
    <p>Validacion</p>
    <br>
    <p id="texto" class="texto" >Texto:  <input type="text" name="texto"></p>
    <p id="buscar" class="buscar">Buscar:  <input type="radio" id="titulos" name="buscar"
                value="titulos" checked>
            <label for="titulos">Titulos de Cancion</label>



            <input type="radio" id="nombres" name="buscar" value="nombres">
            <label for="nombres">Nombres de Album</label>
            <input type="radio" id="ambos" name="buscar" value="ambos">
            <label for="ambos">Ambos Campos</label></p>
    <p id="genero" class="genero">Genero musical:  <SELECT name="genero">
                <OPTION value="todos" selected>Todos
                <OPTION value="acustica">Acustica
                <OPTION value="banda-sonora">Banda Sonora
                <OPTION value="blues">Blues
                <OPTION value="electronica">Electronica
                <OPTION value="folk">Folk
                <OPTION value="jazz">Jazz

            </SELECT></p>
  
   <input type="submit" name="enviar" value="Enviar">
    <input type="reset" name="borrar" value="Borrar">


</form> </div>   

</body>

</html>