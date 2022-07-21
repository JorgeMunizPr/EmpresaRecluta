<?php
class lecturaBD{
    private $conn;

    //Constructor
    function __construct(){
        require_once('conexion.php');
		require_once('config.php');
		include('lecturaSesion.php');
        $db = new BD_Conexion();
        $this->conn = $db->connect();
    }

    //Lectura para busqueda de empresas
    public function validaInicioSesion($Usuario, $ContraS){
        

    }
}