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
	/** BUQUEDAS **/
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

	//Lectura para busqueda de reclutas
    public function buscarReclutaBD($NombreBuscada){
        $Query="
		select id_reclutas, nomb_reclu AS Nombre, b.nom_empr , telefono, puesto from reclutas a
		join empresas b ON a.id_empresa=b.id_empresa
		where nomb_reclu like '%$NombreBuscada%'
		limit 1;
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

	//Lectura para busqueda de metas
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
	//Lectura para busqueda de metas
    public function listaCompletaEmpresasBD(){
        $Query="select id_empresa, nom_empr from empresas;";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}
		}
		else{
			return NULL;
		}
    }
	//Lectura listado de indicadores
	public function lecturaIndicadorBD(){
		$Query="select 
		a.nom_empr, ifnull(c.metas_mes,0) as meta_mes, 
		ifnull(b.num_reclutas,0) AS num_reclutas
		from empresas a
		left join metas c ON a.id_empresa=c.id_empresa
		left join(select id_empresa, count(*) AS num_reclutas from reclutas
		group by id_empresa)b ON a.id_empresa=b.id_empresa;";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}
		}
		else{
			return NULL;
		}
	}
	//Lectura listado de indicadores
	public function buscarInfoReporteBD($IdEmpresa){
		$Query="select 
		a.nom_empr, ifnull(c.metas_mes,0) as meta_mes, 
		ifnull(b.NumReclutas,0) AS num_reclutas,
		case when ifnull(c.metas_mes,0)-ifnull(b.NumReclutas,0)<0 then 0 
			 else ifnull(c.metas_mes,0)-ifnull(b.NumReclutas,0) end AS vacantes_disponibles
		from empresas a
		left join metas c ON a.id_empresa=c.id_empresa
		left join(select id_empresa, count(*) AS NumReclutas from reclutas
		group by id_empresa)b ON a.id_empresa=b.id_empresa
		where a.id_empresa='$IdEmpresa';";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			if($resultQuery->rowCount() > 0){
				$resultDatos = $resultQuery->fetchAll(PDO::FETCH_ASSOC);
				return $resultDatos;
			}
		}
		else{
			return NULL;
		}
	}

	
	/** ACTUALIZACION **/
	//actualiza registro empresa
    public function actualizaEmpresaBD($IdEmpresa, $NombreEmpresa, $Email){
        $Query="update empresas set nom_empr='$NombreEmpresa', email='$Email' where id_empresa='$IdEmpresa'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }
	//actualiza registro meta
    public function actualizaMetaBD($IdMeta, $MetasMes){
        $Query="update metas set metas_mes='$MetasMes' where id_metas='$IdMeta'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	//actualiza registro meta
    public function actualizaReclutaBD($IdRecluta, $NombreRecluta, $Telefono, $Puesto){
        $Query="update reclutas set nomb_reclu='$NombreRecluta', telefono='$Telefono', puesto='$Puesto' where id_reclutas='$IdRecluta'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	/** ELIMINACION **/
	//elimina registro empresa
    public function eliminaEmpresaBD($IdEmpresa){
		//Elimina reclutas con la empresa a eliminar
		$this->eliminaReclutasEmpresaBD($IdEmpresa);
		//Elimina metas con la empresa a eliminar
		$this->eliminaMetasEmpresaBD($IdEmpresa);

        $Query="delete from empresas where id_empresa='$IdEmpresa'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }
	//elimina reclutas de una empresa en especial
	public function eliminaReclutasEmpresaBD($IdEmpresa){
        $Query="delete from reclutas where id_empresa='$IdEmpresa'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }
	//elimina metas de una empresa en especial
	public function eliminaMetasEmpresaBD($IdEmpresa){
        $Query="delete from metas where id_empresa='$IdEmpresa'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }
	

	//elimina registro meta
    public function EliminaMetaBD($IdMeta){
        $Query="delete from metas where id_metas='$IdMeta'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	
	//elimina registro meta
    public function eliminaReclutaBD($IdRecluta){
        $Query="delete from metas where id_reclutas='$IdRecluta'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	/** AGREGA REGISTROS **/
	//agrega registro empresa
    public function agregaEmpresaBD($NombreEmpresa, $Email){
		if($this->validaNombreEmpresaNuevo($NombreEmpresa)==1)
			return 2;

        $Query="insert into empresas (nom_empr, email) VALUES ('$NombreEmpresa', '$Email');";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	//agrega registro reclute
    public function agregaRecluteBD($NombreRecluta, $IdEmpresa, $Telefono, $Puesto){
		if($this->validaNombreReclutaNuevo($NombreRecluta)==1)
			return 2;

        $Query="insert into reclutas (nomb_reclu, id_empresa, telefono, puesto) VALUES ('$NombreRecluta', '$IdEmpresa', '$Telefono', '$Puesto');";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
    }

	public function agregaMetaBD($IdEmpresa, $MetasMes){
		if($this->validaMetaNueva($IdEmpresa)==1)
			return 2;

        $Query="insert into metas (id_empresa, metas_mes) VALUES ('$IdEmpresa', '$MetasMes');";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		// check if succesful
		if($resultQuery){			
			return 1;
		}
		else{
			return NULL;
		}
	}

	/** VALIDACIONES **/
	private function validaNombreEmpresaNuevo($NombreEmpresa){	
		$bExiste=0;
        $Query = "Select id_empresa FROM empresas WHERE nom_empr='$NombreEmpresa'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		if($resultQuery->rowCount() > 0)
			$bExiste=1;
		else
			$bExiste=0;

        return $bExiste;
	}
	private function validaNombreReclutaNuevo($NombreRecluta){	
		$bExiste=0;
        $Query = "Select id_reclutas FROM reclutas WHERE nomb_reclu='$NombreRecluta'";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		if($resultQuery->rowCount() > 0)
			$bExiste=1;
		else
			$bExiste=0;

        return $bExiste;
	}
	private function validaMetaNueva($IdEmpresa){	
		$bExiste=0;
        $Query = "Select id_metas FROM metas WHERE id_empresa='$IdEmpresa';";
        $resultQuery = $this->conn->prepare($Query);
		$resultQuery->execute();
		if($resultQuery->rowCount() > 0)
			$bExiste=1;
		else
			$bExiste=0;

        return $bExiste;
	}

}