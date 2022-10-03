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
    $cantidad=($_REQUEST["cantidad"] );
   $euros=0;
    
    if ($cantidad>=1){
       $divisa=($_REQUEST["divisa"] );
       switch ($divisa){
            case "Dolares":
                $euros=$cantidad;
                break;
            case "Pesos":
                $euros=$cantidad/20.08;
                break;
            case "Yenes":
                $euros=$cantidad/143.05;
                break;
            case "Pesetas":
                $euros=$cantidad/166.386;
                break;

       }
        echo $cantidad," ", $divisa," son ",$euros," euros";
    }else{
        echo "La cantidad debe ser mayor que 0";
    }
   
    ?>
    
</body>
</html>