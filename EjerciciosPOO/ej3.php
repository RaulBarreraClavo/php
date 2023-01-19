<?php
class Fecha{
    public $dia;
    public $mes;
    public $ano;
    public function inicializar($dia,$mes,$ano){
       $this->dia=$dia;
       $this->mes=$mes;
       $this->ano=$ano;
    }
    public function mostrar(){
     
        echo "Fecha:".$this->dia."/".$this->mes."/". $this->ano;
       
    }
}
if(isset($_REQUEST["enviar"])){
    $fecha=new Fecha();
    $fecha->inicializar($_REQUEST["dia"],$_REQUEST["mes"],$_REQUEST["ano"]);
    $fecha->mostrar();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Dia:<input type="number" name="dia">
        Mes:<input type="number" name="mes">
        Año:<input type="number" name="ano">
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>