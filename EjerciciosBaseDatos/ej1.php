<?php
function insertar($dbh,$tabla,$nombre,$login,$password,$email){
    $dbh->query("insert into $tabla values(0,'$nombre','$login','$password','$email')");
}
function crearBD(){
    try{
        $dsn="mysql:host=localhost;";
        $dbh=new PDO($dsn,"root","");
        $dbh->query("create database if not exists usuarios");
        $dsn="mysql:host=localhost;dbname=usuarios";
        $dbh=new PDO($dsn,"root","");
       
        $dbh->query("create table if not exists usuarios(id int not null auto_increment primary key , nombre varchar(20) not null,login varchar(50) not null,password varchar(50) not null,email varchar(50) not null);");
         // insertar($dbh,"usuarios","Marco Asensio","user1","adm1","marco@gmail.com");
         // insertar($dbh,"usuarios","Alvaro Morata","user2","adm2","alvaro@gmail.com");
           // insertar($dbh,"usuarios","Eduardo Camavinga","user3","adm3","eduardo@gmail.com");
        // insertar($dbh,"usuarios","Nico Williams","user4","adm4","nico@gmail.com");
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>