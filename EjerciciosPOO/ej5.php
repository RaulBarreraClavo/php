<?php
class CabeceraPagina{
    public $texto;
    public $posicion;
   
    public function inicializar($texto,$posicion){
       $this->texto=$texto;
       $this->posicion=$posicion;
      
    }
    public function mostrar(){
    
      if($this->posicion=="centrado"){
       echo "<p style='text-align:center;'>$this->texto</p>";
        
      }else   if($this->posicion=="derecha"){
        echo "<p style='text-align:right;'>$this->texto</p>";

      }else{
        echo "<p style='text-align:left;'>$this->texto</p>";
      }
      
   
       
    }
}
if(isset($_REQUEST["enviar"])){
    $cabecera=new CabeceraPagina();
    $cabecera->inicializar($_REQUEST["texto"],$_REQUEST["posicion"]);
    $cabecera->mostrar();
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
       
        Texto:<input type="text" name="texto">
       <select name="posicion">
        <option value="centrado">Centrado</option>
        <option value="derecha">Derecha</option>
        <option value="izquierda">Izquierda</option>
       </select>
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>