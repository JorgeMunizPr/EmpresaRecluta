<?php

require_once('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class empresaDatos{
	//Lectura para busqueda de empresas
	public function BuscaEmpresa($NombreBuscado){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->buscarEmpresaBD($NombreBuscado);
				if($oResultado){
					return $oResultado;
				}
		}
		else{//si no existe sesion
			session_name("sesionReclutas");
			session_start();

			session_unset();

			session_destroy();
		}
	}

	//Lectura para busqueda de reclutass
	public function ListaEmpresas(){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
			$oResultado = $LecBD->listaCompletaEmpresasBD();
			if($oResultado){
			  return $oResultado;
			}
		}
		else{//si no existe sesion
		  session_name("sesionReclutas");
		  session_start();
	
		  session_unset();
	
		  session_destroy();
		}
	  }

	public function ActualizaEmpresa($IdEmpresa, $NombreEmpresa, $Email){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->actualizaEmpresaBD($IdEmpresa, $NombreEmpresa, $Email);
				if($oResultado == 1){
					return 1;
				}
		}
		else{//si no existe sesion
			session_name("sesionReclutas");
			session_start();

			session_unset();

			session_destroy();
		}
	}

	public function EliminaEmpresa($IdEmpresa){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->eliminaEmpresaBD($IdEmpresa);
				if($oResultado == 1){
					return 1;
				}
		}
		else{//si no existe sesion
			session_name("sesionReclutas");
			session_start();

			session_unset();

			session_destroy();
		}
	}
	public function AgregaEmpresa($NombreEmpresa, $Email){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->agregaEmpresaBD($NombreEmpresa, $Email);
				return $oResultado;
		}
		else{//si no existe sesion
			session_name("sesionReclutas");
			session_start();

			session_unset();

			session_destroy();
		}
	}
	
	
}