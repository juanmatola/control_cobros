<?php 

require_once dirname(__DIR__).'/../bd/Connection.php';

class Abono extends Connection {
    private $id;
    public $name;
    public $amount;

    public function save(){
        $this->connect();

        $sql = "INSERT INTO abonos (nombre, monto) VALUES ('$this->name','$this->amount')";

        return $this->query($sql);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function delete(){
        $this->connect();

        $sql = 'DELETE FROM abonos WHERE abonos.id = '.$this->id;

        return $this->query($sql);
    }
}
