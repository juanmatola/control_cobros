<?php

require_once dirname(__DIR__).'/bd/Connection.php';


class Client extends Connection {
    
    private $id;
    public  $name;
    public  $phone;
    public  $email;
    public  $web;
    public  $abono;

    public function save(){
        $this->connect();

        $sql = "INSERT INTO clientes (abono_id, nombre, telefono, email, web) VALUES ($this->abono, '$this->name','$this->phone','$this->email','$this->web')";

        return $this->query($sql);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function delete(){
        $this->connect();

        $sql = 'DELETE FROM clientes WHERE clientes.id = '.$this->id;

        return $this->query($sql);
    }
}