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

   function mostrarNombre($nombre){
        echo "<p>Su nombre es ",$nombre,"</p>";
   }
   function mostrarFallo($fallos){
    if( in_array("nombre",$fallos)){
        
    }else{
        echo "bbb";
    }
   
}

$fallos=["1"];
$contfallos=0;
   
    if (isset($_REQUEST["nombre"] )){
        $nombre=($_REQUEST["nombre"] );
       
        if (!empty($nombre )){
            if(preg_match("/^[[:alpha:]]+$/",$nombre)){
                mostrarNombre($nombre);
            }else{
            array_push($fallos,"nombre");
            $contfallos++;
            }
            
        }else{
            array_push($fallos,"nombre");
            $contfallos++;
            print "<style>";
        print".nombre{";
           
            print"color:red;";
        print"}";
    print"</style>";
        }
        
    }
    if (isset($_REQUEST["telefono"] )){
        $telefono=($_REQUEST["telefono"] );
       
        if (!empty($telefono )){
            if(preg_match("/^[6||9][0-9]{8}$/",$telefono)){
                echo"<p>Telefono: ",$telefono,"</p>";
            }else{
                array_push($fallos,"telefono");
                $contfallos++;
                print "<style>";
                print".telefono{";
                   
                    print"color:red;";
                print"}";
            print"</style>";
            }
            
        }else{
            array_push($fallos,"telefono");
            $contfallos++;
            print "<style>";
            print".telefono{";
               
                print"color:red;";
            print"}";
        print"</style>";
        }
        
    }
    if (isset($_REQUEST["email"] )){
        $email=($_REQUEST["email"] );
       
        if (!empty($email )){
           
                echo"<p>Email: ",$email,"</p>";
            
        }else{
            array_push($fallos,"email");
            $contfallos++;
            print "<style>";
            print".email{";
               
                print"color:red;";
            print"}";
        print"</style>";
        }
        
    }
    if($contfallos==0){
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
    <p id="nombre" class="nombre" >Nombre:  <input type="text" name="nombre"></p>
    <p id="telefono" class="telefono">Telefono:  <input type="number" id="telefono" name="telefono"></p>
    <p id="email" class="email">Correo:  <input type="email" id="email"  name="email"></p>
  
   <input type="submit" name="enviar" value="Enviar">
    <input type="reset" name="borrar" value="Borrar">


</form> </div>   

</body>

</html>