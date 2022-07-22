<?php

include('LecturaBD/conexion.php');
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
}