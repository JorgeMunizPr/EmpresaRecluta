<?php

require_once('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class metasDatos{
  //Lectura para busqueda de metass
  public function BuscaMeta($NombreBuscado){
    $LecBD = new lecturaBD();
    
    if ( $_SESSION['database'] ) {//si existe sesion
        $oResultado = $LecBD->buscarMetaBD($NombreBuscado);
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
  public function ActualizaMeta($IdMeta, $MetasMes){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->actualizaMetaBD($IdMeta, $MetasMes);
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
	public function EliminaMeta($IdMeta){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->eliminaMetaBD($IdMeta);
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
	public function AgregaMeta($IdEmpresa, $MetasMes){
		$LecBD = new lecturaBD();
		
		if ( $_SESSION['database'] ) {//si existe sesion
				$oResultado = $LecBD->agregaMetaBD($IdEmpresa, $MetasMes);
				return $oResultado;
				// if($oResultado == 1){
				// 	return 1;
				// }
		}
		else{//si no existe sesion
			session_name("sesionReclutas");
			session_start();

			session_unset();

			session_destroy();
		}
	}
	
}