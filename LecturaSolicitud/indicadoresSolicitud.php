<?php

require_once('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class indicadorDatos{
	//Lectura para busqueda de indicadors
	public function LecturaIndicadores(){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->lecturaIndicadorBD();
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
	
}