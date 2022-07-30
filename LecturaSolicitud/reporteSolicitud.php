<?php

require_once('LecturaBD/conexion.php');
require_once ('LecturaBD/lecturaDatos.php');

class reporteDatos{
  //Lectura para informacion del reporte
  public function BuscaInfoReporte($IdEmpresa){
    $LecBD = new lecturaBD();
    
    if ( $_SESSION['database'] ) {//si existe sesion
        $oResultado = $LecBD->buscarInfoReporteBD($IdEmpresa);
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