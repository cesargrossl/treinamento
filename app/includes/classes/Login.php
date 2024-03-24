<?php
if (!defined("IS_INCLUDE"))
    die();

    class Login extends Functions {  
        protected $act;  
        protected $consultaResultado;
        public function __construct($act){
            switch ($this->act) {
                case 'logar':
                    $this->consultaResultado = $this->logarSistema();
                    break;
            }

        }
        private function logarSistema(){
            $qry = " ";
            $this->AbreConexao('portal'); 
            $result = $this->select($qry, 'portal');
            $this->FechaConexao('portal');                          
            if (count($result)) {
                foreach ($result as $row) {
                   
                }
            }
            return 'algo';
        }

        // Método para obter o resultado da consulta
        public function getConsultaResultado() {
            return $this->consultaResultado;
        }

    }

?>