<?php
function insertar($dbh,$tabla,$nombre,$login,$password,$email){
    $dbh->query("insert into $tabla values(0,'$nombre','$login','$password','$email')");
}

function crearBD(){
    try{
        $dsn="mysql:host=localhost;";
        $dbh=new PDO($dsn,"root","");
        $dbh->query("create database if not exists pruebas");
        $dsn="mysql:host=localhost;dbname=pruebas";
        $dbh=new PDO($dsn,"root","");
       
        $dbh->query("create table if not exists usuarios(id int not null auto_increment primary key , nombre varchar(50) not null,login varchar(8) not null,password varchar(8) not null,email varchar(22) not null);");
        $consulta=$dbh->prepare("Select * from usuarios;");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        if($consulta->rowCount()==0){
             insertar($dbh,"usuarios","Antonio Martin","user1","adm1","antonio1@gmail.com");
             insertar($dbh,"usuarios","Juan Gomez","user2","adm2","juang@gmail.com");
             insertar($dbh,"usuarios","Alicia Navarro","user3","adm3","alician@gmail.com");
        }
        
        
        $dbh->query("create table if not exists personas(id int not null auto_increment primary key , nombre varchar(50) not null,apellidos varchar(50) not null,sexo varchar(10) not null);");
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>