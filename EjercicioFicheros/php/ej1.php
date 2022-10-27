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

$escritura="";
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
   function mostrarIdiomas($idiomas,$escritura){
    echo"<p>Idiomas: ";
    $escritura=$escritura."Idiomas: ";
       foreach ($idiomas as $idioma){
            echo $idioma.",";
            $escritura=$escritura.$idioma.",";
       }
       echo"</p>";
       $escritura=$escritura."\n";
   }
   

function mostrarFallo(){
echo "<p style='color:red;'>Tiene que rellenar los campos nombre y apellidos</p>";
}
$error=0;

if (isset($_REQUEST["nombre"] )){
    $nombre=($_REQUEST["nombre"] );
    
    if (!empty($nombre ) ){
        echo "<p>Nombre: ",$nombre,"</p>";
        $escritura=$escritura."Nombre: ".$nombre." \n";
    }
    
}
if (isset($_REQUEST["contraseña"] ) ){
    $contraseña=($_REQUEST["contraseña"] );
   
    if (!empty($contraseña )){
        if(preg_match("/^[[:alnum:]]{5,}$/",$contraseña)){
            echo "<p>Contraseña: ",$contraseña,"</p>";
            $escritura=$escritura."Contraseña: $contraseña \n";
        }
    
    }
    
}
   
$contidiomas=0;
$idiomas=[];

if (isset(($_REQUEST["nacionalidad"] )) ){
    $nacionalidad=($_REQUEST["nacionalidad"] );
   
   echo"<p>Nacionalidad: ",$nacionalidad,"</p>";
   $escritura=$escritura."Nacionalidad: $nacionalidad \n";
    
}





if (isset(($_REQUEST["estudios"] )) ){
    $estudios=($_REQUEST["estudios"] );
   
   echo"<p>Nivel de estudios: ",$estudios,"</p>";
   $escritura=$escritura."Nivel de estudios: $estudios \n";
    
}else{
    echo "<p style='color:red;'>Tiene que rellenar el campo estado civil</p>";
    $escritura=$escritura."Tiene que rellenar el campo estado civil \n";
    $error++;
}

   
    if (isset(($_REQUEST["castellano"] )) ){
        $castellano=($_REQUEST["castellano"] );
        array_push($idiomas,$castellano);
       
      
    }
     if (isset(($_REQUEST["ingles"] )) ){
        $ingles=($_REQUEST["ingles"] );
        array_push($idiomas,$ingles);
        
    }
    if (isset(($_REQUEST["frances"] )) ){
        $frances=($_REQUEST["frances"] );
        array_push($idiomas,$frances);
      
    }
    if (isset(($_REQUEST["italiano"] )) ){
        $italiano=($_REQUEST["italiano"] );
        array_push($idiomas,$italiano);
      
    }
   

    
    mostrarIdiomas($idiomas,$escritura);

    
    if (isset(($_REQUEST["sitioweb"] )) ){
        $sitioweb=($_REQUEST["sitioweb"] );
        if (!empty($sitioweb )){
            if(preg_match("/^(http|https)/",$sitioweb)){
                echo"<p>Sitio web: ",$sitioweb,"</p>";
                $escritura=$escritura."Sitio web: $sitioweb \n";
            }
          
        }
       
       
         
        
    }

    if (isset(($_REQUEST["email"] )) ){
        $email=($_REQUEST["email"] );
        if (!empty($email )){
            echo"<p>Email: ",$email,"</p>";
            $escritura=$escritura."Email: $email \n";
        }
       
       
         
        
    }
   
    // function mostrarDia($dia)
    // {
    //     $error=0;
    
    //         if($dia== "..."){
    //             echo "<p style='color:red;'>Tiene que marcar alguna opcion de dia de la semana</p>";
    //             $error++;
    //         }else{
    //             echo "<p>Dia de la semana: ",$dia," </p>";
    //         }
    //           return $error;
    // }



    // if (isset($_REQUEST["dia"])) {
    //     $dia = ($_REQUEST["dia"]);
    //     if(mostrarDia($dia)>0){
    //         $error++;
    //     }
    // } else {

    //     echo "<p style='color:red;'>Tiene que marcar alguna opcion de dia de la semana</p>";
    //     $error++;
    // }
    

     
    


    
    $fichero = fopen("../fich_salida.txt", 'w+');
    if($fichero){
       
       $caracteres= fwrite($fichero,$escritura);
        fclose($fichero);
        echo "<p>Caracteres Escritos $caracteres</p>";
    }

    
    ?>

</body>


</html>