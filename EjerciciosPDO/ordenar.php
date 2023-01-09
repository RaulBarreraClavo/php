<?php
session_start();

if($_SESSION["autorizado"]==true){

     
    
   
}else{
    header("Location:./login.php");

}

?>