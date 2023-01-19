<?php
class Menu{
    public $menu;
    public $posicion;
   
    public function inicializar($menu,$posicion){
       $this->menu=$menu;
       $this->posicion=$posicion;
      
    }
    public function mostrar(){
     $texto="";
      if($this->posicion=="vertical"){
        foreach($this->menu as $valor){
            $texto.="<a href='https://www.google.es'>$valor</a><br>";
        }
      }else{
        foreach($this->menu as $valor){
            $texto.="<a href='https://www.google.es'>$valor</a>-";
        }

      }
      echo $texto;
   
       
    }
}
if(isset($_REQUEST["enviar"])){
    $menu=new Menu();
    $menu->inicializar($_REQUEST["menu"],$_REQUEST["posicion"]);
    $menu->mostrar();
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
       
        <select multiple name="menu[]">
        <option value="google">Google</option>
        <option value="yahoo">Yahoo</option>
        <option value="msn">Msn</option>
        </select>
       <select name="posicion">
        <option value="vertical">Vertical</option>
        <option value="horizontal">Horizontal</option>
       </select>
    <button type="submit" name="enviar">Enviar</button>
    </form>
    
</body>
</html>