<?php

require_once dirname(__DIR__).'/../bd/Connection.php';


    class AbonoList extends Connection {

        public $rawData;
        public $dataInArray;

        public function obtain(){
            $this->connect();

            $sql = "SELECT * FROM abonos";

            $result = $this->query($sql);

            if (!$result) {
                echo 'error de lectura a db';
                die;
            }

            $cont = 0;

            while($this->rawData = mysqli_fetch_array($result)){

                $this->dataInArray[$cont] = $this->rawData;
                $cont = $cont + 1;

            }
            
            return $this->dataInArray;

        }
    }