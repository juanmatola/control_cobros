<?php

require_once '../bd/Conection.php';



class Client extends Conection {
    
    private $id;
    public  $name;
    public  $phone;
    public  $email;
    public  $web;
    public  $suscription;

    public function save(){
        $this->conect();

        $sql = "INSERT INTO clientes (nombre, telefono, email, web, abono) VALUES ('$this->name','$this->phone','$this->email','$this->web','$this->suscription')";

        return $this->execute($sql);
    }
}