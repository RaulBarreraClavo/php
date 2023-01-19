<?php
class Persona{
    public $nombre;
    public function darNombre($valor){
       $this->nombre=$valor;
    }
    public function mostrar(){
        echo "Nombre:".$this->nombre;
    }
}
if(isset($_REQUEST["enviar"])){
    $persona=new Persona();
    $persona->darNombre($_REQUEST["nombre"]);
    $persona->mostrar();
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
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>