<?php
class Usuario{
    protected $login;
    protected $password;
    public function constructor($login,$password){
        $this->login=$login;
        $this->password=$password;
    }
    public function mostrarDatos(){
       echo "Login: $this->login, Password: $this->password";
    }
}
?>