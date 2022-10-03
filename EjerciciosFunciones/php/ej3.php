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



    function tipoCaracter($char){
        $tipo="";
      if(is_numeric($char)){
        $tipo="Es numerico";
      }elseif($char==" "){
       
        $tipo="Es un caracter en blanco";
      }elseif(ctype_lower($char)){
        $tipo="Es minuscula";
      }elseif(ctype_upper($char)){
        $tipo="Es mayuscula";
      }elseif($char=="." or $char==","){
        $tipo="Es un signo de puntuacion";
      }else{
        $tipo="Cualquier otra cosa";
      }
      return $tipo;
    }
    if(isset(($_REQUEST["caracter"] ))){
        $caracter=($_REQUEST["caracter"] );
    }else{
        $caracter=" ";
    }
    
    echo "<p>",tipoCaracter($caracter),"</p>";
    ?>
</body>
</html>