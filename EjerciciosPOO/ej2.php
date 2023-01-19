<?php
class Empleado{
    public $nombre;
    public $sueldo;
    public function inicializar($nombre,$sueldo){
       $this->nombre=$nombre;
       $this->sueldo=$sueldo;
    }
    public function mostrar(){
        if($this->sueldo>3000){
            $impuesto="Debe pagar Impuestos";
        }else{
            $impuesto="No 
            Debe pagar Impuestos";
        }
        echo "Nombre:".$this->nombre." $impuesto";
       
    }
}
if(isset($_REQUEST["enviar"])){
    $empleado=new Empleado();
    $empleado->inicializar($_REQUEST["nombre"],$_REQUEST["sueldo"]);
    $empleado->mostrar();
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
        Nombre:<input type="text" name="nombre">
        Sueldo:<input type="number" name="sueldo">
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>