<?php

include('LecturaBD/conexion.php');
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
}