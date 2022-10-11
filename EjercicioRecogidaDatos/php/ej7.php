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
   function mostrarAficiones($aficiones){
    echo"<p>Aficiones: ";
       foreach ($aficiones as $aficion){
            echo $aficion.",";
       }
       echo"</p>";
   }
   
   function mostrarNombre($nombre,$apellidos){
    echo "<p>Su nombre es ",$nombre," ",$apellidos,"</p>";
}
function mostrarFallo(){
echo "<p style='color:red;'>Tiene que rellenar los campos nombre y apellidos</p>";
}
$error=0;

if (isset(($_REQUEST["nombre"] )) && isset(($_REQUEST["apellidos"] ))){
    $nombre=($_REQUEST["nombre"] );
    $apellidos=($_REQUEST["apellidos"] );
    if (!empty($nombre ) && !empty($apellidos )){
        mostrarNombre($nombre,$apellidos);
    }else{
        mostrarFallo();
        $error++;
    }
    
}
if (isset($_REQUEST["peso"] ) ){
    $peso=($_REQUEST["peso"] );
   
    if (!empty($peso )){
      echo "<p>Peso: ",$peso,"</p>";
    }else{
        echo "<p style='color:red;'>Tiene que rellenar el campo peso</p>";
        $error++;
    }
    
}
   
$contaficiones=0;
$aficiones=[];

if (isset(($_REQUEST["sexo"] )) ){
    $sexo=($_REQUEST["sexo"] );
   
   echo"<p>Es un ",$sexo,"</p>";
     
    
}else{
    echo "<p style='color:red;'>Tiene que rellenar el campo sexo</p>";
    $error++;
}
if (isset(($_REQUEST["email"] )) ){
    $email=($_REQUEST["email"] );
    if (!empty($email )){
        echo"<p>Email: ",$email,"</p>";
    }else{
        echo "<p style='color:red;'>Tiene que rellenar el campo email</p>";
        $error++;
    }
   
   
     
    
}

if (isset(($_REQUEST["contraseña"] )) ){
    $contraseña=($_REQUEST["contraseña"] );
 
   if (!empty($contraseña )){
      
   echo"<p>Contraseña: ",$contraseña,"</p>";
}else{
    echo "<p style='color:red;'>Tiene que rellenar el campo contraseña</p>";
    $error++;
}
     
    
}


if (isset(($_REQUEST["estudios"] )) ){
    $estudios=($_REQUEST["estudios"] );
   
   echo"<p>Nivel de estudios: ",$estudios,"</p>";
     
    
}else{
    echo "<p style='color:red;'>Tiene que rellenar el campo estado civil</p>";
    $error++;
}

   
    if (isset(($_REQUEST["aficion1"] )) ){
        $aficion1=($_REQUEST["aficion1"] );
        array_push($aficiones,$aficion1);
       $contaficiones++;
      
    }
     if (isset(($_REQUEST["aficion2"] )) ){
        $aficion2=($_REQUEST["aficion2"] );
        array_push($aficiones,$aficion2);
        $contaficiones++;
    }
    if (isset(($_REQUEST["aficion3"] )) ){
        $aficion3=($_REQUEST["aficion3"] );
        array_push($aficiones,$aficion3);
        $contaficiones++;
    }
    if (isset(($_REQUEST["aficion4"] )) ){
        $aficion4=($_REQUEST["aficion4"] );
        array_push($aficiones,$aficion4);
        $contaficiones++;
    }
    if ($contaficiones==0){
        echo "<p style='color:red;'>Tiene que marcar alguna aficion</p>";
        $error++;
    }else{

    }

    
    mostrarAficiones($aficiones);
    function mostrarDia($dia)
    {
        $error=0;
    
            if($dia== "..."){
                echo "<p style='color:red;'>Tiene que marcar alguna opcion de dia de la semana</p>";
                $error++;
            }else{
                echo "<p>Dia de la semana: ",$dia," </p>";
            }
              return $error;
    }



    if (isset($_REQUEST["dia"])) {
        $dia = ($_REQUEST["dia"]);
        if(mostrarDia($dia)>0){
            $error++;
        }
    } else {

        echo "<p style='color:red;'>Tiene que marcar alguna opcion de dia de la semana</p>";
        $error++;
    }
    
if (isset(($_REQUEST["opinion"] )) ){
    $opinion=($_REQUEST["opinion"] );
 
   if (!empty($opinion )){
      
   echo"<p>Opinion: ",$opinion,"</p>";
}else{
    echo "<p style='color:red;'>Tiene que rellenar el campo opinion</p>";
    $error++;
}
     
    
}

if($error==0){
    echo"    <a href='\git\php\EjercicioRecogidaDatos\html/enviar.html'>Enviar</a>
    <a href='\git\php\EjercicioRecogidaDatos\html/ej7.html'>Volver a escribir</a>";
}else{
    echo"    
    <a href='\git\php\EjercicioRecogidaDatos\html/ej7.html'>Volver a escribir</a>";
}
    
    
    
    ?>

</body>


</html>