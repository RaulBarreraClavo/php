<?php
class CabeceraPagina{
    public $texto;
    public $posicion;
    public $colorTexto;
    public $colorFondo;
   
    public function inicializar($texto,$posicion,$colorTexto,$colorFondo){
       $this->texto=$texto;
       $this->posicion=$posicion;
       $this->colorTexto=$colorTexto;
       $this->colorFondo=$colorFondo;
      
    }
    public function mostrar(){
    
      if($this->posicion=="centrado"){
       echo "<p style='text-align:center;color:$this->colorTexto;background-color:$this->colorFondo'>$this->texto</p>";
        
      }else   if($this->posicion=="derecha"){
        echo "<p style='text-align:right;color:$this->colorTexto;background-color:$this->colorFondo'>$this->texto</p>";

      }else{
        echo "<p style='text-align:left;color:$this->colorTexto;background-color:$this->colorFondo'>$this->texto</p>";
      }
      
   
       
    }
}
if(isset($_REQUEST["enviar"])){
    $cabecera=new CabeceraPagina();
    $cabecera->inicializar($_REQUEST["texto"],$_REQUEST["posicion"],$_REQUEST["colorTexto"],$_REQUEST["colorFondo"]);
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
       Color Texto:<input type="color" name="colorTexto">
       Color Fondo:<input type="color" name="colorFondo">
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>