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
    function factorizar($numero){
        $primo=true;
        $multiplicacion="";
        for($i=2;$i<$numero;$i++){
      
            if($numero%$i==0){
                $division=$numero/$i;
                $multiplicacion="{$i} X {$division} = {$numero}";
                $primo=false;
            }
           
        }
        if($primo==true){
            $multiplicacion="{$numero} X 1 = {$numero}";
            return $multiplicacion;
        }else{
            return  $multiplicacion;
        }
    }
    $num=($_REQUEST["num"] );
    echo "<p>",factorizar($num),"</p>";
    ?>
</body>
</html>