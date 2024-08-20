<?php 
    class Tarefa { 
        private $id; 
        private $id_status; 
        private $tarefa; 
        private $data_cadastro; 

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;

            //é possível retornar a $this, assim daria para setar outro método logo em seguida
            // com ->
        }
    }
?>