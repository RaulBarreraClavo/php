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
    function esprimo($numero){
        $primo=true;
        for($i=2;$i<$numero;$i++){
      
            if($numero%$i==0){
                $primo=false;
            }
           
        }
        if($primo==true){
            return "Es primo";
        }else{
            return  "No es primo";
        }
    }
    $num=($_REQUEST["num"] );
    echo "<p>",esprimo($num),"</p>";
    ?>
</body>
</html>