<?php

require_once '../bd/Connection.php';


class Client extends Connection {
    
    private $id;
    public  $name;
    public  $phone;
    public  $email;
    public  $web;
    public  $suscription;

    public function save(){
        $this->connect();

        $sql = "INSERT INTO clientes (nombre, telefono, email, web, abono) VALUES ('$this->name','$this->phone','$this->email','$this->web','$this->suscription')";

        return $this->query($sql);
    }
}