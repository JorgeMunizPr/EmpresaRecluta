<?php

require_once('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class reclutasDatos{
  //Lectura para busqueda de reclutass
  public function BuscaRecluta($NombreBuscado){
    $LecBD = new lecturaBD();
    
    if ( $_SESSION['database'] ) {//si existe sesion
        $oResultado = $LecBD->buscarReclutaBD($NombreBuscado);
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
  public function ActualizaRecluta($IdRecluta, $NombreRecluta, $Telefono, $Puesto){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->actualizaReclutaBD($IdRecluta, $NombreRecluta, $Telefono, $Puesto);
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
	public function EliminaRecluta($IdRecluta){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->eliminaReclutaBD($IdRecluta);
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
	public function AgregaRecluta($NombreRecluta, $IdEmpresa, $Telefono, $Puesto){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->agregaRecluteBD($NombreRecluta, $IdEmpresa, $Telefono, $Puesto);
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