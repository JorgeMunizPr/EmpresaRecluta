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
    public function buscarEmpresaBD($NombreBuscada){
        $Query="select id_empresa, nom_empr AS Nombre, email from empresas where nom_empr like '%$NombreBuscada%'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}else
				return 'Vacio';
		}
		else{
			return NULL;
		}
    }

	//Lectura para busqueda de empresas
    public function buscarReclutaBD($NombreBuscada){
        $Query="
		select id_reclutas, nomb_reclu AS Nombre, b.nom_empr , telefono, puesto from reclutas a
		join empresas b ON a.id_empresa=b.id_empresa
		where nomb_reclu like '%$NombreBuscada%';
		";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}else
				return 'Vacio';
		}
		else{
			return NULL;
		}
    }

	//Lectura para busqueda de empresas
    public function buscarMetaBD($NombreBuscada){
        $Query="
		select id_metas, b.nom_empr, metas_mes from metas a
		join empresas b ON a.id_empresa=b.id_empresa
		where b.nom_empr like '%$NombreBuscada%';;
		";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}else
				return 'Vacio';
		}
		else{
			return NULL;
		}
    }
}