<?php
    session_start();
    class Conectar{ 
        protected $dbh;

        protected function Conexion(){
            try{
                $conectar = $this->dbh=new PDO("sqlsrv:Server=DESKTOP-DRR8AN4\SQLEXPRESS;Database=fiseinventario","sa","16701");
                return $conectar;
            } catch(Exception $e) {
                print"Error Conexion DB". $e->getMessage() ."<br/>";
                die();
            }
        }

        public static function ruta() {

            return "http://localhost/fiseinventario/";

        }
        
    }

?>