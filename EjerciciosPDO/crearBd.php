<?php

function crearBD(){
    try{
        $dsn="mysql:host=localhost;";
        $dbh=new PDO($dsn,"root","");
        $dbh->query("create database if not exists agenda");
        $dsn="mysql:host=localhost;dbname=agenda";
        $dbh=new PDO($dsn,"root","");
       
        $dbh->query("create table if not exists personas(id int not null auto_increment primary key , nombre varchar(15) not null,apellidos varchar(15) not null,direccion varchar(25) not null,telefono int(9) not null);");
        
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>