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
       foreach ($aficiones as $aficion){
            echo"<p>Le gusta: ",$aficion,"</p>";
       }
   }
   
$contaficiones=0;
$aficiones=[];
   
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
    if ($contaficiones==0){
        echo "<p style='color:red;'>Tiene que marcar algun checkbox</p>";
    }else{

    }
    mostrarAficiones($aficiones);
    
    
    
    ?>
</body>
</html>