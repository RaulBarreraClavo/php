<?php
class Persona{
    public $nombre;
    public $apellido;
    public $edad;
    public function asignar($nombre,$apellido,$edad){
       $this->nombre=$nombre;
       $this->apellido=$apellido;
       $this->edad=$edad;
    }
    public function mayorEdad(){
        if($this->edad>=18){
            echo "Es mayor de edad";
        }else{
            echo "No Es mayor de edad";
        }
      
    }
    public function NombreCompleto(){
        echo "$this->nombre $this->apellido";
    }
    public function mostrar(){
    $this->mayorEdad();
    echo "<br>";
    $this->NombreCompleto();
    }
}
if(isset($_REQUEST["enviar"])){
    $persona=new Persona();
    $persona->asignar($_REQUEST["nombre"],$_REQUEST["apellido"],$_REQUEST["edad"]);
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
        Apellido:<input type="text" name="apellido">
        Edad:<input type="number" name="edad">
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>