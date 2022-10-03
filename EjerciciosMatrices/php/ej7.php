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
    $asociacion= ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
   
    $numDni=($_REQUEST["numdni"] );

    $indice=$numDni%23;
    echo "<p>La letra del dni ",$numDni," es ",$asociacion[$indice],"</p>";
   ?>
    
</body>
</html>