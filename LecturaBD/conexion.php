<?php
class BD_Conexion{
    private $conn;

    //conexion a base de datos
    public function connect(){
        require_once('config.php');
        require_once('validaSesion.php');

        $this->conn = new PDO("mysql:host=".DB_SERVER.";dbname=".$_SESSION['database'].";charset=utf8mb4", DB_USUARIO, DB_CONTRA);

        return $this->conn;
    }
}